let arrDocument = [];

Dropzone.autoDiscover = false;

let myDropzone = new Dropzone('#dropzone', {
  url: '../../assets/document/arch_inhumacion',
  maxFilesize: 10,
  maxFiles: 1,
  acceptedFiles: '.pdf',
  addRemoveLinks: true,
  dictRemoveFile: 'Quitar',
 error: function (file, response) {
    console.log('Error durante la carga del archivo.'); 
  },
});

myDropzone.on('maxfilesexceeded',function(file){
    Swal.fire({
        title: "Tramites Palmira",
        text: "Solo se permite un archivo.",
        icon: "error",
        confirmButtonColor: "#5156be",
    });
    myDropzone.removeFile(file);
});

myDropzone.on('addedfile',function(file){
    if (file.size > 10 * 1024 * 1024){
        Swal.fire({
            title: "Tramites Palmira",
            text: 'El archivo "'+ file.name +'" excede el tamaño maximo de 10 MB.',
            icon: "error",
            confirmButtonColor: "#5156be",
        });
        myDropzone.removeFile(file);

    }
});

function init() {
  $("#inhumacion_form").on("submit", function (e) {
    guardar(e);
  });
}

function guardar(e) {
  e.preventDefault();

  var formData = new FormData($("#inhumacion_form")[0]);
  $.ajax({
    url: "../../controller/inhumacion.php?op=registrar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      console.log(data);
    },
  });
}

$(document).on("click","#btnlimpiar",function(){
    $('#documento_form')[0].reset();
    Dropzone.forElement('.dropzone').removeAllFiles(true);
});

init();
