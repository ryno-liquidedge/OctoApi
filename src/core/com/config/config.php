<?php

namespace octoapi\core\com\config;

/**
 * @package octoapi\core\com\config
 * @author Ryno Van Zyl
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 */
class config {

    protected static string $url;
    protected static string $username;
    protected static string $password;

    //------------------------------------------------------------------------------------------------------------------
    public static function init($options = []) {

        $options = array_merge([
            "url" => "",
            "username" => "",
            "password" => "",
        ], $options);

        if($options["url"]) self::$url = $options["url"];
        if($options["username"]) self::$username = $options["username"];
        if($options["password"]) self::$password = $options["password"];

        return [
            "url" => self::$url,
            "username" => self::$username,
            "password" => self::$password,
        ];

    }
	//--------------------------------------------------------------------------------
}