<?php
namespace PlugAnalistics;

use Exception;

class AnaliticsDataIntegrationApi{
    private $httpService = null;
    private $url_api = "http://localhost/smdataanlystic/public";
    private $token = null;
    private $tokenLoginIn = '123456789';
    private $user = null;
    private $response = null ;


    function __construct()
    {
        $this->httpService  = new AnaliticsDataIntegration(new CurlAdapter());
        return $this;
    }

    function setHeader($type,$valor){
        $this->httpService->setHeader($type,$valor);
    }

    public function apiServices(){
        $this->response = $this->httpService->apiServices($this->url_api,$this->token);
        return $this->response;
    }

    public function loginIn($user,$password){
        $data = array("login"=>$user,"password"=>$password);
        $this->user =  $this->httpService->postUrlencoded(sprintf("%s/%s",$this->url_api,'oauth'),$data,$this->tokenLoginIn);
        return $this->activeUser();
     }

    public function activeUser(){
        try{
            $paserJsonInObject = json_decode($this->user,true);
            return new User($paserJsonInObject['data']['user']);
        }catch(Exception $e){
            throw new Exception('Not Cast Json in User.('.$e->getMessage().')',500);
        }
    }
}

?>