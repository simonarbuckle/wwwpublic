Aria.tplScriptDefinition({
    $classpath: "js.carousel.view.MainScript",

    $prototype: {

        change: function(e, i) {
            aria.utils.Json.setValue(this.data, "curimg", i);
        }

    }
});
