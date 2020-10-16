$( document ).ready(function() {
  
  firebase.database().ref('Inscricoes').on('value',(snap)=>{
    var totalRecord =  snap.numChildren();
    console.log("Total Record : "+totalRecord);
    document.getElementById('inscritos').innerHTML = totalRecord+'';
  });
});


function total()
{
    firebase.database().ref('Inscricoes').on('value',(snap)=>{
        var totalRecord =  snap.numChildren();
        console.log("Total Record : "+totalRecord);
        document.getElementById('inscritos').innerHTML = "Paragraph changed!";
      });
}
