alert('oi');
function validar(){
    var nome = document.getElementById('nome').value;
    if(nome.lenght < 2){
        alert('Digite corretmanete seu nome');
        document.getElementById('nome').focus();
    } else{
        window.document.form.submit();
    }

}