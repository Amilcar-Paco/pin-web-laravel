$('#save_btn_turma').click(function() {

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
     var rootRef = firebase.database().ref().child("Turmas").push();
     var key = rootRef.getKey();

     var codigo_turma = '';
     var nome_curso = '';
     var nome_turma= '';
     var data_inicio = '';
     var data_fim = '';
     var horario = '';
     var formador = '';

     codigo_turma = $('#codigo').val();
     nome_curso = $('#curso').val();
     nome_turma = $('#turma').val();
     data_inicio = $('#inicio').val();
     horario= $('#horario').val();
     data_fim = $('#fim').val();
     formador = $("#formador :selected").val();

     console.log(codigo_turma);
     console.log(nome_curso);
     console.log(nome_turma);
     console.log(data_fim);
     console.log(data_inicio);
     console.log(horario);
     console.log(formador);

     rootRef.set({
       codigo:codigo_turma,
       turma:nome_turma,
       curso:nome_curso,
       inicio:data_inicio,
       fim:data_fim,
       horario:horario,
       formador:formador,
       chave:key
      })

      var url = getBaseURL();

      window.location.href = url+'admin/turmas';

});