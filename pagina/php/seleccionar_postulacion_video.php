<?php 
include('../clases/save.class.php');
include('../clases/function.class.php');

$_finduser = Functions::singleton_functions();
    

if(isset($_GET['id_postulacion']) && isset($_GET['id_usuario'])) {
    // Obtener los valores de los parámetros
    $id_postulacion = $_GET['id_postulacion'];
    $id_usuario = $_GET['id_usuario'];
    $postulaciones = $_finduser->seleccionar_postulacion($id_postulacion);
    $vid_curriculum = $_finduser->seleccionar_vid_curriculum($id_usuario);
    $datos_totales = array(
        'postulaciones' => $postulaciones,
        'video_curriculum' => $vid_curriculum,
        'id_postulacion' => $id_postulacion,
        'id_usuario' => $id_usuario,
    );
}

echo json_encode($datos_totales);

?>