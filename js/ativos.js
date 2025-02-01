$(document).ready(function () {
  $("#salvar_info").click(function () {
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
      type: 'POST',
      url: "../controle/ativos_controle.php",
      data: {
        acao: acao,
        descricao: descricao_ativo,
        marca: marca_ativo,
        tipo: tipo_ativo,
        quantidade: quantidade_ativo,
        observacao: observacao_ativo,
        idAtivo: idAtivo
      },
      success: function (result) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "<span style='color: #009000;'>Ativo cadastrado com sucesso</span>",
          text: result, // Exibe a mensagem retornada do servidor
          background: "#F5F5F5",
          color: "#009000",
          confirmButtonColor: "#ff4757",
          showConfirmButton: false,
          timer: 2000 // Duração do alerta
        }).then(() => {
          // Após o alerta, recarrega a página
          location.reload();
        });
      },
      error: function (xhr) {
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Ocorreu um erro na operação.",
          text: xhr.responseText, // Mostra a mensagem de erro retornada pelo servidor
          background: "#F5F5F5",
          color: "#333",
          confirmButtonColor: "#ff4757"
        });
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

function editar(idAtivo){
  
  $('#idAtivo').val(idAtivo)
  $.ajax({
    type:'POST',
    url: "../controle/ativos_controle.php",
    data:{
      acao:'get_info',
      idAtivo:idAtivo
    },

    success: function(result){
      retorno=JSON.parse(result)
      $('#modal').click();
      $("#descricao").val(retorno[0]['descricaoAtivo']);
      $("#quantidade").val(retorno[0]['quantidadeAtivo']);
      $("#marca").val(retorno[0]['idMarca']);
      $("#tipo").val(retorno[0]['idTipo']);
      $("#observacao").val(retorno[0]['observacaoAtivo']);
      
      console.log(result);
    }
});

  
};

function fechar_modal(){
  $("#descricao").val('');
      $("#quantidade").val('');
      $("#marca").val('');
      $("#tipo").val('');
      $("#observacao").val('');
}



function deletar(idAtivo) {
  Swal.fire({
      title: "Tem certeza?",
      text: "Você realmente deseja excluir este ativo?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sim, excluir",
      cancelButtonText: "Cancelar"
  }).then((result) => {
      if (result.isConfirmed) {
          var form = document.createElement('form');
          form.method = 'POST';
          form.action = '../delete/deletar_ativo.php';

          var input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'idAtivo';
          input.value = idAtivo;


          form.appendChild(input);
          document.body.appendChild(form);
          form.submit();
      }
  });
}

