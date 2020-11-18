const form = document.querySelector("#add-course");

// add data 
form.addEventListener('submit', (e) => {
    e.preventDefaul();
    console.log("olá");
    db.colletion('cursos').add({
        teste:"teste"
    })
});