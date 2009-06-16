<?php
class QuizController extends AppController {
	var $uses = array();
	
	function index(){
		
	}
	
	function search(){
		$this->layout = null;
		$this->autoRender = false;
		
		debug($this->data);
		
		exit();
	}
}
?>