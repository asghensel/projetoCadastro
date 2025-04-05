$(document).ready(function () {
  $("#salvar_info").click(function () {
    let descricao_opcao = $("#descricao").val();
    let nivel_acesso = $("#nivel").val();
    let url_opcao = $("#url").val();
    let idOpcao = $("#idOpcao").val();
    let idSuperior = $("#superior").val();

    if (idOpcao == "") {
      acao = 'inserir';
    } else {
      acao = 'update';
    }





    $.ajax({
      type: 'POST',
      url: "../controle/opcoes_controle.php",
      data: {
        idOpcao: idOpcao,
        idSuperior: idSuperior,
        acao: acao,
        descricao: descricao_opcao,
        nivel: nivel_acesso,
        url: url_opcao
      },

      success: function (result) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "<span style='color: #009000;'>Opcao cadastrado com sucesso</span>",
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
});




function mudaNivel(idSuperior=false){
  
let nivelSelecionado = $("#nivel").val();
    nivel = Number(nivelSelecionado) - 1;
  if ( nivel == "" || nivel == "0") {
    $("#divOpcMenu").hide();
} else {
    $("#divOpcMenu").show();
    
    $.ajax({
      type: 'POST',
      url: "../controle/opcoes_controle.php",
      data: {
        acao: 'buscaSuperior',
        buscar:nivel
      },
  
        success: function (result) {
        retorno = JSON.parse(result);
        

        var $selectSuperior = $("#superior");

        $selectSuperior.empty(); 
        
        if (result.length > 0) {
          $selectSuperior.append('<option value="">Selecione uma opção</option>');
          $(retorno).each( function (index, item) {
            if(idSuperior == item.idOpcao){
              $selectSuperior.append('<option value="' + item.idOpcao + '"selected>' + item.descricaoOpcao + '</option>');
            }else{
              $selectSuperior.append('<option value="' + item.idOpcao + '">' + item.descricaoOpcao + '</option>');
            }
              
          });
          
        }
      }
    });
  }
}







function muda_status(status, idOpcao) {
  $.ajax({
    type: 'POST',
    url: "../controle/opcoes_controle.php",
    data: {
      acao: 'alterar_status',
      status: status,
      idOpcao: idOpcao
    },

    success: function (result) {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "<span style='color: #009000;'>Status Alterado com sucesso</span>",
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





}

function editar(idOpcao) {

  $('#idOpcao').val(idOpcao)
  $.ajax({
    type: 'POST',
    url: "../controle/opcoes_controle.php",
    data: {
      acao: 'get_info',
      idOpcao: idOpcao
    },

    success: function (result) {
      retorno = JSON.parse(result)
      $('#modal').click();
      $("#descricao").val(retorno[0]['descricaoOpcao']);
      $("#nivel").val(retorno[0]['nivelOpcao']);
      $("#url").val(retorno[0]['urlOpcao']);
      mudaNivel(retorno[0]['idSuperior']);

      console.log(result);
    }
  });



};
function fechar_modal() {
  $("#descricao").val('');
  $("#divOpcMenu").hide('');
  $("#nivel").val('');
  $("#url").val('');
}

function deletar(idOpcao) {
  Swal.fire({
    title: "Tem certeza?",
    text: "Você realmente deseja excluir esta opção?",
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
      form.action = '../delete/deletar_opcao.php';

      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'idOpcao';
      input.value = idOpcao;


      form.appendChild(input);
      document.body.appendChild(form);
      form.submit();
    }
  });
}

