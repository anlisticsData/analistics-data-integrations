<?php
namespace PlugAnalistics;
use Exception;
 

class CompanyService{
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

 

	public function customersAddCompany($token,$companyDto){

    	if(Uteis::isEmpty($companyDto->uuid_customes)  || Uteis::isEmpty($companyDto->name_fantasia) 
			|| Uteis::isEmpty($companyDto->razao_social) || Uteis::isEmpty($companyDto->cnpj_cpjf) ){
    		
				throw new Exception('ID Customes ou Nome Fantasia ou Razao Socia ou  CNPJ ',400);
    	}
		try{
			$url = sprintf("%s/%s",$this->api,$this->serviceApi->customersAddCustomers);
			$data = array(
				"uuid_customes"=>$companyDto->uuid_customes,
				"name_fantasia"=>$companyDto->name_fantasia,
				"razao_social"=>$companyDto->razao_social,
				"cnpj_cpjf"=>$companyDto->cnpj_cpjf,
				"uuid_start_sys"=>$companyDto->uuid_start_sys,
				"uuid_matriz"=>$companyDto->uuid_matriz,
				 
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