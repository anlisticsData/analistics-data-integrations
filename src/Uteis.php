<?php
namespace PlugAnalistics;

class Uteis{

    public static function isEmpty($value){
        $type = gettype($value);
        if($type == NULL){
            return true;
        }else if($type ==='object'){
            return false;
        }else  if($type ==='string'){
            return (strlen(trim($value))==0) ? true : false;
        }else  if($type ==='array'){
            return (is_countable($value) && count($value)==0) ? true : false;
        } 
        return false;
    }
}





?>