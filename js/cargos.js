$(document).ready(function(){
    $("#salvar_info").click(function(){
      let descricao_Cargo = $("#descricao").val();
      let idCargo = $("#idCargo").val();
        
  if(idCargo== ""){
    acao='inserir';
  }else{
    acao='update';
  }
  
  
      $.ajax({
        type:'POST',
        url: "../controle/cargos_controle.php",
        data:{
          idCargo:idCargo,
          acao:acao,
          descricao:descricao_Cargo
        },
  
        success: function (result) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "<span style='color: #009000;'>Cargo cadastrado com sucesso</span>",
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

  function muda_status(status,idCargo){
    $.ajax({
      type:'POST',
      url: "../controle/cargos_controle.php",
      data:{
        acao:'alterar_status',
        status:status,
        idCargo:idCargo
      },
  
      success: function(result){
        alert(result);
        location.reload();
      }
  });

  



  }

  function editar(idCargo){
  
    $('#idCargo').val(idCargo)
    $.ajax({
      type:'POST',
      url: "../controle/cargos_controle.php",
      data:{
        acao:'get_info',
        idCargo:idCargo
      },
  
      success: function(result){
        retorno=JSON.parse(result)
        $('#modal').click();
        $("#descricao").val(retorno[0]['descricaoCargo']);

        console.log(result);
      }
  });
  
    
  
  };
  function fechar_modal(){
    $("#descricao").val('');
  }

  function deletar(idCargo) {
    Swal.fire({
        title: "Tem certeza?",
        text: "Você realmente deseja excluir esta Cargo?",
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
            form.action = '../delete/deletar_cargo.php';
  
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'idCargo';
            input.value = idCargo;
  
  
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    });
  }
  
  