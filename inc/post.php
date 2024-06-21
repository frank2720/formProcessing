<?php

if (filter_has_var(INPUT_GET, 'id')) {
	// sanitize id
	$clean_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

	// validate id
	$id = filter_var($clean_id, FILTER_VALIDATE_INT);

	// show the id if it's valid
	echo $id === false ? 'Invalid id' : $id;
} else {
	echo 'id is required.';
}