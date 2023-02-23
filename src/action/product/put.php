<?php

namespace octoapi\action\product;

/**
 * @package octoapi\core\action\product
 * @author Ryno Van Zyl
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 */
class put extends \octoapi\core\com\intf\put {

    use \octoapi\core\com\tra\action;

    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        view("put");
//        view($this->get_config());
//        view($this->get_service()->call());

    }
    //------------------------------------------------------------------------------------------------------------------

}