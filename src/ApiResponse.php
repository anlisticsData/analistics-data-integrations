<?php
namespace PlugAnalistics;

class ApiResponse implements DomainEntityCastInterface{
   
    public $status;
    public $error;
    public $api;
    public $data;
    public $bundle; 



    function __construct($apiArray)
    {
      
        $this->sets(json_decode($apiArray,true));
    }


    public function sets($apiArray){
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
             if(isset($apiArray[$name])){
                $this->$name = $apiArray[$name];
             }
        }
    }






}