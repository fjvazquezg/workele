<?php 
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="seleccion de vacante";
$_finduser = Functions::singleton_functions();
$nuevoUsuario = Save::singleton_guardar();
$alerta = '';

if(isset($_POST['txt_id_vacante']))
{
    $id_vacante = $_POST['txt_id_vacante']; 
    $vacantes = $_finduser->seleccionar_vacantes($id_vacante);
    
}

if(isset($_POST['id_vacante']))
{
    $id_vacante = $_POST['id_vacante'];
    $vacantes = $_finduser->seleccionar_vacantes($id_vacante);
    $id_usuario = $_SESSION['iusuario'];
    $id_postulacion = $_finduser->consec_postulacion();
    $newlogusuario = $nuevoUsuario->guardar_postulacion($id_usuario,$id_vacante,$id_postulacion);
    $alerta = "<script>swal({
		title: '',
		text: 'Se guardo correctamente tu postulación',
		type: 'success',
	  });</script>";

      $smarty->assign("vacantes",$vacantes);
      $smarty->assign("alerta",$alerta);
      $smarty->display("../smarty/templates/seleccionar_vacantes.tpl");

}

else{
$smarty->assign("vacantes",$vacantes);
$smarty->assign("alerta",$alerta);
$smarty->display("../smarty/templates/seleccionar_vacantes.tpl");
}

?>