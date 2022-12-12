<?php
namespace PlugAnalistics;
class Extractors implements DomainEntityCastInterface{
   public $uuid;
   public $status;
   public $obs;
   public $version;
   public $company_uuid;
   public $segments_uuid;
    function __construct($extractorArray)
    {
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
             if(isset($extractorArray[$name])){
                $this->$name = $extractorArray[$name];
             }
        }
    }


}

 




?>