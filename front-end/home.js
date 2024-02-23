

document.addEventListener('DOMContentLoaded', function () {
    const verzendKnop = document.getElementById("openPopup");
    const popup = document.getElementById('popup');
    const rekening = document.getElementById('overzicht');

    verzendKnop.addEventListener('click', () => {
        
        
        if (getComputedStyle(popup).display === 'none' || popup.style.display === '') {
            console.log("Showing Popup");
            popup.style.display = 'flex';
            setTimeout(() => {
                popup.style.opacity = '1';
            }, 0);

            rekening.style.opacity = '0';
            setTimeout(() => {
                rekening.style.display = 'none';
            }, 0);
        } else {
            console.log("Showing Rekening");
            rekening.style.display = "block";
            setTimeout(() => {
                rekening.style.opacity = '1';
            }, 0);

            popup.style.opacity = '0';
            setTimeout(() => {
                popup.style.display = 'none';
            }, 0);
        }
    });



});
