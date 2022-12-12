<?php
namespace PlugAnalistics;
class Access implements DomainEntityCastInterface{
    public $uuid;  
    public $nome;  
    public $created_at;
    
    
    function __construct($accessArray)
    {
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
             if(isset($accessArray[$name])){
                $this->$name = $accessArray[$name];
             }
        }
    }


}

 




?>