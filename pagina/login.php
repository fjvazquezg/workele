<?php
//session_start();
require_once '../smarty/clases/login.class.php';
//include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$smarty=new smarty;
$titulo="Login";
//$buscarUsuario = Functions::singleton_functions();
$_SESSION['irol']=$_GET['xd'];
$nuevoSingleton = Login::singleton_login();
$alerta = "";
//$vac=$_GET['vacante'];
if (isset($_POST['usuario'])&&isset($_POST['password']))
{   
    $_usuario = $_POST['usuario'];
    $_password = $_POST['password'];

    //$usuario = $buscarUsuario->login($_usuario, $_password);
    $usuario = $nuevoSingleton->login_users($_usuario,$_password,$_SESSION['irol']);

 //
        // foreach ($usuario as $usuario => $value) {
        //     $_SESSION['iusuario']=$value['id_usuario'];
        //     $_SESSION['nomusuario']=$value['nombre'];
        //     $_ROL=$value['rol'];
        //     $vac=$_GET['vacante'];
        // }
      
        $_ROL= $_SESSION['irol'];
        //condicional si es usuario (el 2 se usa para la secion del usuario)
        //Si rol el un "2", manda al formulario de index que es el index de los usuarios
        if($usuario == TRUE)
        {
            if ($_ROL==2)
            {
                header("location:index.php");
            }
            //condicional si es empresa (el 1 se usa para las empresas)
            if ($_ROL==1)
            {
                header("location:indexEmpresa.php");
            }
        }
        else
	    {	
		
		
			$alerta="<script> 
			swal({
				title: '',
				html: 'Error al ingresar, verifique sus datos,si aun no esta registrado, vaya a la opcion registrarme, <strong>Si es empresa vaya a la pagina principal y seleccione soy empresa</strong>',
			type: 'warning',
			});</script>";
			$smarty->assign("alerta",$alerta);			
			$smarty->assign("titulo",$titulo);
			$smarty->display("../smarty/templates/login.tpl");
		
	    }
        
    //
}
else
{
        $smarty->assign("alerta",$alerta);	
        $smarty->assign("titulo", $titulo);
        $smarty->display("../smarty/templates/login.tpl");

}

    


?>