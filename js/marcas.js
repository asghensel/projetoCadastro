$(document).ready(function(){
    $("#salvar_info").click(function(){
      let descricao_marca = $("#descricao").val();
      let idMarca = $("#idMarca").val();
        
  if(idMarca== ""){
    acao='inserir';
  }else{
    acao='update';
  }
  
  
      $.ajax({
        type:'POST',
        url: "../controle/marcas_controle.php",
        data:{
          idMarca:idMarca,
          acao:acao,
          descricao:descricao_marca
        },
  
        success: function(result){
          alert(result);
          location.reload();
        }
      });
  
    });
  });

  function muda_status(status,idMarca){
    $.ajax({
      type:'POST',
      url: "../controle/marcas_controle.php",
      data:{
        acao:'alterar_status',
        status:status,
        idMarca:idMarca
      },
  
      success: function(result){
        alert(result);
        location.reload();
      }
  });

  



  }

  function editar(idMarca){
  
    $('#idMarca').val(idMarca)
    $.ajax({
      type:'POST',
      url: "../controle/marcas_controle.php",
      data:{
        acao:'get_info',
        idMarca:idMarca
      },
  
      success: function(result){
        retorno=JSON.parse(result)
        $('#modal').click();
        $("#descricao").val(retorno[0]['descricaoMarca']);

        console.log(result);
      }
  });
  
    
  
  };
  function fechar_modal(){
    $("#descricao").val('');
  }

  function deletar(idMarca) {
    if (confirm("Tem certeza que deseja excluir esta marca?")) {
        $.ajax({
            type: 'POST',
            url: "../controle/marcas_controle.php",
            data: {
                acao: 'deletar',
                idMarca: idMarca
            },
            success: function (result) {
                alert(result);
                location.reload();
            },
            error: function (xhr) {
                alert("Erro ao tentar excluir a marca: " + xhr.responseText);
            }
        });
    }
}