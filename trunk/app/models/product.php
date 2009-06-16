<?php
class Product extends AppModel {

	var $name = 'Product';

	var $actsAs = array(
	'Containable',
	);

	function fetch_data($query) {
		$result = $this->getItemData($query);
		if (empty($result)) {
		#do something
		} else {
		#do something too
		}
		return $result;
	}

	/*
	 * Ridz
	 */
	function getItemData($query) {
		return $query;
	}
}
?>