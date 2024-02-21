function validatePasswords() {
    var password = document.getElementsByName("wachtwoord")[0].value;
    var password2 = document.getElementsByName("wachtwoord2")[0].value;
  
    if (password !== password2) {
      alert("De wachtwoorden komen niet overeen.");
      return false; // Voorkomt dat het formulier wordt verzonden
    }
  
    // Voeg hier eventueel extra validatie toe, zoals wachtwoordsterktecontroles
  
    return true; // Staat het formulier toe om verzonden te worden
  }