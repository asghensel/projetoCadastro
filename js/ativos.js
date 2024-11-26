$(document).ready(function(){
  $("#salvar_info").click(function(){
    let descricao_ativo = $("#descricao").val();
    let quantidade_ativo = $("#quantidade").val();
    let marca_ativo = $("#marca").val();
    let tipo_ativo = $("#tipo").val();
    let observacao_ativo = $("#observacao").val();



    $.ajax({
      type:'POST',
      url: "../controle/ativos_controle.php",
      data:{
        descricao:descricao_ativo,
        marca:marca_ativo,
        tipo:tipo_ativo,
        quantidade:quantidade_ativo,
        observacao:observacao_ativo
      },


      success: function(result){
    console.log(result);  
    }});




  });
});