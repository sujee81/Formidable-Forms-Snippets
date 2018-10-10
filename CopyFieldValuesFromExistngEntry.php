//Copy field values of an existing entry to Form - Useful for duplicating an entry
//Form will get its field values from entry id given in URL param 'copy_entry'
add_filter('frm_get_default_value', 'fill_values_for_duplicate_entry', 10, 2);
function fill_values_for_duplicate_entry( $new_value, $field ){
  if(isset( $_GET['copy_entry']) && !in_array( $field->type, array("hidden", "divider", "html", "end_divider", "user_id" ))) {
	if ( $field->form_id == 9) { //Replace 9 by Form ID
	  if(!in_array( $field->field_key, array( 'xxxx', 'xxxx', 'xxxx'))){ //Replace xxx with keys of fields to skip copying
		$new_value = set_field_default_value($field);
	  }
	}
  }
  return $new_value;
}

function set_field_default_value($field) {
  if( $field->type == 'data') {
	return do_shortcode( '[frm-field-value field_id=' . $field->id . ' entry=copy_entry show=id]' );
  } elseif( $field->type == 'textarea') {
	return do_shortcode( '[frm-field-value field_id=' . $field->id . ' entry=copy_entry wpautop=0]' );
  } else {
	return do_shortcode( '[frm-field-value field_id=' . $field->id . ' entry=copy_entry]' );
  }
}