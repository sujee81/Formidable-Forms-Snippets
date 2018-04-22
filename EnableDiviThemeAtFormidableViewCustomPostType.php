//This code is to enable Divi editor inside Formidable forms view editor
function my_et_builder_post_types( $post_types ) {
    $post_types[] = 'frm_display';
     
    return $post_types;
}
add_filter( 'et_builder_post_types', 'my_et_builder_post_types' );

