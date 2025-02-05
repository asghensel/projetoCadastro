
$(document).ready( function () {
new DataTable('#relatorio', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
         }
        },
        language: {
            search: "Pesquisar:",
            paginate: {
                previous: "Anterior",
                next: "Próximo "
            },
            info: "Exibindo _END_ de _TOTAL_ registros"
        }
    });
});