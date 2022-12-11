<?php
namespace PlugAnalistics;
use Exception;


class CustomersService{
	private $context =  null;
	private $user;
	private $serviceApi;
	private $httpService;
	private $types = ["CPF","CNPJ"];




    public  function __construct($api,$user,$serviceApi,$httpService)
    {
		$this->api = $api;	
		$this->user =  $user;
		$this->serviceApi= $serviceApi;
		$this->httpService =$httpService;
        return $this;
    }


    public function customersByRgCpjCnpj($token,$rgCnpj,$type){
    	if(Uteis::isEmpty($rgCnpj)  || !in_array(strtoupper($type),$this->types)){
    		throw new Exception('Rg ou Cnpj,invalido ou Tipo Invalido [ '.implode(",",$this->types).' ].',400);
    	}
		try{
			 
			$url = sprintf("%s/%s?uuid=%s&type=%s",$this->api,$this->serviceApi->customersByRgCpjCnpj,$rgCnpj,$type);
			$response = $this->httpService->get($url,$token);

		var_dump(json_decode($response,true));

	 
			
		
		  

		}catch(Exception $e){}

    }

}


?>