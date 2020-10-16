function update(){
    var nome = document.getElementById('name').value;
    var description = document.getElementById('description').value;
    var inscricao = document.getElementById('inscricao').value;
    var mensalidade = document.getElementById('mensalidade').value;
    var duracao = document.getElementById('duracao').value;
    var cursoId = document.getElementById('cursoId').value;

    data = {nome, inscricao, mensalidade, duracao}

var ref = firebase.database().ref().child('Cursos/'+cursoId).update(data);

//    console.log(cursoId);
var url = getBaseURL();

window.location.href = url+'admin/cursos';
}

function pay() {
    
}

function getBaseURL() {
    var url = location.href;  // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));


    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href;  // window.location.href;
        var pathname = location.pathname;  // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }

}
