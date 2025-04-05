$(document).ready(function () {
    $('.salvarAcesso').click(function(){
         inputs = document.querySelectorAll('.check');
        let array_acesso = [];

        $(inputs).each( function (index, item) {
            if(!array_acesso[index]){
                array_acesso[index] = {};
            }

            if($(item).is(':checked')){
                array_acesso[index]['idOpcao']= $(item).val();
                array_acesso[index]['acesso']='S';
            }else{
                array_acesso[index]['idOpcao']= $(item).val();
                array_acesso[index]['acesso']='N';
            }
        
          });
            
          cargo = $('#cargo').val();
          let array_dados = {};
          array_dados['acao']='gravar_acesso';
          array_dados['cargo']=cargo;
          array_dados['acesso']=array_acesso;
          console.log(array_acesso);
            

      $.ajax({
        method : "POST",
        url: "../controle/acesso_controle.php",
        contentType : 'application/json',
        dataType : 'json',
        data : JSON.stringify(array_dados),
        success: function (result) {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "<span style='color: #009000;'>Acesso cadastrado com sucesso</span>",
              text: result, // Exibe a mensagem retornada do servidor
              background: "#F5F5F5",
              color: "#009000Z",
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
          },
});
});
});

function busca_acesso(){
   let cargo = $('#cargo').val();
   $('.check').each( function (index, element) { 
        $(this).prop('checked',false);
   });
   $.ajax({
    type: 'POST',
    url: "../controle/acesso_controle.php",
    data: {
      acao: 'busca_acesso',
      cargo:cargo
    },

      success: function (result) {
      let retorno = JSON.parse(result);
        $(retorno).each( function (index, acesso) { 
            if(acesso.statusAcesso == 'S'){
                $('.'+acesso.idOpcao).prop('checked',true);
            }else{
                $('.'+acesso.idOpcao).prop('checked',false);
            }
        }); 
      }
    })
}
    