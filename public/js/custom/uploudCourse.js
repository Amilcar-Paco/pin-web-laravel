$('#save_btn_curso').click(function (){




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

     // Your web app's Firebase configuration
     var rootRef = firebase.database().ref().child("Cursos").push();
     var key = rootRef.getKey();

    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    var date = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

    var nome_curso = '';
    var mensalidade_curso = '';
    var descricao_curso = '';
    var inscricao_curso = '';
    var duracao_curso = '';
    

    var image = document.getElementById("image").files[0];
    

    var link_image;
    

    var imageName = image.name;
    
    


    nome_curso = $("#name").val();
    mensalidade_curso = $("#mensalidade").val();
    descricao_curso= $("#description").val();
    inscricao_curso = $("#inscricao").val();
    duracao_curso = $("#duracao").val();

  var storageRef = firebase.storage().ref("images/"+date+' '+time+' '+imageName);

  var uploudTask = storageRef.put(image);



  uploudTask.on('state_changed', function (snapshot) {
    var progress = (snapshot.bytesTransferred/snapshot.totalBytes)*100;
    console.log("uploud is "+progress+" done");
  }, function (error){
    console.log(error.message);
  }, function(){
    uploudTask.snapshot.ref.getDownloadURL().then(function(downloadURL){
     link_image = downloadURL;
     rootRef.set({
    nome:nome_curso,
    description:descricao_curso,
    mensalidade:mensalidade_curso,
    inscricao:inscricao_curso,
    duracao: duracao_curso,
    chave:key,
    image:link_image,
    date:date,
    time:time,
    requisitos:"7ª classe",
    programa: "https://firebasestorage.googleapis.com/v0/b/pinapp-96d0a.appspot.com/o/programa%2F2020-02-21%209%3A7%3A37%20PROGRAMA%20%20DE%20CURSO%20%20DE%20GUIAS%20%20TURISTICOS%20PDF.pdf?alt=media&token=84ec844e-a5e4-4fb5-8163-63d2dc982236"
  })
      
    });
  });
  var url = getBaseURL();

  window.location.href = url+'admin/cursos';
});
