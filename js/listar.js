function deletar(idUsuario) {
    Swal.fire({
        title: "Tem certeza?",
        text: "Você realmente deseja excluir este item?",
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
            form.action = '../delete/deletar_usuario.php';
  
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'idUsuario';
            input.value = idUsuario;
  
  
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    });
  }
  