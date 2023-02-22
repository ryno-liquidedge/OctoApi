<?php


require_once '../vendor/autoload.php';

OctoApi::$url = "https://thisisoctourl";
OctoApi::$username = "username";
OctoApi::$password = "password";

$get = OctoApi::make()->get();
$put = OctoApi::make()->put();
$post = OctoApi::make()->post();

$delete = OctoApi::make()->delete();