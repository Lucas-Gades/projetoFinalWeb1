
function emailIsValid (email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

function validar() {
    var nome = document.getElementById('nome').value;
    var sexo = document.form1.sexo;
    var email = document.getElementById('email').value;
    var assunto = document.form1.assunto;
    var mensagem = document.getElementById('mensagem').value;
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
    } else if(!assunto[0].checked && !assunto[1].checked && !assunto[2].checked && !assunto[3].checked && !assunto[4].checked){
        alerta.innerHTML = 'Selecione um assunto';
        document.getElementById('a').style.color = 'red';
        return false;
    }else if(mensagem.length < 5){
        alerta.innerHTML = 'Digite na mensagem mais caracteres '
        document.getElementById('m').style.color = 'red';
        return false;
    }
    
    else {
        return true;
    }
}
var isBlackAndWhite = false;
function pretoEBranco(){
	if (isBlackAndWhite) {
		document.getElementById('body').classList.remove('preto-branco');
        document.getElementById('body').classList.add('body-image-color');
        document.getElementById('body').classList.remove('body-image-preto-branco');
		isBlackAndWhite = false;
	} else {
		document.getElementById('body').classList.add('preto-branco');
        document.getElementById('body').classList.add('body-image-preto-branco');
        document.getElementById('body').classList.remove('body-image-color');
		isBlackAndWhite = true;
	}
}
function aumentar() {
	document.body.style.zoom = '150%';
    document.getElementById('acessibilidade').style.fontSize = '1.5rem';
}
function tamanhoNormal() {
	document.body.style.zoom = '100%';
    document.getElementById('acessibilidade').style.fontSize = '2rem';
}

function diminuir() {
	document.body.style.zoom = '75%';
}