<?php
namespace PlugAnalistics;
class Resources implements DomainEntityCastInterface{
	    public $uuid;
        public $nome;
        public $prefixo;
        public $url;
        public $icone;
        public $jsonobjct;
        public $type;
        public $relative_router;
        public $router;
        public $uuid_resources;
        function __construct($resourcesArray)
        {
            $class_vars = get_class_vars(get_class($this));
            foreach ($class_vars as $name => $value) {
                 if(isset($resourcesArray[$name])){
                    $this->$name = $resourcesArray[$name];
                 }
            }
        }
    





}
