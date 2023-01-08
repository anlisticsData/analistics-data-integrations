<?php
namespace PlugAnalistics;

use Exception;

class CurlAdapter implements HttpInterface{
    private $header =  [];
    private $headerResponse = null;
    

    function setHeader($type,$valor){
        $this->header[]=sprintf("%s:%s",$type,$valor);
    }
    

    private function setHeaderResponse($headerResponse){
        $this->headerResponse = [];
        foreach($headerResponse as $key => $header){
            $this->headerResponse[$key]= $header;
        }
    }
    public function getHeaderResponse($type){
        foreach($this->headerResponse as $key => $header){
            if($type==$key) return $header;
            
        }
        return null;
    }

    public function getHeaderResponseAll(){
        return $this->headerResponse;
    }

    
    function get($url,$token){
        $response = null;
        try{

            $this->header = [];
            $this->setHeader('Content-Type','application/json');
            $this->setHeader('jwt',$token);
            $curl = curl_init();
            curl_setopt($curl,CURLOPT_URL,$url);
            curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"GET");
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION,true); 
            curl_setopt($curl, CURLOPT_HTTPHEADER,$this->header);   
            $response=curl_exec($curl);
            $this->setHeaderResponse(curl_getinfo($curl));
            curl_close($curl);
 

        }catch(Exception $e){
            throw new  Exception("Error Http (get) ",500);
        }

        return $response;
    }
    function post($url,$data,$token){}
    function postUrlencoded($url,$data,$token){
        $response = null;
        try{
            $this->header=[];
            $this->setHeader('Content-Type','application/x-www-form-urlencoded');
            $this->setHeader('jwt',$token);
            $curl = curl_init($url);                                                                            
            curl_setopt($curl, CURLOPT_POST, true);                                                             
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));                                    
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION,true);                                                 
            curl_setopt($curl, CURLOPT_HTTPHEADER,$this->header);   
            $response = curl_exec($curl);         
            $this->setHeaderResponse(curl_getinfo($curl));
            curl_close($curl);                                     

        }catch(Exception $e){
            throw new  Exception("Error Http (post) ",500);
        }

        return   $response;

    }



    function postUrlencoded2($url,$data,$token){

        
        $response = null;
        try{
            $this->header=[];
            $this->setHeader('Content-Type','application/x-www-form-urlencoded');
            $this->setHeader('jwt',$token);
            $curl = curl_init($url);                                                                            
            curl_setopt($curl, CURLOPT_POST, true);                                                             
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));                                    
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION,true);                                                 
            curl_setopt($curl, CURLOPT_HTTPHEADER,$this->header);   
            $response = curl_exec($curl);         
            $this->setHeaderResponse(curl_getinfo($curl));
            curl_close($curl);  
 

                                     
            
            
        }catch(Exception $e){
            throw new  Exception("Error Http (post) ",500);
        }

        return   $response;

    }




}


/*

            $this->setHeader('Content-Type','application/x-www-form-urlencoded');
            $this->setHeader('jwt',$token);
            $curl = curl_init($url);                                                                            
            curl_setopt($curl, CURLOPT_POST, true);                                                             
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));                                    
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION,true);                                                 
            curl_setopt($curl, CURLOPT_HTTPHEADER,$this->header);   
            $response = curl_exec($curl);         
            $this->setHeaderResponse(curl_getinfo($curl));
            curl_close($curl);  
            








   $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                        "postvar1=value1&postvar2=value2&postvar3=value3");

            
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            curl_close($ch);

            print_r($server_output);


            */


?>