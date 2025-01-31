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
  
        success: function (result) {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Operação concluída com sucesso!",
            text: result, // Exibe a mensagem retornada do servidor
            background: "#F5F5F5",
            color: "#333",
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
    Swal.fire({
        title: "Tem certeza?",
        text: "Você realmente deseja excluir este tipo?",
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
            form.action = '../delete/deletar_tipo.php';
  
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'idTipo';
            input.value = idTipo;
  
  
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    });
  }