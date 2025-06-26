var tabla;
var tabla_detalle;

let arrDocument = [];

Dropzone.autoDiscover = false;

let myDropzone = new Dropzone(".dropzone", {
 url:'../../assets/document/', 
  /* url: "../../controller/inhumacion.php?op=temporary_upload", */
  maxFilesize: 10,
  maxFiles: 5,
  acceptedFiles: "application/pdf",
  addRemoveLinks: true,
  dictRemoveFile: "Quitar",
  cache: false,
  processData: false,
  error: function (file, response) {
    // Oculta el mensaje de error
    console.log("Error: " + response);
  },
});

myDropzone.on("maxfilesexceeded", function (file) {
  Swal.fire({
    title: "Trámites Palmira",
    text: "Solo se permiten un máximo de 5 archivos.",
    icon: "error",
    confirmButtonColor: "#5156be",
  });
  myDropzone.removeFile(file);
});

myDropzone.on("addedfile", function (file) {
  if (file.size > 10 * 1024 * 1024) {
    Swal.fire({
      title: "Trámites Palmira",
      text: 'El archivo "' + file.name + '" excede el tamaño maximo de 10 MB.',
      icon: "error",
      confirmButtonColor: "#5156be",
    });
    myDropzone.removeFile(file);
  }
});

myDropzone.on("addedfile", (file) => {
  arrDocument.push(file);
});

myDropzone.on("removedfile", (file) => {
  let i = arrDocument.indexOf(file);
  arrDocument.splice(i, 1);
});

$(document).ready(function () {
  $.post("../../controller/usuario.php?op=comboarea", function (data) {
    $("#area_id").html(data);
  });

  $("#area_id").change(function () {
    $("#area_id").each(function () {
      area_id = $(this).val();

      tabla = $("#listado_table")
        .dataTable({
          aProcessing: true,
          aServerSide: true,
          dom: "Bfrtip",
          searching: true,
          lengthChange: false,
          colReorder: true,
          buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
          ajax: {
            url: "../../controller/inhumacion.php?op=listarxarea",
            type: "post",
            data: { area_id: area_id, doc_estado: "Pendiente" },
            dataType: "json",
            error: function (e) {
              console.log(e.responseText);
            },
          },
          bDestroy: true,
          responsive: true,
          bInfo: true,
          iDisplayLength: 10,
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
  });
});

function ver(inhum_id) {
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

      $("#inhum_id").val(data.inhum_id);

      /*$("#lbltramite").html(
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
      ); */

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

     /*  $("#mnt_modal").modal("show"); */
    }
  );

  $("#mnt_detalle").modal("show");
}

function init() {
  $("#documento_form").on("submit", function (e) {
    guardar(e);
  });
}

function guardar(e) {
  e.preventDefault();

  if (arrDocument.length === 0) {
    Swal.fire({
      title: "No hay archivos adjuntos, esta seguro de responder el tramite?",
      icon: "info",
      showDenyButton: true,
      confirmButtonText: "Si",
      denyButtonText: `No`,
    }).then((result) => {
      if (result.isConfirmed) {
        enviartramite();
      }
    });
  } else {
    enviartramite();
  }
} 

function enviartramite() {
  $("#btnguardar").prop("disabled", true);
  $("#btnguardar").html(
    '<i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>Espere..'
  );

  var formData = new FormData($("#documento_form")[0]);

  var totalfiles = arrDocument.length;

  console.log(totalfiles);
  for (var i = 0; i < totalfiles; i++) {
    formData.append("file[]", arrDocument[i]);
  }

  $.ajax({
    url: "../../controller/inhumacion.php?op=respuesta",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#documento_form")[0].reset();
      Dropzone.forElement(".dropzone").removeAllFiles(true);

      $("#mnt_detalle").modal("hide");

      $("#listado_table").DataTable().ajax.reload();

      Swal.fire({
        title: "Trámites Palmira",
        html:
        "El trámite ha sido respondido con éxito e informado al usuario: <br><strong>" + data + "</strong>",
        icon: "success",
        confirmButtonColor: "#5156be",
      });

      $("#btnguardar").prop("disabled", false);
      $("#btnguardar").html("Guardar");
    },
  });
}

init();
