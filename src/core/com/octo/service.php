<?php

namespace octoapi\core\com\octo;


class service extends \octoapi\core\com\intf\standard {

    /**
     * @var array
     */
	protected $config;

	protected $action;

    //options
	protected $method = "GET";

	/**
	 * Octo Service username
	 * @var String
	 */
	protected $username;

	/**
	 * Octo Service password
	 * @var String
	 */
	protected $password;

	/**
	 * Octo Service base URL
	 * @var String
	 */
	protected $baseurl;

	/**
	 * response data
	 * @var string
	 */
	protected $response = false;

	public $debug = false;

	//--------------------------------------------------------------------------
    protected function __construct($options = []) {

        $this->set_config(\OctoApi::get_config());

    }
    //--------------------------------------------------------------------------
    public function set_config($config) {
        $this->config = $config;
        $this->set_baseurl($config["url"]);
        $this->set_password($config["password"]);
        $this->set_username($config["username"]);
    }
    //--------------------------------------------------------------------------
    /**
     * @param mixed $action
     */
    public function set_action($action): void {
        $this->action = $action;
    }
    //--------------------------------------------------------------------------
	public function extract_from_arr($arr, $key, $options = []){
		return \octoapi\core\com\arr\arr::extract_from_arr($arr, $key, $options);
	}
	//--------------------------------------------------------------------------
	public function get_response($key = false, $options = []) {

		$options = array_merge([
		    "default" => []
		], $options);

		if(!$this->response) return $options["default"];

		if(!$key) return $this->response;
		else return $this->extract_from_arr($this->response, $key, $options);

	}
	//--------------------------------------------------------------------------
	public function get_response_body() {
		return $this->get_response("body");
	}
	//--------------------------------------------------------------------------
	public function get_response_meta() {
		return $this->extract_from_arr($this->get_response_body(), "meta");
	}
	//--------------------------------------------------------------------------
	public function get_response_code() {
		return $this->extract_from_arr($this->get_response_body(), "code");
	}
	//--------------------------------------------------------------------------
	public function get_response_message() {
		$mixed = $this->extract_from_arr($this->get_response_body(), "message", ["default" => null]);

		if(is_array($mixed)) $mixed = json_encode($mixed);

		return $mixed;
	}
	//--------------------------------------------------------------------------
	public function get_response_data() {
		return $this->extract_from_arr($this->get_response_body(), "data");
	}
	//--------------------------------------------------------------------------
	/**
	 * @param string $method
	 */
	public function set_method(string $method): void {
		$this->method = $method;
	}
	//--------------------------------------------------------------------------
	/**
	 * @param String $username
	 */
	public function set_username(string $username): void {
		$this->username = $username;
	}
	//--------------------------------------------------------------------------
	/**
	 * @param String $password
	 */
	public function set_password(string $password): void {
		$this->password = $password;
	}
	//--------------------------------------------------------------------------
	/**
	 * @param String $baseurl
	 */
	public function set_baseurl(string $baseurl): void {
		$this->baseurl = $baseurl;
	}
	//--------------------------------------------------------------------------
    /**
     * @param array $options
     * @return array|bool|string
     * @throws \Exception
     */
	public function call($options = []) {


	    $config = \OctoApi::get_config();

		if (!$config["url"]) throw new \Exception("Service base URL cannot be empty");
		if (!$config["username"]) throw new \Exception("Service username cannot be empty");
		if (!$config["password"]) throw new \Exception("Service password cannot be empty");

		$separator = substr($config["url"], (strlen($config["url"]) - 1), strlen($config["url"])) == "/" ? "" : "/";
		$url = "{$config["url"]}{$separator}{$this->action}";
		$this->response = \octoapi\core\com\rest\rest::call($this->method, $url, $options, [
			"username" => $this->username,
			"password" => $this->password,
			">CURLOPT_TIMEOUT" => 108000    //30 HOURS
		]);

		if($this->debug) $this->print_debug([
			"url" => $url,
			"options" => $options,
			"meta" => $this->get_response_meta(),
			"data" => $this->get_response_data(),
		]);

		return $this->response;
	}
	//--------------------------------------------------------------------------
	public function print_debug($item_arr = []) {

		$fn_add_data = function($title, $mixed){
			console("//------------------------------------------");
			console("//$title");
			console("//------------------------------------------");
			console($mixed);
			console("\n\n");
		};

		foreach ($item_arr as $title => $mixed){
			$fn_add_data($title, $mixed);
		}
	}
	//--------------------------------------------------------------------------------
}