<div class="wrap">
<h2>My Tables - Basic Status</h2>
<?php
$mtp = new my_tables_proecssor();
$ts = $mtp->table_status();
$columns = $mtp->table_columns();
echo $mtp->html_table($ts, $columns);
?>
<p>Plugin helping WordPress Developers - by <a href="http://bimal.org.np/">Bimal Poudel</a>
</div>
