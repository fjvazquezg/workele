<?php error_reporting(0);
session_start();
$rol = $_SESSION['rol'];
include("../clases/function.class.php");
$buscar = Functions::singleton_functions();
if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];
    if($valor == 1) 
    {
        $id_usuario = $_SESSION['iusuario'];
        $conversacion = $buscar->buscarConversacion($id_usuario,$rol);
        echo json_encode($conversacion);
    } 
    else 
    { 
        if($rol == 1 )
        {
            $id_usuario = $_POST['id'];
            $id_empresa = $_SESSION['iusuario'];
        }
        else
        {
            $id_usuario = $_SESSION['iusuario'];
            $id_empresa = $_POST['id'];
        }

        if($valor == 2) {
            $mensaje = $buscar->buscarMensaje($id_empresa, $id_usuario);
            echo json_encode($mensaje);
        } else if ($valor == 3){
            $id_m = $_POST['id_m'];
            $Amensaje = $buscar->actualizarMensaje($id_empresa, $id_usuario,$id_m);
            echo json_encode($Amensaje);
        } else if($valor == 4) {
            $id_us = $_SESSION['iusuario'];
            $data =$id_us;
            echo json_encode($data);
        } else {
            echo json_encode(array("error" => "No se proporcionó el parámetro 'respuesta'"));
            exit;
        }
        
    } 
}
?>
