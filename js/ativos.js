$(document).ready(function () {
  // Função para salvar ou atualizar as informações do ativo
  $("#salvar_info").click(function () {
    let descricao_ativo = $("#descricao").val();
    let quantidade_ativo = $("#quantidade").val();
    let quantidadeMin_ativo = $("#quantidadeMin").val();
    let marca_ativo = $("#marca").val();
    let tipo_ativo = $("#tipo").val();
    let observacao_ativo = $("#observacao").val();
    let idAtivo = $("#idAtivo").val();
    let imagem_ativo = $("#imgAtivo");
    let observacaoQuant = $("#obsQuant").val();
    
    if(idAtivo== ""){
      acao='inserir';
    }else{
      acao='update';
    }
    
    if (idAtivo !== "") {
      if ($("#quantidade").val() != $("#quantidade").data('original')) {
        if (observacaoQuant.trim() === "") {
          alert("Por favor, informe o motivo da alteração da quantidade.");
          return false;
        }
      }
    }


    if (idAtivo !== "") {
      if ($("#obsQuant").val() == $("#obsQuant").attr('original')) {
        
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Ocorreu um erro na operação.",
          text: 'Negado troque o motivo da troca.',
          background: "#F5F5F5",
          color: "#333",
          confirmButtonColor: "#ff4757",
          timer: 2000
        });
        return false;
      }
    }

    var formData = new FormData();
    formData.append("acao", acao);
    formData.append("descricao", descricao_ativo);
    formData.append("quantidade", quantidade_ativo);
    formData.append("quantidadeMin", quantidadeMin_ativo);
    formData.append("marca", marca_ativo);
    formData.append("tipo", tipo_ativo);
    formData.append("observacao", observacao_ativo);
    formData.append("idAtivo", idAtivo);
    formData.append("obsQuant", observacaoQuant);

    if (imagem_ativo[0].files[0]) {
      formData.append("img", imagem_ativo[0].files[0]);
    }

    $.ajax({
      type: 'POST',
      url: "../controle/ativos_controle.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (result) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "<span style='color: #009000;'>Ativo cadastrado com sucesso</span>",
          text: result,
          background: "#F5F5F5",
          color: "#009000",
          confirmButtonColor: "#ff4757",
          showConfirmButton: false,
          timer: 2000
        }).then(() => {
          location.reload();
        });
      },
      error: function (xhr) {
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Ocorreu um erro na operação.",
          text: xhr.responseText,
          background: "#F5F5F5",
          color: "#333",
          confirmButtonColor: "#ff4757"
        });
      }
    });
  });

  
  $("#quantidade").on('input', function() {
    let original = $(this).data('original');
    let atual = $(this).val();
      if($('#modal').attr('data-edita') == 'sim'){
    if (original !== undefined && atual != original) {
      $("#divObsQuant").slideDown();
      $("#obsQuant").prop('required', true);
    } else {
      $("#divObsQuant").slideUp(); 
      $("#obsQuant").prop('required', false);
    }
  }
});
  
});

// Função para editar um ativo
function editar(idAtivo) {
  $('#idAtivo').val(idAtivo);
  $.ajax({
    type: 'POST',
    url: "../controle/ativos_controle.php",
    data: {
      acao: 'get_info',
      idAtivo: idAtivo
    },
    success: function (result) {

      
      let retorno = JSON.parse(result);
      $('#modal').click();
      $("#descricao").val(retorno[0]['descricaoAtivo']);
      $("#quantidade").val(retorno[0]['quantidadeAtivo']);
      $("#quantidade").data('original', retorno[0]['quantidadeAtivo']);
      $("#obsQuant").val(retorno[0]['observacaoQuant']);
      $("#quantidadeMin").val(retorno[0]['quantidadeMinima']);
      $("#marca").val(retorno[0]['idMarca']);
      $("#tipo").val(retorno[0]['idTipo']);
      $("#observacao").val(retorno[0]['observacaoAtivo']);
      if (retorno[0]['urlImagem']) {
        $("#previewImagem").attr("src", window.location.protocol + "//" + window.location.host + '/' + retorno[0]['urlImagem']);
        $(".div_previer").show();
      } else {
        $(".div_previer").hide();
      }
      $('#modal').attr('data-edita', 'sim');
      $("#obsQuant").attr('original', (retorno[0]['observacaoQuant']));

    }
    
  });
}

// Função para alterar o status do ativo
function muda_status(status, idAtivo) {
  $.ajax({
    type: 'POST',
    url: "../controle/ativos_controle.php",
    data: {
      acao: 'alterar_status',
      status: status,
      idAtivo: idAtivo
    },
    success: function (result) {
      alert(result);
      location.reload();
    }
  });
}


function infos(idAtivo) {
  $('#idAtivo').val(idAtivo);
  $.ajax({
    type: 'POST',
    url: "../controle/ativos_controle.php",
    data: {
      acao: 'get_info',
      idAtivo: idAtivo
    },
    success: function (result) {
      let retorno = JSON.parse(result);
      $('#infos').click();
      $("#descricaoInfos").val(retorno[0]['descricaoAtivo']);
      $("#quantidadeInfos").val(retorno[0]['quantidadeAtivo']);
      $("#quantidadeMinInfos").val(retorno[0]['quantidadeMinima']);
      $("#marcaInfos").val(retorno[0]['marca']);
      $("#tipoInfos").val(retorno[0]['tipo']);
      $("#observacaoInfos").val(retorno[0]['observacaoAtivo']);
      $("#dataInfos").val(retorno[0]['dataCadastroAtivo']);
      $("#usuarioInfos").val(retorno[0]['usuario']);
      if (retorno[0]['urlImagem']) {
        $("#previewImagemInfos").attr("src", window.location.protocol + "//" + window.location.host + '/' + retorno[0]['urlImagem']);
        $(".div_previer").show();
      } else {
        $(".div_previer").hide();
      }
    }
  });
}

// Função para limpar os campos do modal
function fechar_modal() {
  $("#descricao").val('');
  $("#quantidade").val('');
  $("#obsQuant").val('');
  $("#divObsQuant").hide();
  $('#quantidadeMin').val('');
  $("#marca").val('');
  $("#tipo").val('');
  $("#observacao").val('');
  $(".div_previer").hide();
  $('#modal').attr('data-edita', 'nao');
}

// Função para visualizar a imagem em tamanho maior
function verImagem(urlImagem) {
  $("#previewGrande").attr("src", window.location.protocol + "//" + window.location.host + '/' + urlImagem);
}

// Função para deletar um ativo
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

document.addEventListener('DOMContentLoaded', function () {
  var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
});
