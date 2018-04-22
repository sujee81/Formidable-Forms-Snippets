add_filter('frm_send_separate_emails', 'frm_send_separate_emails', 10, 2);
function frm_send_separate_emails( $is_separate, $args ) {
	//Replace 232 with your Action ID
    if ( in_array( $args['action']->ID, array( 232 ) ) ) {
        $is_separate = true;
    }
    return $is_separate;
}