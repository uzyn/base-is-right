<?php
class QuizController extends AppController {
	var $uses = array('Product');

	function index() {

	}

	function search() {
		Configure::write('debug', '1');
		$this->layout = null;
		$this->autoRender = false;
		if (empty($this->data)) {
			echo json_encode(array());
		} else {
			$result = $this->Product->fetch_data($this->data['Quiz']['search']);
			echo json_encode($result);
		}
	}
	
	function guess(){
		// output: 1: success; 2: too high; 3: too low;
		$this->layout = null;
		$this->autoRender = false;
	}
}
?>