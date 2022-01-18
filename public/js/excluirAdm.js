function excluir(e){

    let linha = $(e).closest("tr");
    let nome = linha.find("td:eq(0)").text().trim();
    let id = linha.find("th:eq(0)").text().trim(); 

    $('#temp').remove();
    $('#nomeAdm').append('<span id="temp">'+ nome + '</span>');
    $('#link').attr('action', 'administradores/excluir/' + id);
    
}