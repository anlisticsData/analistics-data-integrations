<?php
namespace PlugAnalistics;
class Api implements DomainEntityCastInterface{
    public $status;
    public $error;
    public $api;
    public $uuid;
    public $jwt;

    function __construct($apiArray)
    {
        $this->sets($apiArray);
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