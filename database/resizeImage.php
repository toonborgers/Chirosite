<?php

/*
 * Werkt nog nie fatsoenlijk, kweenie wrm
 */

function getWidth($image) {
	return imagesx($image);
}

function getHeight($image) {
	return imagesy($image);
}

function resize($image, $width, $height) {
	$new_image = imagecreatetruecolor($width, $height);
	imagecopyresampled($new_image, $image, 0, 0, 0, 0, $width, $height, getWidth($image), getHeight($image));
	return $new_image;
}

function resizeToHeight($image, $height) {
	$ratio = $height / getHeight($image);
	$width = getWidth($image) * $ratio;
	return resize($image, $width, $height);
}

function resizeToWidth($image, $width) {
	$ratio = $width / getWidth($image);
	$height = getheight($image) * $ratio;
	return esize($image, $width, $height);
}

function resizeToPosterSize($image) {
	return resizeToWidth($image, 500);
}

?>