window.onload = function () {
	var button = document.getElementById("lookup");
	var results = document.getElementById("result");
	var terms = document.getElementById("term");
    var all = document.getElementById("all");
    
    function success(col) {
        responsexml = col.responseText;
        results.innerHTML = responsexml;
    }
    

    button.addEventListener("click", function() {
        new Ajax.Request("world.php", {
            parameters : {
              lookup: terms.value,
              all: all.checked + "",
              format: "xml"
            },
            onSuccess : success,
            method : "post"
        });
    });
}