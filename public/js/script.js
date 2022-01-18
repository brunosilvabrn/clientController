$(document).ready(function() {
	// Cadastrar Administrador
	$('body').on('click', '#submit', function(){

	    $('#options').remove();
	    $('#square').css('opacity','100%');
	    $('#form').submit();

	});

	// Cadrastar Cliente
	$('body').on('click', '#sub', function(){
		
	    $('#options').remove();
	    $('#square').css('opacity','100%');
	    $('#formCadastrarCliente').submit();

	});

	// Editar Cliente 
	$('body').on('click', '#editarCliente', function(){
		
	    $('#options').remove();
	    $('#square').css('opacity','100%');
	    $('#formCadastrarCliente').submit();

	});

	// Alterar senha
	$('body').on('click', '#altSenha', function(){
	
	    $('#linkAlt').submit();

	});

	// Alterar senha
	$('body').on('click', '#pesquisar', function(){
		
		let pesquisa = $('#pesquisa');

		$('#formPesquisa').attr('action', 'painel/search/' + pesquisa.val());
	    $('#formPesquisa').submit();

	});

	// Pesquisar
	$('body').on('click', '#pesquisar2', function(){
		
		let pesquisa = $('#pesquisa2');

		if (pesquisa.val() == '') {
			window.location.href = "../../painel/search/";
		}else{
			$('#formPesquisa2').attr('action', '../../painel/search/' + pesquisa.val());
		    $('#formPesquisa2').submit();
	    }

	});

});


function atualizarPagina() {
	document.location.reload();
}

function DisableButton() {
    document.getElementById("submit").disabled = true;
}

function confirmarExclusao() {
	alert("Deseja realmente excluir esse cliente?");
}
