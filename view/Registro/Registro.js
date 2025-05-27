var timerInterval;

function init() {
  /* TODO: escucha el evento submit del formulario */
  $("#mnt_form").on("submit", function (e) {
    /* TODO: evita que el formulario se envíe por defecto */
    e.preventDefault();

    /* TODO: validar el formulario */
    if (isFormValid()) {
      registrar(e);
    } else {
      /* TODO: sino es valido, muestra el mensaje de error */
      displayValidationMessages();
    }

    /* registrar(e); */
  });
}

function isFormValid() {
  /* TODO: usa validator.js para validar cada campo del formulario */
  return (
    validateEmail() &&
    validateText("usu_nomape") &&
    validatePassword() &&
    validatePasswordMatch()
  );
}

function validateEmail() {
  var email = $("#usu_correo").val();
  var isValid = validator.isEmail(email);
  displayErrorMessage("#usu_correo", isValid, "Ingrese correo electronico");

  return isValid;
}

function validateText(fieldId) {
  var value = $("#" + fieldId).val();
  var isValid = validator.isLength(value, { min: 1 });
  displayErrorMessage("#" + fieldId, isValid, "Este campo es obligatorio");

  return isValid;
}

function validatePassword() {
  var password = $("#usu_pass").val();
  var isValid = validator.isLength(password, { min: 8 });
  displayErrorMessage(
    "#usu_pass",
    isValid,
    "La contraseña debe tener al menos 8 caracteres"
  );

  return isValid;
}

function validatePasswordMatch() {
  var password = $("#usu_pass").val();
  var confirmPassword = $("#usu_pass_confir").val();
  var isValid = validator.equals(password, confirmPassword);
  displayErrorMessage(
    "#usu_pass_confir",
    isValid,
    "Las contraseñas no coinciden"
  );

  return isValid;
}

function displayErrorMessage(fieldSelector, isValid, message) {
  /* TODO: busca el elemento de mensaje de error y actualiza su contenido */
  var errorField = $(fieldSelector).next(".validation-error");
  errorField.text(isValid ? "" : message);
  errorField.toggleClass("text-danger", !isValid);
}

function displayValidationMessages() {
  /* TODO: muestra mensajes de error cerca de los campos del formulario */
  validateEmail();
  validateText("usu_nomape");
  validatePassword();
  validatePasswordMatch();
}

function registrar(e) {
  e.preventDefault();
  var formData = new FormData($("#mnt_form")[0]);
  $.ajax({
    url: "../../controller/usuario.php?op=registrar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      if (datos == 1) {
        Swal.fire({
          title: "Usuario Registrado",
          text: "Por favor inicie sesión. Redirigiendo en 5 segundos.",
          icon: "success",
          confirmButtonColor: "#5156be",
          timer: 5000,
          timerProgressBar: true,
          didOpen: function(){
            Swal.showLoading();

            timerInterval = setInterval(function() {
              var content = Swal.getHtmlContainer();
              if (!content) return;
              var countdownElement = content.querySelector("b");
              if (countdownElement) {
                countdownElement.textContent = (Swal.getTimerLeft() / 1000).toFixed(0);
              }
            }, 100);
          },
          didClose: function () {
            clearInterval(timerInterval);
            window.location.href = "../../index.php";
          },
        }).then(function (result) {
          if (result.dismiss === Swal.DismissReason.timer) {
            /* console.log("I was closed by the timer"); */
          }
        });
      } else if (datos == 0) {
        Swal.fire({
          title: "Error",
          text: "El usuario ya existe",
          icon: "error",
          confirmButtonColor: "#5156be",
        });
      }
      /* console.log(datos); */
    },
  });
}

init();
