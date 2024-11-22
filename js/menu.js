
 const navbarItems = document.querySelectorAll('.navbar-item');


 navbarItems.forEach(item => {
     const submenu = item.querySelector('.submenu');
     

     item.addEventListener('mouseover', () => {
         submenu.style.display = 'block';
     });

  
     item.addEventListener('mouseout', () => {
         submenu.style.display = 'none';
     });
 });

 function logoutUser() {
    alert('Usuario desconectado');
    window.location.href = '../controle/logOut_controle.php';
}