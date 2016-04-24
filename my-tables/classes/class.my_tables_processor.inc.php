<?php
class my_tables_processor
{
	/**
	 * Ordered List of columns to report
	 * Case sensitive
	 */
	private $required_fields = array(
		'Name',
		'Engine',
		'Rows',
		#'Avg_row_length',
		'Index_length',
		'Auto_increment',
		'Create_time',
		'Collation',
		'Comment',			
	);

	/**
	 * Full list of columns available in MySQL 5.6
	 * Listed for reference only
	 * Case sensitive
	 */
	private $available_fields = array(
		'Name',
		'Engine',
		'Version',
		'Row_format',
		'Rows',
		'Avg_row_length',
		'Data_length',
		'Max_data_length',
		'Index_length',
		'Data_free',
		'Auto_increment',
		'Create_time',
		'Update_time',
		'Check_time',
		'Collation',
		'Checksum',
		'Create_options',
		'Comment',			
	);
	
	/**
	 * Helper to convert uniformed PHP array data into Basic HTML Table
	 *
	 * @param array $data
	 *
	 * @return string
	 */
	public function html_table($data = array(), $heads = array())
	{
		$styles = array();
		$theads = array();
		foreach ($heads as $cell) {
			$cell_word = strtolower($cell);
			$styles[] = $cell_word;
			
			$cell_name = ucwords(implode(' ', explode('_', $cell)));
			$theads[] = "<td class='{$cell_word}'>{$cell_name}</td>";
		}

		$rows = array();
		foreach ($data as $row) {
			$cells = array();
			
			$styles_index = -1;
			foreach ($row as $cell) {
				++$styles_index;
				$cells[] = "<td class='{$styles[$styles_index]}'>{$cell}</td>";
			}
			$rows[] = "<tr>" . implode('', $cells) . "</tr>";
		}

		return "
<table cellpadding='7' cellspacing='0' class='my-tables'>
	<thead><tr>" . implode('', $theads) . "</tr></thead>
	<tbody>" . implode('', $rows) . "</tbody>
</table>";
	}
	
	public function table_columns()
	{
		return $this->required_fields;
	}

	/**
	 * Filters a list of columns
	 */
	public function table_status()
	{
		global $wpdb;
		$tables = $wpdb->get_results("SHOW TABLE STATUS;");

		$data = array();
		foreach($tables as $table)
		{
			$row = array();
			foreach($this->required_fields as $column)
			{
				$row[$column] = $table->$column;
			}
			$data[] = $row;
		}
		return $data;
	}
}
