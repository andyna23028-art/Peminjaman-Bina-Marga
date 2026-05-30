
let dateStart = new Date();
let dateEnd = new Date();
const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];


function toggleModal(show) {
    const overlay = document.getElementById('overlay');
    if (overlay) {
        overlay.classList.toggle('active', show);
        document.body.style.overflow = show ? 'hidden' : 'auto';
        if (show) {
            renderCalendar('start', dateStart);
            renderCalendar('end', dateEnd);
        }
    }
}

function renderCalendar(type, dateObj) {
    const container = document.querySelector(`#cal-${type}`);
    if (!container) return;

    const grid = container.querySelector('.cal-dates');
    const monthLabel = container.querySelector('.month-name');
    
    const year = dateObj.getFullYear();
    const month = dateObj.getMonth();

    monthLabel.innerText = `${monthNames[month]} ${year}`;
    grid.innerHTML = '';

    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

  
    for (let i = 0; i < firstDay; i++) {
        let div = document.createElement('div');
        div.className = 'empty';
        grid.appendChild(div);
    }

   
    for (let d = 1; d <= lastDate; d++) {
        let div = document.createElement('div');
        div.innerText = d;
        
        div.onclick = function() {
            container.querySelectorAll('.cal-dates div').forEach(el => el.classList.remove('selected'));
            div.classList.add('selected');
            console.log(`Terpilih ${type}: ${d}-${month + 1}-${year}`);
        };

        grid.appendChild(div);
    }
}


function changeMonth(type, val) {
    if (type === 'start') {
        dateStart.setMonth(dateStart.getMonth() + val);
        renderCalendar('start', dateStart);
    } else {
        dateEnd.setMonth(dateEnd.getMonth() + val);
        renderCalendar('end', dateEnd);
    }
}


function showSuccess() {
    toggleModal(false);
    const successPopup = document.getElementById('successPopup');
    if (successPopup) {
        successPopup.classList.add('active');
    }
}


function handleAction(status) {
    if (status === 'tersedia') {
        toggleModal(true);
    } else if (status === 'dipinjam') {
        document.getElementById('popupDipinjam').classList.add('active');
    } else if (status === 'maintenance') {
        document.getElementById('maintenancePopup').classList.add('active');
    }
}


function closeDipinjam() {
    document.getElementById('popupDipinjam').classList.remove('active');
}

function closeMaintenance() {
    document.getElementById('maintenancePopup').classList.remove('active');
}


window.onclick = function(event) {
    const dipinjam = document.getElementById('popupDipinjam');
    const maintenance = document.getElementById('maintenancePopup');
    const overlay = document.getElementById('overlay');

    if (event.target === dipinjam) closeDipinjam();
    if (event.target === maintenance) closeMaintenance();
    if (event.target === overlay) toggleModal(false);
};