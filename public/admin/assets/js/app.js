function SidebarHeight() {
    heightHeader = $(".card-heading").outerHeight();
    $(".js-height-fix").css("height", "calc(100vh - " + heightHeader + "px)");
}

$(window).on("load resize", function onLoadWindow() {
    SidebarHeight();
});

document.addEventListener("DOMContentLoaded", function () {
    const alert = document.getElementById("success-alert");
    if (alert) {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 3000); 
    }
});

// if ($('location')) {
//     CKEDITOR.replace('location');
// }