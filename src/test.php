<?php

$link = mysqli_connect('mysql', 'rasphp', 'rasphp', 'rasphp');

/* check connection */
if (mysqli_connect_errno()) {
    printf('Connect failed: %s\n', mysqli_connect_error());
    exit();
}

$sql = 'select DISTINCT 1+2   c1, 1+ 2 as
`c2`, sum(c2),sum(c3) as sum_c3,"Status" = CASE
        WHEN quantity > 0 THEN \'in stock\'
        ELSE \'out of stock\'
        END case_statement
, t4.c1, (select c1+c2 from t1 inner_t1 limit 1) as subquery into @a1, @a2, @a3 from t1 the_t1 left outer join t2 using(c1,c2) join t3 as tX ON tX.c1 = the_t1.c1 join t4 t4_x using(x) where c1 = 1 and c2 in (1,2,3, "apple") and exists ( select 1 from some_other_table another_table where x > 1) and ("zebra" = "orange" or 1 = 1) group by 1, 2 having sum(c2) > 1 ORDER BY 2, c1 DESC LIMIT 0, 10 into outfile "/xyz" FOR UPDATE LOCK IN SHARE MODE';

//$sql = 'SELECT id, text FROM demo WHERE 1 > 0 LIMIT 1';
/* Select queries return a resultset */
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
    mysqli_free_result($result);
}

mysqli_close($link);