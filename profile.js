
function openEdit() {

    document.getElementById("editPopup").style.display = "flex";

}

function closeEdit() {

    document.getElementById("editPopup").style.display = "none";

}


function openLogout() {

    document.getElementById("logoutPopup").style.display = "flex";

}

function closeLogout() {

    document.getElementById("logoutPopup").style.display = "none";

}


let selectedCard = null;

function openCancelPopup(button) {

  
    selectedCard = button.closest(".status-card");

   
    document.getElementById("cancelPopup").style.display = "flex";

}

function closeCancelPopup() {

    document.getElementById("cancelPopup").style.display = "none";

}


function confirmCancel() {

    if(selectedCard){

       
        selectedCard.style.transition = "0.3s";
        selectedCard.style.opacity = "0";
        selectedCard.style.transform = "translateX(50px)";

        setTimeout(() => {

            selectedCard.remove();

        }, 300);

    }

    
    closeCancelPopup();

}


function saveEdit() {

    let telp = document.querySelector(
        '#editPopup input[type="text"]'
    ).value;

    let pass = document.querySelector(
        '#editPopup input[type="password"]'
    ).value;

   
    document.querySelector(
        '.data p:nth-child(3) .value'
    ).innerText = telp;

    
    if (pass !== "" && pass !== "********") {

        document.querySelector(
            '.data p:nth-child(4) .value'
        ).innerText = "********";

    }

  
    let popup = document.querySelector(
        '#editPopup .popup-content'
    );

    popup.style.transform = "translateY(-20px)";
    popup.style.opacity = "0";

    setTimeout(() => {

        closeEdit();

        popup.style.transform = "translateY(0)";
        popup.style.opacity = "1";

        alert("Profil berhasil diubah!");

    }, 300);

}


document.addEventListener("DOMContentLoaded", function () {

    
    document.body.classList.add("show");

  
    const elements = document.querySelectorAll(".fade-up");

    elements.forEach((el, i) => {

        setTimeout(() => {

            el.classList.add("show");

        }, i * 150);

    });

});



function logout() {

    window.location.href = "berandabeforelog.php";

}