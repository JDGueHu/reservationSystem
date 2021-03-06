$(document).ready(function() {
    $('#example').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "language": {
            lengthMenu: "Mostrar _MENU_ registros por página",
            zeroRecords: "No hay registros para mostrar",
            info: "Mostrando página _PAGE_ de _PAGES_ de _MAX_ registros",
            infoEmpty: "No hay registros disponibles",
            infoFiltered: "(Filtrado de _MAX_ registros totales)",
            sSearch: "Buscar",
            paginate: {
            first:      "Primera",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Última"
        	},

        }
    });
} );