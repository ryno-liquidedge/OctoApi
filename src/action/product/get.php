<?php

namespace octoapi\action\product;
/**
 * @package octoapi\action\product
 * @author Ryno Van Zyl
 * @copyright Copyright Liquid Edge Solutions. All rights reserved.
 */
class get extends \octoapi\core\com\intf\get {

    use \octoapi\core\com\tra\action;

    //------------------------------------------------------------------------------------------------------------------
    // construct
    //------------------------------------------------------------------------------------------------------------------
    /**
     * @param array $options
     * @return \com\intf\standard|\octoapi\core\com\octo\response
     * @throws \Exception
     */
    public function get_product_list($options = []) {

        $api_options = $this->get_api_options();
        $api_options->set_action("?c=rest2/company/v3/product/.list");
        $api_options->apply_options($options);

        return $this->get_service()
            ->set_options($api_options)
            ->call();
    }
    //------------------------------------------------------------------------------------------------------------------

    /**
     * @param array $options
     * @return \com\intf\standard|\octoapi\core\com\octo\response
     * @throws \Exception
     */
    public function get_product_data_arr($options = []) {

        $api_options = $this->get_api_options();
        $api_options->set_action("?c=rest2/company/v3/product/.sync");
        $api_options->apply_options($options);

        return $this->get_service()
            ->set_options($api_options)
            ->call();
    }
    //------------------------------------------------------------------------------------------------------------------
}