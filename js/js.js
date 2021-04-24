

function validar() {
    var nome = document.getElementById('nome').value;
    if(nome.length < 2){
        alert('Digite seu nome');
        document.getElementById('nome').focus();
    }else{
        window.document.form.submit();
    }
}
