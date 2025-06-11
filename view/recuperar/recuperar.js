$(document).ready(function () {});

$(document).on("click", "#btnrecuperar", function () {
  var usu_correo = $("#usu_correo").val();

  if (usu_correo === "") {
    Swal.fire({
      title: "Recuperar",
      text: "El Correo Electrónico es obligatorio",
      icon: "error",
      confirmButtonColor: "#5156be",
    });
  } else {
    $.post(
      "../../controller/email.php?op=recuperar",
      { usu_correo: usu_correo },
      function (datos) {
        if (datos == 1) {
          Swal.fire({
            title: "Recuperar",
            text: "Se cambio la Contraseña y se envio a su Correo Electrónico.",
            icon: "success",
            confirmButtonColor: "#5156be",
          });
        } else {
          Swal.fire({
            title: "Recuperar",
            text: "El Correo Electrónico no existe",
            icon: "error",
            confirmButtonColor: "#5156be",
          });
        }
      }
    );
  }
});
