//Call this function inside your PHP which will log message and variable $data in console.
function deb($msg, $data) {
	echo "<script>console.log('" . $msg . ": " . json_encode($data) . "');</script>";
}