<?php

namespace octoapi\core\com\octo;


class service extends \octoapi\core\com\intf\standard {

    /**
     * @var \octoapi\core\com\config\config
     */
	protected $config;

    /**
     * @var api_options
     */
	protected $options;

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

        $options = array_merge([
            "config" => false
        ], $options);

        if($options["config"])
            $this->set_config($options["config"]);

    }
    //--------------------------------------------------------------------------

    /**
     * @param $options
     * @return $this
     */
    public function set_options($options): service {
        if($options){
            $this->options = $options;
            $this->set_action($this->options->get_action());
        }
        return $this;
    }
    //--------------------------------------------------------------------------
    public function set_config($config) {
        $this->config = $config;
        $this->set_baseurl($this->config->get_url());
        $this->set_password($this->config->get_password());
        $this->set_username($this->config->get_username());
    }
    //--------------------------------------------------------------------------

    /**
     * @param $action
     * @return $this
     */
    public function set_action($action): service {
        $this->action = $action;
        return $this;
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
     * @return \com\intf\standard|response
     * @throws \Exception
     */
	public function call($options = []) {

	    $options = array_merge([

	    ], $options, $this->options->get_options());

		if (!$this->baseurl) throw new \Exception("Service base URL cannot be empty");
		if (!$this->username) throw new \Exception("Service username cannot be empty");
		if (!$this->password) throw new \Exception("Service password cannot be empty");

		$separator = substr($this->baseurl, (strlen($this->baseurl) - 1), strlen($this->baseurl)) == "/" ? "" : "/";
		$url = "{$this->baseurl}{$separator}{$this->action}";
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

		return \octoapi\core\com\octo\response::make($this->response);
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