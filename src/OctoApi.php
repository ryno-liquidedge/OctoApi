<?php

include_once "core/core.php";

class OctoApi extends \octoapi\core\com\intf\standard {

    public static string $url;
    public static string $username;
    public static string $password;

    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    protected function __construct($options = []) {

        $options = array_merge([
            "url" => "",
            "username" => "",
            "password" => "",
        ], $options);

        if($options["url"]) self::$url = $options["url"];
        if($options["username"]) self::$username = $options["username"];
        if($options["password"]) self::$password = $options["password"];
    }
    //------------------------------------------------------------------------------------------------------------------
    public function get(): \octoapi\core\action\get_api {
        return \octoapi\core\action\get_api::make();
    }
    //------------------------------------------------------------------------------------------------------------------
    public function post(): \octoapi\core\action\post_api {
        return \octoapi\core\action\post_api::make();
    }
    //------------------------------------------------------------------------------------------------------------------
    public function put(): \octoapi\core\action\put_api {
        return \octoapi\core\action\put_api::make();
    }
    //------------------------------------------------------------------------------------------------------------------
    public function delete(): \octoapi\core\action\delete_api {
        return \octoapi\core\action\delete_api::make();
    }
    //------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
//global methods
//----------------------------------------------------------------------------------------------------------------------
if(!function_exists("view")){
    function view($mixed, $options = []){
        \octoapi\core\com\debug\debug::view($mixed, $options);
    }
}
//----------------------------------------------------------------------------------------------------------------------
if(!function_exists("console")){
    function console($mixed, $options = []){
        \octoapi\core\com\debug\debug::console($mixed, $options);
    }
}