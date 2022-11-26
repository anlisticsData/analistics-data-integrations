<?php


namespace PlugAnalistics;


class AnaliticsDataIntegration{
    private $httpServices = null;
    private $header =  [];

    function __construct($httpServices)
    {
        $this->httpServices = $httpServices;
    }
    function setHeader($type,$valor){
        $this->header[$type]=$valor;
    }
    function postUrlencoded($url,$data,$token){
        return $this->httpServices->postUrlencoded($url,$data,$token);
    }   
    public function  apiServices($url,$token=null){
        return $this->httpServices->get($url,$token);
    }
}





?>