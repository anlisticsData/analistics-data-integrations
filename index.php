<?php 


ini_set('display_errors', 1);
error_reporting(E_ALL);


use PlugAnalistics\StringApp;
use PlugAnalistics\Dto\CustomersDTO;
use PlugAnalistics\EndPointsServices;
use PlugAnalistics\AnaliticsDataIntegrationApi;


require_once("vendor/autoload.php");

try{

//    $Anl  =   new AnaliticsDataIntegrationApi(new EndPointsServices(),"123456789","http://192.168.15.9/smdataanlystic/public");
    $Anl  =   new AnaliticsDataIntegrationApi(new EndPointsServices(),"123456789","http://localhost/smdataanlystic/public");

    echo "<pre>";
    echo StringApp::getString('TESTE');
    //$Anl->loginIn("ed@a.c","1");
    //drmatematic@yahoo.com
    //$Anl->loginIn("drmatematic@yahoo.com","1");



    $Anl->loginIn("extractorAdminUser@analistics.com","1");

    
    $out = $Anl->activeUser();
    

    echo "<hr>";
   // echo $out->api->jwt;
    echo "<hr>";
    


   $r =  $Anl->CustomersServices()->customersByRgCpjCnpj($out->api->jwt,"52993037854",'CPF');

   var_dump($r);

   echo "<hr>";


   $customeDTO = new CustomersDTO();
   


   $customeDTO->group="01b05133-b907-4f50-bf57-a86e852b2e06";
   $customeDTO->type_acount="cb272121-024b-4a1f-8df1-d19b99fd0616";
   $customeDTO->name="edilsonCsilva";
   $customeDTO->login="edicasa21@a.com";
   $customeDTO->password="123";
   $customeDTO->rg="254407018";
   $customeDTO->cpf="52993037854";
  



   $r =  $Anl->CustomersServices()->customersAddCustomers($out->api->jwt,$customeDTO);

   var_dump($r);





}catch(Exception $e){
    print_r($e->getMessage());
}


?>