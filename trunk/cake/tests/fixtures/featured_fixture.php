<?php
/* SVN FILE: $Id: featured_fixture.php 7118 2008-06-04 20:49:29Z gwoo $ */
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
 * @subpackage		cake.tests.fixtures
 * @since			CakePHP(tm) v 1.2.0.4667
 * @version			$Revision: 7118 $
 * @modifiedby		$LastChangedBy: gwoo $
 * @lastmodified	$Date: 2008-06-04 13:49:29 -0700 (Wed, 04 Jun 2008) $
 * @license			http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
/**
 * Short description for class.
 *
 * @package		cake.tests
 * @subpackage	cake.tests.fixtures
 */
class FeaturedFixture extends CakeTestFixture {
/**
 * name property
 * 
 * @var string 'Featured'
 * @access public
 */
	var $name = 'Featured';
/**
 * fields property
 * 
 * @var array
 * @access public
 */
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'article_featured_id' => array('type' => 'integer', 'null' => false),
		'category_id' => array('type' => 'integer', 'null' => false),
		'published_date' => 'datetime',
		'end_date' => 'datetime',
		'created' => 'datetime',
		'updated' => 'datetime'
	);
	var $records = array(
		array('article_featured_id' => 1, 'category_id' => 1, 'published_date' => '2007-03-31 10:39:23', 'end_date' => '2007-05-15 10:39:23', 'created' => '2007-03-18 10:39:23', 'updated' => '2007-03-18 10:41:31'),
		array('article_featured_id' => 2, 'category_id' => 1, 'published_date' => '2007-03-31 10:39:23', 'end_date' => '2007-05-15 10:39:23', 'created' => '2007-03-18 10:39:23', 'updated' => '2007-03-18 10:41:31'),
	);
}

?>
