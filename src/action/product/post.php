<?php

namespace octoapi\action\product;

/**
 * @package octoapi\core\action\product
 * @author Ryno Van Zyl
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 */
class post extends \octoapi\core\com\intf\post {

    use \octoapi\core\com\tra\action;

    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        view("post");
    }
    //------------------------------------------------------------------------------------------------------------------

}