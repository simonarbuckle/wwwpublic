Aria.classDefinition({
    $classpath: "js.carousel.widget.Carousel",
    $extends: "aria.widgetLibs.BaseWidget",
    $dependencies: ["js.carousel.widget.CarouselCfgBeans", "aria.utils.Event", "aria.utils.Json"],
    $css: ["js.carousel.widget.CarouselStyle"],

    $statics: {
    },

    $constructor: function (cfg, context, lineNumber) {
        // normalize configuration
		aria.core.JsonValidator.normalize({
			json : cfg,
			beanName : "js.carousel.widget.CarouselCfgBeans.CarouselCfg"
		});

        // this is ugly but there's no way to provide args to CSS templates (yet)...
        js.carousel.widget.Carousel.TRANSITIONCSS = cfg.transitionCSS;

        // uid for the <ul> that will contain the list of <li><img></li>
        this._ulId = this._createDynamicId();

        // uid for the <div> that will contain the captions
        this._captionId = this._createDynamicId();

        // the <ul> DOM element
        this._ul = null; // I know it's tempting to replace the _ with something else

        // slideshow timer used by setInterval
        this.__timer=null;

        // images and captions arrays based on the original multitypes array
        this._images = cfg.images.map(function(e){return (typeof e == "object" ? e.src : e)}, this);
        this._captions = cfg.images.map(function(e){return (typeof e == "object" ? e.title : "")}, this);

        // number of images
        this._total = cfg.images.length;

        // bindings storage
        this.__jsonBindings = [];
        this.__eventBindings = [];

        // json bindings
        var i=parseInt(cfg.index)||0, b;
        if (cfg.bind) {
            this.__indexChangedHandler = {fn: this.__indexChanged, scope:this};
            this.__loopChangedHandler = {fn: this.__loopChanged, scope:this};
            if (b=cfg.bind.index) {
                j=parseInt(b.inside[b.to]);
                if (isNaN(j)) aria.utils.Json.setValue(b.inside, b.to, i);
                else i=j;
                this.__jsonBindings.push([b.inside, b.to, this.__indexChangedHandler]);
            }
            if (b=cfg.bind.loop) {
                this.__jsonBindings.push([b.inside, b.to, this.__loopChangedHandler, false, true]);
                aria.utils.Json.inject(b.inside[b.to], cfg.loop);
            }
        }

        // real index of the currently displayed image (see writeMarkup)
        this._idx = (i>=0 && i<this._total) ? i+1 : 1;

        this.$BaseWidget.constructor.apply(this, arguments);
    },

    $destructor: function () {
        // remove all dom events and json bindings
        var i,l;
        for (i=0, l=this.__eventBindings.length; i<l; i++)
            aria.utils.Event.removeListener.apply(aria.utils.Event, this.__eventBindings[i]);
        var jb = this.__jsonBindings;
        for (i=0, l=jb.length; i<l; i++)
            aria.utils.Json.removeListener(jb[0], jb[1], jb[2], !!jb[4]);
        this.$BaseWidget.$destructor.call(this);

    },

    $prototype: {

        writeMarkup: function (out) {
            // for a given image array [a,b,c] we create the c,a,b,c,a list of <li> (to handle continuous loops)
            var c = this._cfg;
            var img = this._images;
            var caption = this._captions[this._idx-1];
            this.__captionDisplayed = caption.length>0;
            out.write([].concat(
                ['<div class="mywlibCarousel ', (c.cssClass||''), '" style="width:', c.width, 'px;height:', c.height, 'px">',
                '<div id="', this._captionId,'" class="caption" style="width:', c.width, 'px;height:', c.titleheight,'px;line-height:', c.titleheight,'px;',
                (this.__captionDisplayed ? '">' : 'display:none">'), caption, '</div>',
                '<ul id="', this._ulId, '" class="anim" style="left:', -(this._idx)*c.width, 'px">',
                '<li><img src="', img[img.length-1], '" /></li>'],
                img.map(function(e){return '<li><img src="'+e+'" /></li>'}, this),
                ['<li><img src="', img[0], '" /></li>',
                '</ul></div>']
            ).join(""));
        },

        initWidget: function() {
            this._ul = document.getElementById(this._ulId);
            this._caption = document.getElementById(this._captionId);
            // dom events bindings
            if (c=this._cfg.controls) {
                var e;
                this.__previousHandler = {fn:this._previous, scope:this};
                this.__nextHandler = {fn:this._next, scope:this};
                if (c.previous && (e=document.getElementById(c.previous)))
                    this.__eventBindings.push([e, "click", this.__previousHandler]);
                if (c.next && (e=document.getElementById(c.next)))
                    this.__eventBindings.push([e, "click", this.__nextHandler]);
            }
            this.__initBindings();
            this.__setLoop();
        },

        __initBindings: function() {
            var i,l;
            for (i=0, l=this.__eventBindings.length; i<l; i++)
                aria.utils.Event.addListener.apply(aria.utils.Event, this.__eventBindings[i]);
            for (i=0, l=this.__jsonBindings.length; i<l; i++)
                aria.utils.Json.addListener.apply(aria.utils.Json, this.__jsonBindings[i]);
        },

        _next: function() {
            this._shift(this._total+1-this._idx, 1, 1);
        },

        _previous: function() {
            this._shift(this._idx, this._total, -1);
        },

        _shift: function(n, reset, step) {
            if (n<2) {
                if (this._cfg.loop.type=="stop") return;
                if (this._cfg.loop.type=="reverse") {
                    aria.utils.Json.setValue(this._cfg.loop, "direction", !this._cfg.loop.direction);
                    return;
                }
                if (this._cfg.loop.type=="rewind") {
                    step=reset-this._idx;
                }
            }
            if (n==0 && this._cfg.loop.type=="continuous") this.__swap(reset);
            this._idx+=step;
            this.__putImgAndCaption();
            var b;
            if (this._cfg.bind && (b=this._cfg.bind.index)) {
                var i = this._idx<1 ? this._total-1 : (this._idx>this._total ? 0 : this._idx-1);
                aria.utils.Json.setValue(b.inside, b.to, i, this.__indexChangedHandler);
            }
        },

        __swap: function(reset) {
            this._ul.className="";
            this._idx=reset;
            this._ul.style.left = (-(this._idx)*this._cfg.width)+"px";
            this._ul.offsetWidth; // force reflow (beware that some minifiers like closure remove this!)
            this._ul.className="anim";
        },

        __indexChanged: function() {
            var n = parseInt(this._cfg.bind.index.inside[this._cfg.bind.index.to]);
            if (n<0 || n>this._total-1 || n+1==this._idx) return;
            clearInterval(this.__timer);
            if (this._idx==this._total+1 && n!=0) this.__swap(1);
            if (this._idx==0 && n!=this._total-1) this.__swap(this._total);
            this._idx=n+1;
            this.__putImgAndCaption();
            this.__setLoop();
        },

        __putImgAndCaption : function() {
            this._ul.style.left = (-(this._idx)*this._cfg.width)+"px";
            var n = this._idx<1 ? this._total-1 : (this._idx>this._total ? 0 : this._idx-1);
            if (this._captions[n].length>0) {
                this._caption.innerHTML = this._captions[n];
                if (!this.__captionDisplayed) {
                    this._caption.style.display = "block";
                    this.__captionDisplayed = true;
                }
            }
            else
                if (this.__captionDisplayed) {
                    this._caption.style.display = "none";
                    this.__captionDisplayed = false;
                }
        },

        __setLoop: function() {
            var l=this._cfg.loop;
            if (l.speed > 0) {
                var self=this;
                this.__timer=setInterval(function() {
                    l.direction ? self._next() : self._previous()
                }, l.speed*1000);
            }
        },

        __loopChanged: function(e) {
            clearInterval(this.__timer);
            if (e.dataName=="type" && e.oldValue=="continuous") {
                if (this._idx==0) this.__swap(this._total)
                else if (this._idx==this._total+1) this.__swap(1)
            }
            this._cfg.loop[e.dataName]=e.newValue;
            this.__setLoop();
        }

    }
});