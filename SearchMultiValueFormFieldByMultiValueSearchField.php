add_filter('frm_where_filter', 'filter_by_multi_value_fields', 10, 2);
function filter_by_multi_value_fields($where, $args){
 
  //Replace 32 with form ID
  //Replace 12 and 14 with IDs of multi value fields inside your form 
  if ( $args['display']->ID == 32 and in_array( $args['where_opt'], array( 12, 14 ) ) ) {
  	
	$search_values = explode(', ', $args['where_val']);
	
    if ( $search_values ) {
	    $where = "(";
	    foreach ($search_values as $idx => $search_value) {
		  if($idx == 0) {
			$where = $where ."meta_value = '". $search_value ."' OR meta_value like '%\"". $search_value ."\"%'";
		  } else {
			$where = $where ." OR meta_value = '". $search_value ."' OR meta_value like '%\"". $search_value ."\"%'";
		  }
		}
	    $where = "(fi.id=". $args['where_opt'] . " AND ". $where . "))";
	}
  }
  return $where;
}