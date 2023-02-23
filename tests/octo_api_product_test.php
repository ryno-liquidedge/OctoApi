<?php


require_once '../vendor/autoload.php';

$api = OctoApi::make([
    "url" => "https://octo.wildmanhuntingandoutdoor.com/",
    "username" => "4deca643-bcc0-49b5-b947-340959ace015",
    "password" => "28740b39-7be0-45c6-afe5-421fa36f18ea",
]);


try {

    $response = $api->product()->get()->get_product_data_arr([
        "page_size" => 1,
        "offset" => 2,
    ]);
    view($response->get_batch_id());
    view($response->get_overall_prep_time());
    view($response->get_response_body());

} catch (Exception $e) {
    view($e->getMessage());
}

