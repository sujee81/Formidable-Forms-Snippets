//Display Yes or No for single option checkbox. Add "yn" attribute to enable it. e.g. [324 yn=1]
add_filter('frmpro_fields_replace_shortcodes', 'frm_yn', 10, 4);
function frm_yn( $replace_with, $tag, $atts, $field ) {
    if ( isset ( $atts['yn'] ) ) {
        if ( $replace_with === NULL ) {
            $replace_with = 'No';
        } else {
            $replace_with = 'Yes';
        }
    }
    return $replace_with;
}
