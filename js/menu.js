
/* const navbarItems = document.querySelectorAll('.navbar-item');


 navbarItems.forEach(item => {
     const submenu = item.querySelector('.submenu');
     

     item.addEventListener('mouseover', () => {
         submenu.style.display = 'block';
     });

  
     item.addEventListener('mouseout', () => {
         submenu.style.display = 'none';
     });
 });*/


        function logoutUser() {
            Swal.fire({
                title: "Tem certeza?",
                text: "Você realmente deseja deslogar usuário?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sim, Sair",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '../controle/logOut_controle.php';
                    
                    document.body.appendChild(form);
                    form.submit();
                }
            }) 
        }
  

        