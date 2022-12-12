<?php
namespace PlugAnalistics;
class Dw implements DomainEntityCastInterface{
	 
    public $uuid;
    public $dwname;
    public $company_uuid;
    public $companyInformation;
    public $systemSrc;
    function __construct($dwArray)
        {
            $class_vars = get_class_vars(get_class($this));
            foreach ($class_vars as $name => $value) {
                 if(isset($dwArray[$name])){
                    $this->$name = $dwArray[$name];
                 }
            }
        }
    





}
