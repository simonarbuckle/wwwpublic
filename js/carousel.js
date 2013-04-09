//***MULTI-PART
//vSsyiAdSPv
//LOGICAL-PATH:js/carousel/MyWlib.js
//vSsyiAdSPv
Aria.classDefinition({$classpath:"js.carousel.MyWlib",$extends:"aria.widgetLibs.WidgetLib",$singleton:true,$prototype:{widgets:{"Carousel":"js.carousel.widget.Carousel"}}});
//vSsyiAdSPv
//LOGICAL-PATH:js/carousel/view/Main.tpl
//vSsyiAdSPv
{Template {
    $classpath: "js.carousel.view.Main",
    $hasScript: true,
    $wlibs: {
        "mywlib": "js.carousel.MyWlib"
    }
}}

    {macro main()}

        {var data={
            images : [
                {src:"images/carousel/sample_class.png", title:"Easy class management"},
                {src:"images/carousel/sample_tpl.png", title:"Powerful templating syntax"},
                {src:"images/carousel/CMTiphone.jpg", title:"Mobile ready"}]
        }/}

        {@mywlib:Carousel {
            width: 464,
            height: 275,
            titleheight: 30,
            images: data.images,
			cssClass: "slides",
			loop: {
				speed: 8
			},
            bind: {
                index: {to:"curimg", inside:data}
            }
        }/}

		{section {
			id: "dummy",
			type: "nav",
			bindRefreshTo: [ {to:"curimg", inside:data} ],
			macro: "bullets"
		}/}

    {/macro}


    {macro bullets()}
		{foreach img in data.images}
			<a ${img_index==data.curimg ? 'class="current"' : ''} href="#" {on click {fn:"change", scope:this, args:img_index} /}>&bull;</a>
		{/foreach}
    {/macro}

{/Template}

//vSsyiAdSPv
//LOGICAL-PATH:js/carousel/view/MainScript.js
//vSsyiAdSPv
Aria.tplScriptDefinition({$classpath:"js.carousel.view.MainScript",$prototype:{change:function(e,i){aria.utils.Json.setValue(this.data,"curimg",i);}}});
//vSsyiAdSPv
//LOGICAL-PATH:js/carousel/widget/Carousel.js
//vSsyiAdSPv
Aria.classDefinition({$classpath:"js.carousel.widget.Carousel",$extends:"aria.widgetLibs.BaseWidget",$dependencies:["js.carousel.widget.CarouselCfgBeans","aria.utils.Event","aria.utils.Json"],$css:["js.carousel.widget.CarouselStyle"],$statics:{},$constructor:function(cfg,context,lineNumber){aria.core.JsonValidator.normalize({json:cfg,beanName:"js.carousel.widget.CarouselCfgBeans.CarouselCfg"});js.carousel.widget.Carousel.TRANSITIONCSS=cfg.transitionCSS;this._ulId=this._createDynamicId();this._captionId=this._createDynamicId();this._ul=null;this.__timer=null;this._images=cfg.images.map(function(e){return(typeof e=="object"?e.src:e);},this);this._captions=cfg.images.map(function(e){return(typeof e=="object"?e.title:"");},this);this._total=cfg.images.length;this.__jsonBindings=[];this.__eventBindings=[];var i=parseInt(cfg.index)||0,b;if(cfg.bind){this.__indexChangedHandler={fn:this.__indexChanged,scope:this};this.__loopChangedHandler={fn:this.__loopChanged,scope:this};if(b=cfg.bind.index){j=parseInt(b.inside[b.to]);if(isNaN(j)){aria.utils.Json.setValue(b.inside,b.to,i);}else{i=j;}this.__jsonBindings.push([b.inside,b.to,this.__indexChangedHandler]);}if(b=cfg.bind.loop){this.__jsonBindings.push([b.inside,b.to,this.__loopChangedHandler,false,true]);aria.utils.Json.inject(b.inside[b.to],cfg.loop);}}this._idx=(i>=0&&i<this._total)?i+1:1;this.$BaseWidget.constructor.apply(this,arguments);},$destructor:function(){var i,l;for(i=0,l=this.__eventBindings.length;i<l;i++){aria.utils.Event.removeListener.apply(aria.utils.Event,this.__eventBindings[i]);}var jb=this.__jsonBindings;for(i=0,l=jb.length;i<l;i++){aria.utils.Json.removeListener(jb[0],jb[1],jb[2],!!jb[4]);}this.$BaseWidget.$destructor.call(this);},$prototype:{writeMarkup:function(out){var c=this._cfg;var img=this._images;var caption=this._captions[this._idx-1];this.__captionDisplayed=caption.length>0;out.write([].concat(['<div class="mywlibCarousel ',(c.cssClass||""),'" style="width:',c.width,"px;height:",c.height,'px">','<div id="',this._captionId,'" class="caption" style="width:',c.width,"px;height:",c.titleheight,"px;line-height:",c.titleheight,"px;",(this.__captionDisplayed?'">':'display:none">'),caption,"</div>",'<ul id="',this._ulId,'" class="anim" style="left:',-(this._idx)*c.width,'px">','<li><img src="',img[img.length-1],'" /></li>'],img.map(function(e){return'<li><img src="'+e+'" /></li>';},this),['<li><img src="',img[0],'" /></li>',"</ul></div>"]).join(""));},initWidget:function(){this._ul=document.getElementById(this._ulId);this._caption=document.getElementById(this._captionId);if(c=this._cfg.controls){var e;this.__previousHandler={fn:this._previous,scope:this};this.__nextHandler={fn:this._next,scope:this};if(c.previous&&(e=document.getElementById(c.previous))){this.__eventBindings.push([e,"click",this.__previousHandler]);}if(c.next&&(e=document.getElementById(c.next))){this.__eventBindings.push([e,"click",this.__nextHandler]);}}this.__initBindings();this.__setLoop();},__initBindings:function(){var i,l;for(i=0,l=this.__eventBindings.length;i<l;i++){aria.utils.Event.addListener.apply(aria.utils.Event,this.__eventBindings[i]);}for(i=0,l=this.__jsonBindings.length;i<l;i++){aria.utils.Json.addListener.apply(aria.utils.Json,this.__jsonBindings[i]);}},_next:function(){this._shift(this._total+1-this._idx,1,1);},_previous:function(){this._shift(this._idx,this._total,-1);},_shift:function(n,reset,step){if(n<2){if(this._cfg.loop.type=="stop"){return;}if(this._cfg.loop.type=="reverse"){aria.utils.Json.setValue(this._cfg.loop,"direction",!this._cfg.loop.direction);return;}if(this._cfg.loop.type=="rewind"){step=reset-this._idx;}}if(n==0&&this._cfg.loop.type=="continuous"){this.__swap(reset);}this._idx+=step;this.__putImgAndCaption();var b;if(this._cfg.bind&&(b=this._cfg.bind.index)){var i=this._idx<1?this._total-1:(this._idx>this._total?0:this._idx-1);aria.utils.Json.setValue(b.inside,b.to,i,this.__indexChangedHandler);}},__swap:function(reset){this._ul.className="";this._idx=reset;this._ul.style.left=(-(this._idx)*this._cfg.width)+"px";this._ul.offsetWidth;this._ul.className="anim";},__indexChanged:function(){var n=parseInt(this._cfg.bind.index.inside[this._cfg.bind.index.to]);if(n<0||n>this._total-1||n+1==this._idx){return;}clearInterval(this.__timer);if(this._idx==this._total+1&&n!=0){this.__swap(1);}if(this._idx==0&&n!=this._total-1){this.__swap(this._total);}this._idx=n+1;this.__putImgAndCaption();this.__setLoop();},__putImgAndCaption:function(){this._ul.style.left=(-(this._idx)*this._cfg.width)+"px";var n=this._idx<1?this._total-1:(this._idx>this._total?0:this._idx-1);if(this._captions[n].length>0){this._caption.innerHTML=this._captions[n];if(!this.__captionDisplayed){this._caption.style.display="block";this.__captionDisplayed=true;}}else{if(this.__captionDisplayed){this._caption.style.display="none";this.__captionDisplayed=false;}}},__setLoop:function(){var l=this._cfg.loop;if(l.speed>0){var self=this;this.__timer=setInterval(function(){l.direction?self._next():self._previous();},l.speed*1000);}},__loopChanged:function(e){clearInterval(this.__timer);if(e.dataName=="type"&&e.oldValue=="continuous"){if(this._idx==0){this.__swap(this._total);}else{if(this._idx==this._total+1){this.__swap(1);}}}this._cfg.loop[e.dataName]=e.newValue;this.__setLoop();}}});
//vSsyiAdSPv
//LOGICAL-PATH:js/carousel/widget/CarouselCfgBeans.js
//vSsyiAdSPv
Aria.beanDefinitions({$package:"js.carousel.widget.CarouselCfgBeans",$description:"Definition of the beans used in the Carousel widget config",$namespaces:{"json":"aria.core.JsonTypes"},$beans:{"BindingRef":{$type:"json:Object",$description:"Description of a Binding",$properties:{"to":{$type:"json:JsonProperty",$description:"Name of the JSON property to bind to"},"inside":{$type:"json:ObjectRef",$description:"Reference to the object that holds the property to bind to"}}},"ImageDef":{$type:"json:Object",$description:"Image with a caption",$properties:{"src":{$type:"json:String",$description:"Image path.",$sample:"static/img/mypic.jpg"},"title":{$type:"json:String",$description:"Image caption.",$sample:"Description of the image"}}},"CarouselCfg":{$type:"json:Object",$description:"Configuration of the carousel widget.",$properties:{"width":{$type:"json:Integer",$description:"Width of the widget.",$mandatory:true},"height":{$type:"json:Integer",$description:"Height of the widget.",$mandatory:true},"titleheight":{$type:"json:Integer",$description:"Height of images captions.",$default:30},"images":{$type:"json:Array",$description:"Array of images objects or paths.",$mandatory:true,$contentType:{$type:"json:MultiTypes",$description:"Image object or path.",$contentTypes:[{$type:"json:String",$description:"Image path.",$sample:"static/img/mypic.jpg"},{$type:"ImageDef",$description:"Image path and caption."}]}},"loop":{$type:"json:Object",$description:"Parameters of the slideshow.",$default:{type:"continuous",direction:true,speed:0},$properties:{"type":{$type:"json:Enum",$description:"Behavior after first/last image is reached: [stop]: nothing happens, [continuous]: seamless loop (default), [rewind]: scroll back to last/first image, [reverse]: switches direction.",$enumValues:["stop","continuous","rewind","reverse"],$default:"continuous"},"direction":{$type:"json:Boolean",$description:"When speed is set, defines the direction of the slideshow: true=right to left (default), false:left to right.  If loop type is 'reverse' this indicates the starting direction.",$default:true},"speed":{$type:"json:Integer",$description:"Duration in seconds of the display between transitions (default: 0 meaning no automatic slideshow.)",$default:0}}},"controls":{$type:"json:Object",$description:"Controls of the slideshow.",$properties:{"next":{$type:"json:String",$description:"HTML id of the element to use to display the next image (must support the click event.)"},"previous":{$type:"json:String",$description:"HTML id of the element to use to display the previous image (must support the click event.)"}}},"index":{$type:"json:Integer",$description:"Index of the image to be displayed first.",$default:0},"cssClass":{$type:"json:String",$description:"Optional CSS class to apply to the carousel container."},"transitionCSS":{$type:"json:String",$description:"The part of the CSS declaration defining the duration and timing of the transition.",$default:"0.5s ease-out",$sample:"1s ease-in-out"},bind:{$type:"json:Object",$description:"Bindable properties.",$properties:{"loop":{$type:"BindingRef"},"index":{$type:"BindingRef"}}}}}}});
//vSsyiAdSPv
//LOGICAL-PATH:js/carousel/widget/CarouselStyle.tpl.css
//vSsyiAdSPv
{CSSTemplate {
	$classpath: "js.carousel.widget.CarouselStyle"
}}

	{macro main()}

    {var transition="left "+js.carousel.widget.Carousel.TRANSITIONCSS/}

div.mywlibCarousel {
    overflow: hidden;
    position: relative; /* otherwise overflow will not be hidden in IE */
}

div.mywlibCarousel ul {
    list-style: none;
    margin: 0;
    padding: 0;
    position: relative;
    width: 9999px;
}

div.caption {
    background-color: rgba(0, 0, 0, 0.6);
    bottom: 0;
    color: white;
    font-size: 12pt;
    font-weight: bold;
    position: absolute;
    text-align: center;
    z-index: 9999;
}

div.mywlibCarousel ul.anim {
    transition: ${transition};
    -moz-transition: ${transition};
    -webkit-transition: ${transition};
    -o-transition: ${transition};
}

div.mywlibCarousel li {
    display:inline;
}

	{/macro}

{/CSSTemplate}
