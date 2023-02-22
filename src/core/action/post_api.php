<?php

namespace octoapi\core\action;

/**
 * @package octoapi\core\action
 * @author Ryno Van Zyl
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 *
 * The POST method sends data to the server and creates a new resource.
 * The resource it creates is subordinate to some other parent resource.
 * When a new resource is POSTed to the parent, the API service will automatically associate the new resource by assigning it an ID (new resource URI).
 *
 * In short, this method is used to create a new data entry.
 *
 */
class post_api extends \octoapi\core\com\intf\standard {
    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        view("post");

        view(\OctoApi::$url);
        view(\OctoApi::$username);
        view(\OctoApi::$password);
    }
    //------------------------------------------------------------------------------------------------------------------

}