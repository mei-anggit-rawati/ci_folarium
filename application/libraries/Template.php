<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	protected $_CI;

	function __construct()
	{
		$this->_CI = &get_instance();
	}

	function template_super_admin($template, $data = null)
	{
		$data['content'] = $this->_CI->load->view($template, $data, true);
		$this->_CI->load->view('template/template_super_admin', $data);
	}

	function template_admin_wilayah($template, $data = null)
	{
		$data['content'] = $this->_CI->load->view($template, $data, true);
		$this->_CI->load->view('template/template_admin_wilayah', $data);
	}

    function template_user($template, $data = null)
	{
		$data['content'] = $this->_CI->load->view($template, $data, true);
		$this->_CI->load->view('template/template_user', $data);
	}

	function template_dashboard($template, $data = null)
	{
		$data['content'] = $this->_CI->load->view($template, $data, true);
		$this->_CI->load->view('template/template_dashboard', $data);
	}
}