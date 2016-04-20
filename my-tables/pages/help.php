<div class="wrap">
<h2>My Tables - Basic Status</h2>
<p>Plugin helping WordPress Developers - by <a href="http://bimal.org.np/">Bimal Poudel</a></p>
<?php
$mtp = new my_tables_proecssor();
$ts = $mtp->table_status();
$columns = $mtp->table_columns();
echo $mtp->html_table($ts, $columns);
?>
<p>Optimization Tips: When you finished debugging or troubleshooting; disable this plugin.</p>
</div>
