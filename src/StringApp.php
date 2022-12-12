<?php
namespace PlugAnalistics;
class StringApp{
 
    public static function getString($stringId){
         $string = array("500" => "Error Http (get) ");
        return (isset($string[$stringId])) ? $string[$stringId] : "";
    }
}

?>