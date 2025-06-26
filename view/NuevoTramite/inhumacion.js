let arrDocument = [];

Dropzone.autoDiscover = false;

let myDropzone = new Dropzone("#dropzone", {
  url: "../../assets/document/",
  maxFilesize: 10,
  maxFiles: 1,
  acceptedFiles: "application/pdf",
  addRemoveLinks: true,
  dictRemoveFile: "Quitar",
  error: function (file, response) {
    console.log("Error durante la carga del archivo.");
  },
});

myDropzone.on("maxfilesexceeded", function (file) {
  Swal.fire({
    title: "Trámites Palmira",
    text: "Solo se permite un archivo.",
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

function init() {
  $("#inhumacion_form").on("submit", function (e) {
    guardar(e);
  });
}

function guardar(e) {
  e.preventDefault();

  if(arrDocument.length === 0){
        Swal.fire({
            title: "No hay archivos adjuntos.",
            icon: "info",
        });
    }else{
        enviartramite();
    }

    function enviartramite(){
    $('#btnguardar').prop("disabled",true);
    $('#btnguardar').html('<i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>Espere..');


  var formData = new FormData($("#inhumacion_form")[0]);

  var totalfiles = arrDocument.length;

  console.log(totalfiles);
  for (var i = 0; i < totalfiles; i++) {
    formData.append("file[]", arrDocument[i]);
  }

  $.ajax({
    url: "../../controller/inhumacion.php?op=registrar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {

      $('#inhumacion_form')[0].reset();
      Dropzone.forElement('.dropzone').removeAllFiles(true);

      console.log(data);
      
      Swal.fire({
        title: "Trámites Palmira",
        html: "El trámite ha sido registrado con éxito. Su número de radicado es: <br><strong>" + data + "</strong>",
        icon: "success",
        confirmButtonColor: "#5156be",
      });

            $('#btnguardar').prop("disabled",false);
            $('#btnguardar').html('Guardar');

    },
  });
  }
}

$(document).on("click", "#btnlimpiar", function () {
  $("#inhumacion_form")[0].reset();
  Dropzone.forElement(".dropzone").removeAllFiles(true);
});

init();