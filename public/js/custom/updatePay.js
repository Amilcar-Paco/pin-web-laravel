function pay(id) {
    var estado = '1';

    data={estado}

    firebase.database().ref().child('Inscricoes/'+id).update(data);

    var url = getBaseURL();

    window.location.href = url+'inscricoes';
}

function activo(id){
    var estado = '1';

    data={estado}

    firebase.database().ref().child('Formadores/'+id).update(data);

    var url = getBaseURL();

    window.location.href = url+'admin/formadores';

}


function desativo(id){
    var estado = '0';

    data={estado}

    firebase.database().ref().child('Formadores/'+id).update(data);

    var url = getBaseURL();

    window.location.href = url+'admin/formadores';

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
