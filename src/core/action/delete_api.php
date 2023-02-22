<?php

namespace octoapi\core\action;

/**
 * @package octoapi\core\action
 * @author Ryno Van Zyl
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 *
 * The DELETE method is used to delete a resource specified by its URI.
 */
class delete_api extends \octoapi\core\com\intf\standard {
    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        view("delete");

        view(\OctoApi::$url);
        view(\OctoApi::$username);
        view(\OctoApi::$password);
    }
    //------------------------------------------------------------------------------------------------------------------

}