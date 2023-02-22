<?php

namespace octoapi\core\action;

/**
 * @package octoapi\core\action
 * @author Ryno Van Zyl
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 *
 * The PUT method is most often used to update an existing resource.
 * If you want to update a specific resource (which comes with a specific URI), you can call the PUT method to that resource URI with the request body containing the complete new version of the resource you are trying to update.
 *
 */
class put_api extends \octoapi\core\com\intf\standard {
    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        view("put");

        view(\OctoApi::$url);
        view(\OctoApi::$username);
        view(\OctoApi::$password);
    }
    //------------------------------------------------------------------------------------------------------------------

}