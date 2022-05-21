<?php
require_once "../controladores/form.controlador.php";
require_once "../modelos/form.modelos.php";


class AjaxFormularios
{
  // Validar email existente
  public $validarEmail;
  public function ajaxValidarEmail()
  {
    $item = "email";
    $valor = $this->validarEmail;

    $respuesta = ControladorFormularios::ctrSelectRegistro($item, $valor);
    echo json_encode($respuesta);
  }
}

// Objeto de AJAX que recibe la variable POST
if (isset($_POST["validarEmail"])) {
  $valEmail = new AjaxFormularios();
  $valEmail->validarEmail = $_POST["validarEmail"];
  $valEmail->ajaxValidarEmail();
}
