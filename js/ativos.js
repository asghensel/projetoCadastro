$(document).ready(function(){
  $("#salvar_info").click(function(){
    let descricao_ativo = $("#descricao").val();
    let quantidade_ativo = $("#quantidade").val();
    let marca_ativo = $("#marca").val();
    let tipo_ativo = $("#tipo").val();
    let observacao_ativo = $("#observacao").val();
    let idAtivo = $("#idAtivo").val();

if(idAtivo== ""){
  acao='inserir';
}else{
  acao='update';
}


    $.ajax({
      type:'POST',
      url: "../controle/ativos_controle.php",
      data:{
        acao:acao,
        descricao:descricao_ativo,
        marca:marca_ativo,
        tipo:tipo_ativo,
        quantidade:quantidade_ativo,
        observacao:observacao_ativo
      },

      success: function(result){
        alert(result);
        location.reload();
      }
    });

  });
});

function muda_status(status,idAtivo){
  $.ajax({
    type:'POST',
    url: "../controle/ativos_controle.php",
    data:{
      acao:'alterar_status',
      status:status,
      idAtivo:idAtivo
    },

    success: function(result){
      alert(result);
      location.reload();
    }
});
}

