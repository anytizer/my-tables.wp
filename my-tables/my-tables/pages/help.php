<?php
$mtp = new my_tables_proecssor();
$ts = $mtp->table_status();
$columns = $mtp->table_columns();
echo '<h2>My Tables</h2>';
echo $mtp->html_table($ts, $columns);
