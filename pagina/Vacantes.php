<?php
session_start();
if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
}
$_SESSION['tiempo'] = time();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Proyecto Web";
$nuevoUsuario = Save::singleton_guardar();
$_findUser = Functions::singleton_functions();
$_findPais = Functions::singleton_functions();
$_pais = $_findPais->buscaPaises();
$alerta = '';
if(isset($_POST['txtpuesto'])&& isset($_POST['txtsueldo'])&& isset($_POST['cmbpais'])&& isset($_POST['txtdatos'])&& isset($_POST['txtlatitud'])&& isset($_POST['txtlongitud']))
{
	$_idusuario = $_SESSION['iusuario'];
    $_puesto = $_POST['txtpuesto'];
    $_sueldo = $_POST['txtsueldo'];
    $_lugar = $_POST['cmbpais'];
    $_datos = $_POST['txtdatos'];
	$f_id_vacantes = $_findUser->consec_vacantes();
	$newuser = $nuevoUsuario->Guardar_id_vacantes($f_id_vacantes,$_idusuario,$_puesto,$_sueldo,$_lugar,$_datos);
    
	date_default_timezone_set('America/Mexico_City');
    $_movimiento = 'Vacantes(Guardar)';
    $_fecha = date('Y-m-d H:m:s');
    $_hora = $vida_session;
    $_latitud = $_POST['txtlatitud']; 
    $_longitud = $_POST['txtlongitud']; 
    $_ubicacion = 'Latitud: '.$_latitud.' Longitud: '.$_longitud;
    $newlogusuario = $nuevoUsuario->guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora);

    $alerta = "<script>swal({
		title: '',
		text: 'Se ha publicado la vacante correctamente!',
		type: 'success',
	  });</script>";

	$smarty->assign("titulo",$titulo);
	$smarty->assign("alerta",$alerta);
    $smarty->assign("Paises",$_pais);
	$smarty->display("../smarty/templates/Vacantes.tpl");

} else
{
    $smarty->assign("titulo", $titulo);
    $smarty->assign("alerta",$alerta);
    $smarty->assign("Paises",$_pais);
    $smarty->display("../smarty/templates/Vacantes.tpl");
}
?>
