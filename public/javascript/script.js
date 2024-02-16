
const toutMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
toutMenu.forEach(item=>{
     const li = item.parentElement;

     item.addEventListener('click',function () {
        toutMenu.forEach(i=>{
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
     })
});

const toggle = document.querySelector('#content .navbar i');
const sidebar = document.getElementById('sidebar');
toggle.addEventListener('click',function () {
    sidebar.classList.toggle('hide');
}); 

const searchIcon =  document.querySelector('#content .navbar form .form-input button .fa');
const formSearch = document.querySelector('#content .navbar form');


if(window.innerWidth < 788){
    sidebar.classList.add('hide');
}
else if(window.innerWidth > 576){
    searchIcon.classList.replace('fa-x','fa-search');
    formSearch.classList.remove('show');
}

window.addEventListener('resize',function (){
    if(this.innerWidth > 576 ) {
        searchIcon.classList.replace('fa-x','fa-search');
        formSearch.classList.remove('show');
    }
})

function updateFileName() {
    const photoInput = document.getElementById('photoInput');
    const photoFileName = document.getElementById('photoFileName');

    if (photoInput.files.length > 0) {
        photoFileName.value = photoInput.files[0].name;
    }
}

function triggerFileInput() {
    // Activer le champ de fichier lorsque le champ texte est cliqué
    const photoInput = document.getElementById('photoInput');
    photoInput.click();
}
