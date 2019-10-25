<?php

$link = mysqli_connect('mysql', 'rasphp', 'rasphp', 'rasphp');

/* check connection */
if (mysqli_connect_errno()) {
    printf('Connect failed: %s\n', mysqli_connect_error());
    exit();
}

/* Select queries return a resultset */
if ($result = mysqli_query($link, 'SELECT * FROM demo')) {
    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
    mysqli_free_result($result);
}

mysqli_close($link);