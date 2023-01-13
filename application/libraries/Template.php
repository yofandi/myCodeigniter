<?php 
/**
 * 
 */
class Template
{	
	protected $CI;

	function __construct() {
		$this->CI =& get_instance();
	}

	function loadView($title, $name_content, $data = '') {
		$field['in'] = array(
			'title' => $title,
			'header' => 'layout/_header',
			'navbar' => 'layout/_navigation',
			'headtitle' => 'layout/_headtitle',
			'content' => $name_content,
			'footer' => 'layout/_footer',
			'bottom' => 'layout/_bottom',
			'data' => $data,
		);
		$this->CI->load->view('layout/_layout', $field);
	}
}