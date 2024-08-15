
// Fonction de validation du numéro de téléphone au Maroc
function estNumeroTelephoneMaroc2(numero2) {
    // Utilisation d'une expression régulière pour valider le format
    return /^(05|06|07)\d{8}$/.test(numero2);
}

// Fonction appelée lorsque l'utilisateur saisit un numéro de téléphone
function validerNumeroTelephone2(inputElement2) {
    var numero2 = inputElement2.value;
    var validationMessage2 = document.getElementById("validationMessage2");

    if (estNumeroTelephoneMaroc2(numero2)) {
        validationMessage2.innerHTML = "Numéro de téléphone valide.";
        validationMessage2.style.color = "green";
    } else {
        validationMessage2.innerHTML = "Numéro de téléphone non valide.";
        validationMessage2.style.color = "red";
    }
}