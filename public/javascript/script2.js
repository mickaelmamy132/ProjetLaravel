function voirMotPasse(){
    var indice = document.getElementById("voir");
    if(indice.type === "password"){
        indice.type = "text";
    }
    else{
        indice.type = "password";
    }
}

function addinculpation() {
    var inculpationGroupe = document.getElementById('inculpationGroup');
    var template = inculpationGroupe.querySelector('.inculpation');

    var clone = template.cloneNode(true);
    inculpationGroupe.appendChild(clone);
}

function removeinculpation(event) {
    var inculpation = event.target.closest('.inculpation');
    var inculpationGroupe = document.getElementById('inculpationGroup');
    
    if (inculpation && inculpationGroupe.querySelectorAll('.inculpation').length > 1) {
        inculpation.parentNode.removeChild(inculpation);
    }
}

document.querySelector('.add-inculpation').addEventListener('click', addinculpation);
document.getElementById('inculpationGroup').addEventListener('click', function(event) {
    if (event.target.classList.contains('remove-inculpation')) {
        removeinculpation(event);
    } 
});