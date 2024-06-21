<?php

if (filter_has_var(INPUT_GET, 'id')) {
    // sanitize id
    $clean_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    if ($clean_id) {
        // validate id with options
        $id = filter_var($clean_id, FILTER_VALIDATE_INT, ['options' => [
            'min_range' => 10
        ]]);

        // show the id if it's valid
        echo $id === false ? 'id must be at least 10' : $id;
    }
    else {
         echo 'id is invalid.';
    }
} else {
    echo 'id is required.';
}