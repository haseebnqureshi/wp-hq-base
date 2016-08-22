<?php

	/* 
	HQ_Base
	============
	Include this script once and then instantiate the class. 
	It provides a starting point for any robust plugin that 
	needs template overrides with advanced custom fields UI.
	*/

	class HQ_Base {

		public $dir = "";
		public $localfile = "";
		public $localdir = "";
		public $activation_scripts = array();
		public $post_types = array();
		public $acf_show_admin = false;

		public function __construct($localfile=null, $options=array()) {
			$this->dir = dirname(__FILE__);
			$this->localfile = $localfile ? $localfile : __FILE__;
			$this->localdir = $localfile ? dirname($localfile) : $this->dir;

			foreach ($options as $key => $value) {
				$this->$key = $value;
			}
			
			add_filter('acf/settings/path', array($this, 'acf_settings_path'));
			add_filter('acf/settings/dir', array($this, 'acf_settings_dir'));
			add_filter('acf/settings/save_json', array($this, 'acf_json_save_point'));
			add_filter('acf/settings/show_admin', ($this->acf_show_admin ? '__return_true' : '__return_false'));
			include_once("{$this->dir}/acf/acf.php");

			$this->post_types = $this->_scanfiles("{$this->localdir}/cpt");
			$this->activation_scripts = $this->_scanfiles("{$this->localdir}/activate");

			add_action('init', array($this, 'init'), 0);
			add_filter('upload_mimes', array($this, 'filter_upload_types'));
			add_filter('template_include', array($this, 'filter_templates'), 99, 1);
			add_filter('wp_enqueue_scripts', array($this, 'include_assets'));
			register_activation_hook(__FILE__, array($this, 'on_activation'));
		}

		public function acf_settings_path() {
			return "{$this->dir}/acf/";
		}

		public function acf_settings_dir() {
			return plugins_url('acf/', __FILE__);
		}

		public function acf_json_save_point() {
			return "{$this->dir}/acf-json/";
		}

		public function filter_templates($original) {
			global $post;
			$single = is_single() ? '-single' : '';
			$path = "{$this->localdir}/templates/{$post->post_type}{$single}.php";
			return file_exists($path) ? $path : $original;
		}

		public function filter_upload_types($mimes) {
			$mimes['svg'] = 'image/svg+xml';
			$mimes['json'] = 'application/json';
			$mimes['certSigningRequest'] = 'application/certSigningRequest';
			$mimes['p12'] = 'application/p12';
			$mimes['pem'] = 'application/pem';
			$mimes['cer'] = 'application/cer';
			$mimes['crt'] = 'application/crt';
			$mimes['csr'] = 'application/csr';
			$mimes['key'] = 'application/key';
			$mimes['sql'] = 'application/sql';
			$mimes['xml'] = 'application/xml';
			$mimes['md'] = 'application/md';
			$mimes['doc'] = 'application/docx';
			$mimes['docx'] = 'application/docx';
			$mimes['xls'] = 'application/xls';
			$mimes['ai'] = 'application/ai';
			$mimes['psd'] = 'application/psd';
			return $mimes;
		}

		public function include_assets() {
			if (file_exists("{$this->localdir}/assets/css/plugin.css")) {
				wp_enqueue_style(
					basename($this->localdir), 
					plugins_url('assets/css/plugin.css', $this->localfile)
				);
			}
			if (file_exists("{$this->localdir}/assets/js/plugin.js")) {
				wp_enqueue_script(
					basename($this->localdir), 
					plugins_url('assets/js/plugin.js', $this->localfile),
					array('underscore', 'jquery'),
					'1.0.0',
					true
				);
			}
		}

		public function init() {
			date_default_timezone_set(get_option('timezone_string') || 'America/New_York');
			$this->_loadall($this->post_types);
		}

		public function on_activation() {
			$this->_loadall($this->activation_scripts);
		}

		/* utility methods */

		public function _loadall($items=array()) {
			foreach ($items as $path) {
				include_once $path;
			}
		}

		public function _scanfiles($dir, $items=array()) {
			if (!file_exists($dir)) { return $items; }
			$items = array();
			foreach (scandir($dir) as $item) {
				if ($item == '.' || $item == '..') { continue; }
				$post_type = str_replace('.php', '', $item);
				$items[$post_type] = "{$dir}/{$item}";
			}
			return $items;
		}

	}

?>