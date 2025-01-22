$(document).ready(function(){
    $("#salvar_info").click(function(){
      let descricao_tipo = $("#descricao").val();
      let idTipo = $("#idTipo").val();
        
  if(idTipo== ""){
    acao='inserir';
  }else{
    acao='update';
  }
  
  
      $.ajax({
        type:'POST',
        url: "../controle/tipos_controle.php",
        data:{
            idTipo:idTipo,
          acao:acao,
          descricao:descricao_tipo
        },
  
        success: function(result){
          alert(result);
          location.reload();
        }
      });
  
    });
  });

  function muda_status(status,idTipo){
    $.ajax({
      type:'POST',
      url: "../controle/tipos_controle.php",
      data:{
        acao:'alterar_status',
        status:status,
        idTipo:idTipo
      },
  
      success: function(result){
        alert(result);
        location.reload();
      }
  });

  



  }

  function editar(idTipo){
  
    $('#idTipo').val(idTipo)
    $.ajax({
      type:'POST',
      url: "../controle/tipos_controle.php",
      data:{
        acao:'get_info',
        idTipo:idTipo,
      },
  
      success: function(result){
        retorno=JSON.parse(result)
        $('#modal').click();
        $("#descricao").val(retorno[0]['descricaoTipo']);

        console.log(result);
      }
  });
  
    
  };
  function fechar_modal(){
    $("#descricao").val('');
  }

  function fechar_modal(){
    $("#descricao").val('');
  }

  function deletar(idTipo) {
    if (confirm("Tem certeza que deseja excluir este tipo?")) {
        $.ajax({
            type: 'POST',
            url: "../controle/tipos_controle.php",
            data: {
                acao: 'deletar',
                idTipo: idTipo
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