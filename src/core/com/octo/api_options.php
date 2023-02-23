<?php

namespace octoapi\core\com\octo;


class api_options extends \octoapi\core\com\intf\standard {

    protected $action;

    protected int $page_size = 0;
    protected int $offset = 0;

    protected array $options = [];

	//--------------------------------------------------------------------------------

    /**
     * @param mixed $action
     */
    public function set_action($action): void {
        $this->action = $action;
    }
	//--------------------------------------------------------------------------------
    /**
     * @return mixed
     */
    public function get_action() {
        return $this->action;
    }
	//--------------------------------------------------------------------------------
    /**
     * @param int $page_size
     */
    public function set_page_size(int $page_size): void {
        $this->page_size = $page_size;
    }
	//--------------------------------------------------------------------------------
    public function apply_options($options = []) {
        $this->options = array_merge($this->options, $options);
    }
	//--------------------------------------------------------------------------------
    /**
     * @param int $offset
     */
    public function set_offset(int $offset): void {
        $this->offset = $offset;
    }
	//--------------------------------------------------------------------------------
    public function add_option($index, $value) {
        $this->options[$index] = $value;
    }
	//--------------------------------------------------------------------------------
    public function get_options(): array {

        $fn_property = function($field){
            if($this->{$field} && !isset($this->options[$field])) $this->options[$field] = $this->{$field};
        };

        $fn_property("page_size");
        $fn_property("offset");

        return $this->options;
    }
	//--------------------------------------------------------------------------------
}