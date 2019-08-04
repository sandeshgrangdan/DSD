// JavaScript source code
(function () {
    var preload = document.getElementById("preload");
    var loading = 0;
    var id = setInterval(frame, 2);

    function frame() {
        if (loading == 10000000000000000000) {
            clearInterval(id);
            window.open("wel.html", "_self");
        } else {
            loading = loading + 1;
            if (loading == 90) {
                preload.style.animation = "fadeout is ease"
            }
        }
    }
})();