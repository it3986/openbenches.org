<?php
$error = null;
//	openbenches.org/api/v1.0/users.json
//                 1   2    3

if (isset($params[2]) && isset($params[3])) {
	$apiVersionID = $params[2];
	$apiRoute     = $params[3];

	if ("v1.0" == $apiVersionID) {
		if ("users.json" == $apiRoute) {
			require_once("apis/v1.0.users.json.php");
		} else if ("data.json" == $apiRoute) {
			require_once("apis/v1.0.data.json.php");
		} else if ("tags.json" == $apiRoute) {
			require_once("apis/v1.0.tags.json.php");
		} else if ("alexa.json" == $apiRoute) {
			require_once("apis/v1.0.alexa.json.php");
		} else {
			$error = "No API found with that name.";
		}

	} else {
		$error = "No API found with that version.";
	}

} else {
	$error = "API not set.";
}

if (null != $error) {
	header("HTTP/1.0 404 Not Found");
	echo $error;
}
