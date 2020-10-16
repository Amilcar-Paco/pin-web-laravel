const form = document.querySelector("#add-course");

// add data 
form.addEventListener('submit', (e) => {
    e.preventDefaul();
    db.colletion('cursos').add({
        
    })
});