<?php
namespace PlugAnalistics;
interface HttpInterface{
    function setHeader($type,$valor);
    function get($url,$token);
    function post($url,$data,$token);
    function postUrlencoded($url,$data,$token);
}




?>