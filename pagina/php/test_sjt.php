<?php
session_start();
include('../smarty/clases/save.class.php');
include('../smarty/clases/function.class.php');
include('../../smarty-master/libs/smarty.class.php');
$titulo = "Test SJT";

$_finduser = Functions::singleton_functions();
$_idusuario = $_SESSION['iusuario'];
$validacion = $_finduser->val_sjt($_idusuario);
$iusuario = $_SESSION['iusuario'];
$notificacionexperiencia = $_finduser->notificacionexperiencia($iusuario);
$notificacionformacion = $_finduser->notificacionformacion($iusuario);
$notificacionaficiones = $_finduser->notificacionaficiones($iusuario);
$notificacioninteres = $_finduser->notificacioninteres($iusuario);

$nuevasRespuestas = Save::singleton_guardar();

if (isset($_POST['btnfinalizar']))
{
    $_idusuario = $_SESSION['iusuario'];
    $preg1 = $_POST["preg1"];
    $preg2 = $_POST["preg2"];
    $preg3 = $_POST["preg3"];
    $preg4 = $_POST["preg4"];
    $preg5 = $_POST["preg5"];
    $preg6 = $_POST["preg6"];
    $preg7 = $_POST["preg7"];
    $preg8 = $_POST["preg8"];
    $preg9 = $_POST["preg9"];
    $preg10 = $_POST["preg10"];
    $preg11 = $_POST["preg11"];
    $preg12 = $_POST["preg12"];

    $nuevasrespuestas = $nuevasRespuestas->guardar_respuestasSJT($_idusuario,$preg1,$preg2,$preg3,$preg4,$preg5,$preg6,$preg7,$preg8,$preg9,$preg10,$preg11,$preg12);
    header("location:indexPrincipal.php");
}

?>