<?php 


ini_set('display_errors', 1);
error_reporting(E_ALL);


use PlugAnalistics\StringApp;
use PlugAnalistics\EndPointsServices;
use PlugAnalistics\AnaliticsDataIntegrationApi;

 
 

require_once("vendor/autoload.php");

try{

    $Anl  =   new AnaliticsDataIntegrationApi(new EndPointsServices(),"123456789","http://192.168.15.9/smdataanlystic/public");
    echo "<pre>";
    echo StringApp::getString('TESTE');
    //$Anl->loginIn("ed@a.c","1");
    //drmatematic@yahoo.com
    //$Anl->loginIn("drmatematic@yahoo.com","1");



    $Anl->loginIn("extractorAdminUser@analistics.com","1");

    $out = $Anl->activeUser();
    

    echo "<hr>";
    echo $out->api->jwt;
    echo "<hr>";
    


   $r =  $Anl->CustomersServices()->customersByRgCpjCnpj($out->api->jwt,"321866708975",'CPF');

   var_dump($r);

}catch(Exception $e){
    print_r($e->getMessage());
}


?>