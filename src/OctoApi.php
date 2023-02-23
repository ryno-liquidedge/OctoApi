<?php

include_once "core/core.php";

class OctoApi extends \octoapi\core\com\intf\standard {

    protected static $config;

    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    protected function __construct($options = []) {

        $options = array_merge([
            "url" => "",
            "username" => "",
            "password" => "",
        ], $options);

        self::$config = \octoapi\core\com\config\config::make($options);

    }
    //------------------------------------------------------------------------------------------------------------------

    /**
     * @param \com\intf\standard|\octoapi\core\com\config\config $config
     */
    public static function set_config($config): void {
        self::$config = $config;
    }
    //------------------------------------------------------------------------------------------------------------------

    /**
     * @return \com\intf\standard|\octoapi\core\com\config\config
     */
    public static function get_config() {
        return self::$config;
    }
    //------------------------------------------------------------------------------------------------------------------
    public function product(): \octoapi\action\product\main {
        return octoapi\action\product\main::make();
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