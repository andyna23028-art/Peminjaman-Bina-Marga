document.addEventListener("DOMContentLoaded", function () {

    
    const logoutPopup = document.getElementById("logoutPopup");

    window.openLogout = function () {
        logoutPopup.style.display = "flex";
    };

    window.closeLogout = function () {
        logoutPopup.style.display = "none";
    };

    window.logout = function () {
        window.location.href = "berandabeforelog.php";
    };

   
    logoutPopup.addEventListener("click", function (e) {
        if (e.target === logoutPopup) {
            closeLogout();
        }
    });

});