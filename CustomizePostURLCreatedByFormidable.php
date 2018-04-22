//This code shows how to customize URL of the Wordpress post created by Formidable forms
add_filter( 'frm_new_post', 'frm_create_custom_slug', 10, 2 );
function frm_create_custom_slug( $post, $args ) {
	if ( $args['form']->id == 13 ) { //Replace 13 with your form ID
		//Replace 33 with the field used to generate URL of the Wordpress Post
		//Formidable entry is added to make URL unique
	    $post['post_name'] = sanitize_title($_POST['item_meta'][33]) .'-'. $args['entry']->item_key;
	}
	return $post;
}