<?php
class Product extends AppModel {

	var $name = 'Product';

	var $actsAs = array(
	'Containable',
	);

	function fetch_data($query) {
		$results = $this->getItemData($query);
		if (empty($results)) {
			return array();
		#do something
		} else {
			foreach ($results as $result) {
				$product = $this->find('first', array('conditions' => array('gid' => $result['id'], 'query' => $query)));
				if (empty($product)) {
					$this->create();
					$this->saveAll(array(
							'gid' => $result['id'],
							'name' => $result['name'],
							'description' => $result['description'],
							'price' => $result['price'],
							'image' => $result['imageLink'],
							'query' => $query,
					));
				}
			}
		}
		return $this->find('first', array('conditions' => array('query' => $query), 'order' => 'rand()'));
	}

	/*
	 * Ridz
	 */
	function getItemData($item) {
		$apiURL="http://www.google.com/base/feeds/snippets/?q=";
		$maxResults = 10;

		$item = trim($item);
		$item = urlencode($item);
		$apiURL = $apiURL.$item;
		$itemReport = @file_get_contents($apiURL);
		$itemReport = str_replace("g:","g_", $itemReport);
		$itemReportXML = new SimpleXMLElement($itemReport);
		//print_r($itemReportXML);
		// check for name(), description, price, image_link
		$results = array();
		$i = 0;

		while($i>-1) {
			if(isset($itemReportXML->entry[$i]->g_price) && isset($itemReportXML->entry[$i]->g_image_link) && !empty($itemReportXML->entry[$i]->g_id)) {
			//isolate name
				$itemName = (string) $itemReportXML->entry[$i]->title;
				// description
				$itemDescription = (string) $itemReportXML->entry[$i]->content;
				// price
				$itemPrice = (float) $itemReportXML->entry[$i]->g_price;
				// image_link
				$itemImageLink = (string) $itemReportXML->entry[$i]->g_image_link;
				// ID
				$itemID = (string) $itemReportXML->entry[$i]->g_id;

				$itemArray = array("name" => $itemName,
						"description" => $itemDescription,
						"price" => $itemPrice,
						"imageLink" => $itemImageLink,
						"id" => $itemID);

				//print_r($itemArray);

				$results[] = $itemArray;
			}
			if(isset($itemReportXML->entry[$i+1])) {
				$i++;
			}
			else {
				break;
			}
		}
		return $results;
	}
}
?>