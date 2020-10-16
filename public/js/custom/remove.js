function removerCurso(confirm, key) {
    if (confirm == true){
        var rootRef = firebase.database().ref().child("Cursos").child(key).remove();
    }     
}

function removerInscricao(confirm, key) {
    if (confirm == true){
        var rootRef = firebase.database().ref().child("Inscricoes").child(key).remove();
    }     
}
