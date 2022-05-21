$("#email").change(function () {
  $(".alerta").remove();

  let email = $(this).val();
  console.log("email", email);

  let datos = new FormData();
  datos.append("validarEmail", email);

  $.ajax({
    url: "ajax/form.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (res) {
      if (res) {
        $("#email").val("");
        $("#email")
          .parent()
          .after(`<div class="alert">El email ya esta en uso</div>`);
      }
    },
  });
});
