var tabla;
var tabla_detalle;

$(document).ready(function(){ 

    tabla = $("#listado_table").dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax":{
            url: '../../controller/inhumacion.php?op=listarusuario',
            type : "get",
            dataType : "json",
            error:function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();

});

function ver(inhum_id){
    $.post(
    "../../controller/inhumacion.php?op=mostrar",{inhum_id:inhum_id},function(data){
      data = JSON.parse(data);
      $("#inhum_nom").val(data.inhum_nom);
      $("#inhum_papell").val(data.inhum_papell);
      $("#inhum_sapell").val(data.inhum_sapell);
      $("#inhum_sex").val(data.inhum_sex);
      $("#inhum_tip_doc").val(data.inhum_tip_doc);
      $("#inhum_num_doc").val(data.inhum_num_doc);
      $("#inhum_mun_fall").val(data.inhum_mun_fall);
      $("#inhum_man_muert").val(data.inhum_man_muert);
      $("#inhum_fecha_defun").val(data.inhum_fecha_defun);
      $("#inhum_cert_defun").val(data.inhum_cert_defun);
      $("#inhum_fech_nac").val(data.inhum_fech_nac);
      $("#inhum_cem_crem").val(data.inhum_cem_crem);
      $("#inhum_nom_fun").val(data.inhum_nom_fun);
      $("#inhum_nom_real_tram").val(data.inhum_nom_real_tram);
      $("#doc_respuesta").val(data.doc_respuesta);

      $("#inhum_id").val(data.inhum_id);

      /* $("#lbltramite").html(
        "Nro Tramite: " +
          data.rdcdo +
          " | Usuario: " +
          data.usu_nomape +
          " | Correo: " +
          data.usu_correo +
          " | Adjunto: " +
          data.cant +
          " | Estado: " +
          resultado
      );  */

     tabla_detalle = $("#listado_table_detalle").dataTable({
          aProcessing: true,
          aServerSide: true,
          searching: false,
          paging: false,
          lengthChange: false,
          colReorder: true,
          ajax: {
            url: "../../controller/inhumacion.php?op=listardetalle",
            type: "post",
            data: {inhum_id:inhum_id,det_tipo:'Pendiente'},
            dataType: "json",
            error: function (e) {
              console.log(e.responseText);
            },
          },
          bDestroy: true,
          responsive: true,
          bInfo: false,
          iDisplayLength: 5,
          autoWidth: false,
          language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
              sFirst: "Primero",
              sLast: "Último",
              sNext: "Siguiente",
              sPrevious: "Anterior",
            },
            oAria: {
              sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
              sSortDescending:
                ": Activar para ordenar la columna de manera descendente",
            },
          },
        })
        .DataTable();

     tabla_detalle_respuesta = $("#respuesta_table_detalle").dataTable({
          aProcessing: true,
          aServerSide: true,
          searching: false,
          paging: false,
          lengthChange: false,
          colReorder: true,
          ajax: {
            url: "../../controller/inhumacion.php?op=listardetalle",
            type: "post",
            data: {inhum_id:inhum_id,det_tipo:'Terminado'},
            dataType: "json",
            error: function (e) {
              console.log(e.responseText);
            },
          },
          bDestroy: true,
          responsive: true,
          bInfo: false,
          iDisplayLength: 5,
          autoWidth: false,
          language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
              sFirst: "Primero",
              sLast: "Último",
              sNext: "Siguiente",
              sPrevious: "Anterior",
            },
            oAria: {
              sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
              sSortDescending:
                ": Activar para ordenar la columna de manera descendente",
            },
          },
        })
        .DataTable();

    });
     $("#mnt_detalle").modal("show");
}
