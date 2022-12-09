<?php 


ini_set('display_errors', 1);
error_reporting(E_ALL);


use PlugAnalistics\StringApp;
use PlugAnalistics\AnaliticsDataIntegrationApi;

 
 

require_once("vendor/autoload.php");
$Anl  =   new AnaliticsDataIntegrationApi("123456789","http://localhost/smdataanlystic/public");






echo "<pre>";


echo StringApp::getString('TESTE');

$Anl->loginIn("ed@a.c","1");


//drmatematic@yahoo.com
//$Anl->loginIn("drmatematic@yahoo.com","1");

$out = $Anl->activeUser();

print_r([$out]);

?>