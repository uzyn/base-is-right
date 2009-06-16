<?php
class ProductsController extends AppController {

	var $uses = array('Product');

	function index() {
		$result = $this->Product->fetch_data($this->params['url']['q']);
		if (empty($result)) {
			#noresults
		} else {
			$this->redirect(array('controller' => 'products', 'action' => 'view', $result['Product']['id']));
		}
	}

	function view($id) {
		$this->Product->id = $id;
		$product = $this->Product->read();
		$this->set('product', $product);
	}
	

}
?>