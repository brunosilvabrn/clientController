function editar(e){

    let linha = $(e).closest("tr");
    let nome = linha.find("td:eq(0)").text().trim();
    let cpf  = linha.find("td:eq(1)").text().trim(); 
    let telefone = linha.find("td:eq(2)").text().trim(); 
    let email   = linha.find("td:eq(3)").text().trim(); 

    let id = linha.find("th:eq(0)").text().trim(); 

    $("#id").val(id);

    $('#temp').remove();
    $('#nomeCliente').append('<span id="temp">'+ nome + '</span>');
    $("#nome").val(nome);
    $("#cpf").val(cpf);
    $("#telefone").val(telefone);
    $("#email").val(email);
   
}

function alterarSenha(e){
    
    let linha = $(e).closest("tr");
    let nome = linha.find("td:eq(0)").text().trim();
    let id = linha.find("th:eq(0)").text().trim(); 

    $('#temp').remove();
    $('#nomeAdm').append('<span id="temp">'+ nome + '</span>');
    $('#linkAlt').attr('action', 'administradores/alterarsenha/' + id);
 
   
}