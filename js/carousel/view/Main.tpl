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
