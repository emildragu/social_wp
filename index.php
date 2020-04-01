<table>
	<tr>
		<th>Data inscriere</th>
		<th>Detalii</th>
	</tr>
<?php // Silence is golden

global $wpdb;
$form_entries = $wpdb->get_results( $wpdb->prepare("SELECT * FROM `wpek_wpforms_tasks_meta_custom`"));
foreach($form_entries as $form_entry) {
	$user_data = json_decode(base64_decode($form_entry->data)) ;

	print "<tr>";
	print "<td>" . $form_entry->date . "</td>";
	foreach($user_data[0] as $id=>$data) {

?>
	<td>
    <?php
      print "<b>" . $data->name . "</b>: " . $data->value;
	?>
     </td>
<?php
	}
	print "</tr>";
}
?>
</table>