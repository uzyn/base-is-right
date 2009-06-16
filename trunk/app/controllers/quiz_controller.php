<?php
class QuizController extends AppController {
	var $uses = array('Product');

	function index() {

	}

	function search() {
		$this->layout = null;
		$this->autoRender = false;
		if (empty($this->data)) {
			echo json_decode(array());
		} else {
			$result = $this->Product->fetch_data($this->data['Quiz']['search']);
			echo json_decode($result);
		}
		
		exit();
	}
	
	function guess(){
		// output: 1: success; 2: too high; 3: too low;
		$this->layout = null;
		$this->autoRender = false;
	}
}
?>