<?php
class AppController extends Controller {

	var $helpers = array('Html', 'Form', 'Javascript', 'Text');
	var $components = array('RequestHandler');

	public function __construct() {
		parent::__construct();
	}

	function beforeFilter() {
		parent::beforeFilter();
		// Adds support for json for purposes of ajax
		$this->RequestHandler->setContent('json', 'text/x-json');
		if ($this->RequestHandler->ext == 'json') {
			Configure::write('debug', 0); // debug would cause json parsing to fail
			$this->header('Pragma: no-cache');
			$this->header('Cache-control: no-store, no-cache, max-age=0, must-revalidate');
			$this->header('Content-Type: text/x-json');
		}
	}
}
?>