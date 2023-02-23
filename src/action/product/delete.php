<?php

namespace octoapi\action\product;

/**
 * @package octoapi\core\action\product
 * @author Ryno Van Zyl
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 */
class delete extends \octoapi\core\com\intf\delete {

    use \octoapi\core\com\tra\action;

    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        view("delete");

        view(\OctoApi::get_config());
    }
    //------------------------------------------------------------------------------------------------------------------

}