<?php
namespace PlugAnalistics;
class Company implements DomainEntityCastInterface{
    public $uuid;
    public $name_fantasia;
    public $razao_social;
    public $cnpj_cpjf;
    public $matriz;
    public $arms_system;
        
    function __construct($companyArray)
    {
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
             if(isset($companyArray[$name])){
                $this->$name = $companyArray[$name];
             }
        }
    }


}

 




?>