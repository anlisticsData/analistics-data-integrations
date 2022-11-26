<?php


namespace PlugAnalistics;



class User{
    public $uuid;
    public $name;
    public $login;
    public $senha;
    public $type;
    public $created_at;
    public $updated_at;
    public $deleted_at;
    public $groups_uuid;
    public $type_of_accounts_uuid;
    public $status;
    public $avatar;


    function __construct($UserArray)
    {
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
             if(isset($UserArray[$name])){
                $this->$name = $UserArray[$name];
             }
        }
    }

    
  
    
}