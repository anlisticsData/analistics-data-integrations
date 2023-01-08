<?php
namespace PlugAnalistics;
use Exception;
 

class CustomersService{
	private $context =  null;
	private $user;
	private $api;
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
			$response =new ApiResponse($this->httpService->get($url,$token));
			if($response->status == null){
				$response->status = $this->httpService->getHeaderResponse('http_code');
				return $response;
			}
			return $response;
		}catch(Exception $e){}
		return null;
    }

	public function customersAddCustomers($token,$customersDto){

    	if(Uteis::isEmpty($customersDto->login)  || Uteis::isEmpty($customersDto->password) 
			|| Uteis::isEmpty($customersDto->rg) || Uteis::isEmpty($customersDto->cpf) ){
    		
				throw new Exception('Rg ou Cnpj ou login ou  Senha,invalido ',400);
    	}
		try{
			$url = sprintf("%s/%s",$this->api,$this->serviceApi->customersAddCustomers);
			$data = array(
				"group"=>$customersDto->group,
				"type_acount"=>$customersDto->type_acount,
				"name"=>$customersDto->name,
				"login"=>$customersDto->login,
				"password"=>$customersDto->password,
				"rg"=>$customersDto->rg,
				"cpf"=>$customersDto->cpf,
			);
			$response =new ApiResponse($this->httpService->postUrlencoded($url,$data,$token));
			if($response->status == null){
				$response->status = $this->httpService->getHeaderResponse('http_code');
				return $response;
			}
			return $response;
		}catch(Exception $e){}
		return null;
    }


}


?>