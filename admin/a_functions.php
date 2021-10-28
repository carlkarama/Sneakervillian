<?php

	function resizeImage($resourceType, $image_width, $image, $image_height) {
		$resize_width = 250;
		$resize_height = 250;
		$imageLayer = imagecreatetruecolor($resize_width, $resize_Height);
		$imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resize_width, $resize_height, $image_height, $image_width);

		return $imageLayer;
	}

?>