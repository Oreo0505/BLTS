function disableBackButton() { 
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function() {
        window.history.pushState(null, "", window.location.href);
    };
    alert("Successfully! Browser back button disabled");
}
