<?php
//generic error collection handler
if(isset($errors)) {
	echo '<div class="alert alert-danger">Please correct the errors below:</div>';
	foreach ($errors as $value) {
		echo '<div class="alert alert-warning">* '.$value.'</div>';
	}
} 
?>