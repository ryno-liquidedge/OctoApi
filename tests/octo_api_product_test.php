<?php


require_once '../vendor/autoload.php';

$api = OctoApi::make([
    "url" => "https://thisisoctourl",
    "username" => "username",
    "password" => "password",
]);

$api->product()->get();
$api->product()->put();
$api->product()->post();
$api->product()->delete();