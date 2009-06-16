<?php
class QuizController extends AppController {
	var $uses = array();
	
	function index(){
		
	}
	
	function search(){
		$this->layout = null;
		$this->autoRender = false;
		
		debug($this->data);
		//$this->data['Quiz']['search']
		//success: echo json
		
		exit();
	}
	
	function guess(){
		// output: 1: success; 2: too high; 3: too low;
		$this->layout = null;
		$this->autoRender = false;
	}
}
?>