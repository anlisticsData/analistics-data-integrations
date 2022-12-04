<?php 

use PlugAnalistics\StringApp;
use PlugAnalistics\AnaliticsDataIntegrationApi;

 
 

require_once("vendor/autoload.php");
$Anl  =   new AnaliticsDataIntegrationApi();






echo "<pre>";


echo StringApp::getString('TESTE');

$Anl->loginIn("ed@a.c","1");
$out = $Anl->activeUser();

print_r([$out]);

?>