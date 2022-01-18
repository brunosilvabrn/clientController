

$(document).ready(function() {

    $('body').on('click', '#cadAdm', function(e){
        e.preventDefault();
        let senha = document.getElementById('senha');
        let confirmar = document.getElementById('confirmarSenha');     

        if (senha.value == confirmar.value && senha.value != '' && confirmar.value != '') {
            $('#admForm').submit();
        }else {
            alert("Senha e confimar senha incorretos!")
        }

    })

    $('body').on('click', '#altSenha', function(e){
        e.preventDefault();
        let senha = document.getElementById('senhaAlt');
        let confirmar = document.getElementById('confirmarSenhaAlt');     

        if (senha.value == confirmar.value && senha.value != '' && confirmar.value != '') {
            $('#admForm').submit();
        }else {
            alert("Senha e confimar senha incorretos!")
        }

    })

});


