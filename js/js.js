
function emailIsValid (email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

function validar() {
    var validation = '@';
    var nome = document.getElementById('nome').value;
    var sexo = document.form1.sexo;
    var email = document.getElementById('email').value;
    var alerta = document.getElementById('mensagem_erro');
    if(nome.length < 2) {
        alerta.innerHTML = 'Preencha nome corretamente.';
        document.getElementById('nome').focus();
        document.getElementById('n').style.color = 'red';
        return false;
    } else if (!sexo[0].checked && !sexo[1].checked && !sexo[2].checked) {
        alerta.innerHTML = 'Selecione um sexo';
        document.getElementById('s').style.color = 'red';
        return false;
    } else if (!emailIsValid(email)){    
        alerta.innerHTML = 'Digite seu e-mail corretamente.';
        document.getElementById('e').style.color = 'red';
        return false;
    } else {
        return true;
    }
}