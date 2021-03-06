<?php
/* SVN FILE: $Id: error.test.php 7118 2008-06-04 20:49:29Z gwoo $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) Tests <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				https://trac.cakephp.org/wiki/Developement/TestSuite CakePHP(tm) Tests
 * @package			cake.tests
 * @subpackage		cake.tests.cases.libs
 * @since			CakePHP(tm) v 1.2.0.5432
 * @version			$Revision: 7118 $
 * @modifiedby		$LastChangedBy: gwoo $
 * @lastmodified	$Date: 2008-06-04 13:49:29 -0700 (Wed, 04 Jun 2008) $
 * @license			http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
if (class_exists('TestErrorHandler')) {
	return;
}
App::import('Core', array('Error', 'Controller'));

if (!defined('CAKEPHP_UNIT_TEST_EXECUTION')) {
	define('CAKEPHP_UNIT_TEST_EXECUTION', 1);
}
/**
 * OrangeComponent class
 * 
 * @package              cake
 * @subpackage           cake.tests.cases.libs
 */
class OrangeComponent extends Object {
/**
 * testName property
 * 
 * @access public
 * @return void
 */	
	var $testName = null;
/**
 * initialize method
 * 
 * @access public
 * @return void
 */	
	function initialize(&$controller) {
		$this->testName = 'OrangeComponent';
	}
	
}
/**
 * AppController class
 * 
 * @package              cake
 * @subpackage           cake.tests.cases.libs
 */
if (!class_exists('AppController')) {
	class AppController extends Controller {
	/**
	 * components property
	 *
	 * @access public
	 * @return void
	 */
		var $components = array('Orange');
	/**
	 * beforeFilter method
	 *
	 * @access public
	 * @return void
	 */
		function beforeFilter() {
			$this->cakeError('error404', array('oops' => 'Nothing to see here'));
		}
	/**
	 * beforeRender method
	 *
	 * @access public
	 * @return void
	 */
		function beforeRender() {
			echo $this->Orange->testName;
		}
	/**
	 * cakeError method
	 *
	 * @param mixed $method
	 * @param array $messages
	 * @access public
	 * @return void
	 */
		function cakeError($method, $messages = array()) {
			$error =& new TestErrorHandler($method, $messages);
			return $error;
		}
	/**
	 * header method
	 *
	 * @access public
	 * @return void
	 */
		function header($header) {
			echo $header;
		}
	}
}
/**
 * TestErrorController class
 * 
 * @package              cake
 * @subpackage           cake.tests.cases.libs
 */
class TestErrorController extends AppController {
/**
 * uses property
 * 
 * @var array
 * @access public
 */
	var $uses = array();
/**
 * index method
 * 
 * @access public
 * @return void
 */
	function index() {
		$this->autoRender = false;
		return 'what up';
	}
}
/**
 * TestErrorHandler class
 * 
 * @package              cake
 * @subpackage           cake.tests.cases.libs
 */
class TestErrorHandler extends ErrorHandler {
/**
 * stop method
 * 
 * @access public
 * @return void
 */
	function _stop() {
		return;
	}
}
/**
 * Short description for class.
 *
 * @package    cake.tests
 * @subpackage cake.tests.cases.libs
 */
class TestErrorHandlerTest extends CakeTestCase {
/**
 * skip method
 * 
 * @access public
 * @return void
 */
	function skip() {
		$this->skipif ((php_sapi_name() == 'cli'), 'TestErrorHandlerTest cannot be run from console');
	}
/**
 * testFromBeforeFilter method
 * 
 * @access public
 * @return void
 */
	function testFromBeforeFilter() {
		if (!class_exists('dispatcher')) {
			require CAKE . 'dispatcher.php';
		}
		$Dispatcher =& new Dispatcher();
		
		restore_error_handler();
		ob_start();
		$controller = $Dispatcher->dispatch('/test_error', array('return'=> 1));
		$expected = ob_get_clean();
		set_error_handler('simpleTestErrorHandler');
		$this->assertPattern("/<h2>Not Found<\/h2>/", $expected);
		$this->assertPattern("/<strong>'\/test_error'<\/strong>/", $expected);
	}
/**
 * testError method
 * 
 * @access public
 * @return void
 */
	function testError() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('error404', array('message' => 'Page not found'));
		ob_clean();

		ob_start();
		$TestErrorHandler->error(array(
				'code' => 404,
				'message' => 'Page not Found',
				'name' => "Couldn't find what you were looking for"
		));
		$result = ob_get_clean();
		$this->assertPattern("/<h2>Couldn't find what you were looking for<\/h2>/", $result);
		$this->assertPattern('/Page not Found/', $result);
	}
/**
 * testError404 method
 * 
 * @access public
 * @return void
 */
	function testError404() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('error404', array('message' => 'Page not found'));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Not Found<\/h2>/', $result);
		$this->assertPattern("/<strong>'\/test_error'<\/strong>/", $result);
	}
/**
 * testMissingController method
 * 
 * @access public
 * @return void
 */
	function testMissingController() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingController', array(
			'className' => 'PostsController'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Controller<\/h2>/', $result);
		$this->assertPattern('/<em>PostsController<\/em>/', $result);
		$this->assertPattern('/OrangeComponent/', $result);
		
	}
/**
 * testMissingAction method
 * 
 * @access public
 * @return void
 */
	function testMissingAction() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingAction', array(
			'className' => 'PostsController',
			'action' => 'index'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Method in PostsController<\/h2>/', $result);
		$this->assertPattern('/<em>PostsController::<\/em><em>index\(\)<\/em>/', $result);
	}
/**
 * testPrivateAction method
 * 
 * @access public
 * @return void
 */
	function testPrivateAction() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('privateAction', array(
			'className' => 'PostsController',
			'action' => '_secretSauce'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Private Method in PostsController<\/h2>/', $result);
		$this->assertPattern('/<em>PostsController::<\/em><em>_secretSauce\(\)<\/em>/', $result);
	}
/**
 * testMissingTable method
 * 
 * @access public
 * @return void
 */
	function testMissingTable() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingTable', array(
			'className' => 'Article',
			'table' => 'articles'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Database Table<\/h2>/', $result);
		$this->assertPattern('/table <em>articles<\/em> for model <em>Article<\/em>/', $result);
	}
/**
 * testMissingDatabase method
 * 
 * @access public
 * @return void
 */
	function testMissingDatabase() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingDatabase', array());
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Database Connection<\/h2>/', $result);
		$this->assertPattern('/Confirm you have created the file/', $result);
	}
/**
 * testMissingView method
 * 
 * @access public
 * @return void
 */
	function testMissingView() {
		restore_error_handler();
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingView', array(
			'className' => 'Pages',
			'action' => 'display',
			'file' => 'pages/about.ctp',
			'base' => ''
		));
		$expected = ob_get_clean();
		set_error_handler('simpleTestErrorHandler');
		$this->assertPattern("/PagesController::/", $expected);
		$this->assertPattern("/pages\/about.ctp/", $expected);

	}

	function testMissingLayout() {
		restore_error_handler();
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingLayout', array(
			'layout' => 'my_layout',
			'file' => 'layouts/my_layout.ctp',
			'base' => ''
		));
		$expected = ob_get_clean();
		set_error_handler('simpleTestErrorHandler');
		$this->assertPattern("/Missing Layout/", $expected);
		$this->assertPattern("/layouts\/my_layout.ctp/", $expected);

	}

	function testMissingConnection() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingConnection', array(
			'className' => 'Article'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Database Connection<\/h2>/', $result);
		$this->assertPattern('/Article requires a database connection/', $result);
	}

	function testMissingHelperFile() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingHelperFile', array(
			'helper' => 'MyCustom',
			'file' => 'my_custom.php'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Helper File<\/h2>/', $result);
		$this->assertPattern('/Create the class below in file:/', $result);
		$this->assertPattern('/\/my_custom.php/', $result);
	}

	function testMissingHelperClass() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingHelperClass', array(
			'helper' => 'MyCustom',
			'file' => 'my_custom.php'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Helper Class<\/h2>/', $result);
		$this->assertPattern('/The helper class <em>MyCustomHelper<\/em> can not be found or does not exist./', $result);
		$this->assertPattern('/\/my_custom.php/', $result);
	}

	function testMissingComponentFile() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingComponentFile', array(
			'className' => 'PostsController',
			'component' => 'Sidebox',
			'file' => 'sidebox.php'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Component File<\/h2>/', $result);
		$this->assertPattern('/Create the class <em>SideboxComponent<\/em> in file:/', $result);
		$this->assertPattern('/\/sidebox.php/', $result);
	}

	function testMissingComponentClass() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingComponentClass', array(
			'className' => 'PostsController',
			'component' => 'Sidebox',
			'file' => 'sidebox.php'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Component Class<\/h2>/', $result);
		$this->assertPattern('/Create the class <em>SideboxComponent<\/em> in file:/', $result);
		$this->assertPattern('/\/sidebox.php/', $result);
	}

	function testMissingModel() {
		ob_start();
		$TestErrorHandler = new TestErrorHandler('missingModel', array(
			'className' => 'Article',
			'file' => 'article.php'
		));
		$result = ob_get_clean();
		$this->assertPattern('/<h2>Missing Model<\/h2>/', $result);
		$this->assertPattern('/<em>Article<\/em> could not be found./', $result);
		$this->assertPattern('/\/article.php/', $result);
	}
}
?>
