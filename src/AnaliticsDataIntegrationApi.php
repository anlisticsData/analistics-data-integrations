<?php
namespace PlugAnalistics;
use Exception;

class AnaliticsDataIntegrationApi{
    private $httpService = null;
    private $url_api = null;
    private $token = null;
    private $tokenLoginIn ='';
    private $user = null;
    private $response = null ;
    private $serviceApi = null;
    private $customersService = null;


    function __construct($serviceApi,$tokenLoginIn,$url_api)
    {
        $this->serviceApi = $serviceApi;
        $this->tokenLoginIn = $tokenLoginIn;
        $this->url_api = $url_api;
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
        $this->user =  $this->httpService->postUrlencoded(sprintf("%s/%s",$this->url_api,$this->serviceApi->oauth),$data,$this->tokenLoginIn);
        return $this->activeUser();
     }

    public function activeUser(){
        try{
            $paserJsonInObject = json_decode($this->user,true);
            
            $api = new Api($paserJsonInObject);
            if(!isset($paserJsonInObject['data']['uuid']))
                throw new Exception(sprintf('Error as Consume Remote resource. #[%s]',$this->serviceApi->oauth),500);
            
            
            if(!isset($paserJsonInObject['data']['jwt']))
                throw new Exception(sprintf('Error No Token. #[%s]',$this->serviceApi->oauth),500);
          

            $api->uuid =  $paserJsonInObject['data']['uuid'];
            $api->jwt =  $paserJsonInObject['data']['jwt'];
            $userCast = new User($paserJsonInObject['data']['user']);
            $userCast->api = $api;
            $userCast->access = new Access($paserJsonInObject['data']['group_acess']);
            if(!is_null($paserJsonInObject['data']['resources'])){
                foreach($paserJsonInObject['data']['resources'] as $key => $resource){
                    $userCast->resources[] = new Resources($resource);
                }
            }

            if(!is_null($paserJsonInObject['data']['dws'])){
                foreach($paserJsonInObject['data']['dws'] as $key => $dw){
                    $dwuser =  new Dw($dw);
                    $dwuser->companyInformation = new Company($dw['company']);
                    $userCast->dws[] =$dwuser;
                    
                }
            }


            if(!is_null($paserJsonInObject['data']['extractors'])){
                foreach($paserJsonInObject['data']['extractors'] as $key => $extractor){
                    $extractorUser =  new Extractors($extractor[0]);
                    $userCast->extractos[] =$extractorUser;
                    
                }
            }

           
           



            return $userCast;
        }catch(Exception $e){
            throw new Exception('Not Cast Json in User.('.$e->getMessage().')',500);
        }
    }

    public function CustomersServices(){
        $this->customersService = new CustomersService($this->url_api,$this->user,$this->serviceApi,$this->httpService);
        return $this->customersService;
    }
}

?>
 