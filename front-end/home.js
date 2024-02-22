

document.addEventListener('DOMContentLoaded', function () {
    const verzendKnop = document.getElementById("openPopup");
    const popup = document.getElementById('popup');

    verzendKnop.addEventListener('click', () => {
        
        
        if (getComputedStyle(popup).display === 'none' || popup.style.display === '') {
            console.log("Showing Popup");
            popup.style.display = 'flex';
            setTimeout(() => {
                popup.style.opacity = '1';
            }, 0);
        } else {
            
            popup.style.opacity = '0';
            setTimeout(() => {
                popup.style.display = 'none';
            }, 300);
        }
    });
});
