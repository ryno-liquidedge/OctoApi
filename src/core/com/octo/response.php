<?php

namespace octoapi\core\com\octo;


class response extends \octoapi\core\com\intf\standard {

    protected $response_data = [];

	//--------------------------------------------------------------------------------
    protected function __construct($options = []) {
        $this->response_data = $options;
    }
    //--------------------------------------------------------------------------
	public function get_response($key = false, $options = []) {

		$options = array_merge([
		    "default" => []
		], $options);

		if(!$this->response_data) return $options["default"];

		if(!$key) return $this->response_data;
		else return $this->extract_from_arr($this->response_data, $key, $options);

	}
    //--------------------------------------------------------------------------
	public function get_batch_id(){
        return $this->extract_from_arr($this->get_response_meta(), "batch_id");
	}
	//--------------------------------------------------------------------------
	public function get_total_records(){
        return $this->extract_from_arr($this->get_response_meta(), "total_batch_records");
	}
	//--------------------------------------------------------------------------
	public function get_total_prepared_records(){
        return $this->extract_from_arr($this->get_response_meta(), "total_prepared_records");
	}
	//--------------------------------------------------------------------------
	public function get_page_size(){
        return $this->extract_from_arr($this->get_response_meta(), "page_size");
	}
	//--------------------------------------------------------------------------
	public function get_offset(){
        return $this->extract_from_arr($this->get_response_meta(), "offset");
	}
	//--------------------------------------------------------------------------
	public function get_overall_prep_time(){
        return $this->extract_from_arr($this->get_response_meta(), "overall_prep_time");
	}
	//--------------------------------------------------------------------------
	public function get_response_body(): array {
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
	public function extract_from_arr($arr, $key, $options = []){
		return \octoapi\core\com\arr\arr::extract_from_arr($arr, $key, $options);
	}
    //--------------------------------------------------------------------------------
}