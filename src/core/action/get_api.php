<?php

namespace octoapi\core\action;
/**
 * @package octoapi\core\action
 * @author Ryno Van Zyl
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 *
 * The GET method is used to retrieve data from the server.
 * This is a read-only method, so it has no risk of mutating or corrupting the data.
 *
 * For example, if we call the get method on our API, we’ll get back a list of all to-dos.
 *
 */
class get_api extends \octoapi\core\com\intf\standard {
    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        view("getter");

        view(\OctoApi::$url);
        view(\OctoApi::$username);
        view(\OctoApi::$password);
    }
    //------------------------------------------------------------------------------------------------------------------

}