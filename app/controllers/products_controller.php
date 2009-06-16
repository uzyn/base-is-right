<?php
class ProductsController extends AppController {

	var $uses = array('Product');

	function index() {
		$result = $this->Product->fetch_data($this->params['url']['q']);
		pr($result);
	}

	function view() {
		pr('s');
	}
	

}
?>