<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$titulo = "Test de merril";
if($_SESSION['iusuario'] == "")
{  
        header("location:login.php");
}
else
{
$smarty=new smarty;
$_finduser = Functions::singleton_functions();
$nuevasRespuestas = Save::singleton_guardar();
$_idusuario = $_SESSION['iusuario'];
$validacion = $_finduser->val_merril($_idusuario);
if (!isset($_COOKIE['contador'])) {
    setcookie('contador', 0, time() + 3600); // 1 hora de duración
}
if (isset($_POST['btn-finalizar']))
{
    if($validacion == TRUE)
    {
    echo('<script type="text/javascript">alert("este este test ya ha sido registrado");</script>');
    }
    else{
    $id = $_finduser->consec_merril();
    $serie_1 = $_POST['resultado1'];
    $serie_2 = $_POST['resultado2'];
    $serie_3 = $_POST['resultado3'];
    $serie_4 = $_POST['resultado4'];
    $serie_5 = $_POST['resultado5'];
    $serie_6 = $_POST['resultado6'];
    $serie_7 = $_POST['resultado7'];
    $serie_8 = $_POST['resultado8'];
    $newuser = $nuevasRespuestas->guardar_merril($id,$_idusuario, $serie_1,  $serie_2, $serie_3, $serie_4, $serie_5, $serie_6, $serie_7, $serie_8);
    }
}


$smarty->assign("titulo", $titulo);
$smarty->display("../smarty/templates/test_merril.tpl");}
?>