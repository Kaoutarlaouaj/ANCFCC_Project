
// Fonction de validation du numéro de téléphone au Maroc
function estNumeroTelephoneMaroc(numero) {
    // Utilisation d'une expression régulière pour valider le format
    return /^(05|06|07)\d{8}$/.test(numero);
}

// Fonction appelée lorsque l'utilisateur saisit un numéro de téléphone
function validerNumeroTelephone(inputElement) {
    var numero = inputElement.value;
    var validationMessage = document.getElementById("validationMessage");

    if (estNumeroTelephoneMaroc(numero)) {
        validationMessage.innerHTML = "Numéro de téléphone valide.";
        validationMessage.style.color = "green";
    } else {
        validationMessage.innerHTML = "Numéro de téléphone non valide.";
        validationMessage.style.color = "red";
    }
}