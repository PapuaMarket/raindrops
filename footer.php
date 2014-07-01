<?php
/**
 * The template part file for footer.
 *
 *
 * @package Raindrops
 * @since Raindrops 0.1
 *
 * @uses wp_upload_dir( )
 * @uses raindrops_upload_image_parser( $footer_image_uri, 'inline','#ft' )
 * @uses is_active_sidebar( 'sidebar-4' )
 * @uses get_bloginfo( 'name' )
 * @uses get_bloginfo( 'rss2_url' )
 * @uses ucwords( )
 * @uses wp_footer( )
 * @uses raindrops_prepend_footer( )
 * @uses raindrops_append_footer( )
 * @uses raindrops_append_doc( )
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
global $raindrops_current_theme_name, $raindrops_current_data_theme_uri, $template, $raindrops_accessibility_link;
do_action( 'raindrops_pre_part_' . basename( __FILE__, '.php' ) . '_' . basename( $template ) );
?>
<<?php raindrops_doctype_elements( 'div', 'footer' ); ?> id="ft" class="clear" <?php raindrops_doctype_elements( '', 'role="contentinfo"' ); ?>>
<?php raindrops_prepend_footer(); ?>
<!--footer-widget start-->
<div class="widget-wrapper clearfix">
    <?php if ( is_active_sidebar( 'sidebar-4' ) ) { ?>
        <ul>
            <?php dynamic_sidebar( 'sidebar-4' ); ?>
        </ul>
    <?php }//end if ( is_active_sidebar( 'sidebar-4' ) )  ?>
    <br class="clear" />
</div>
<!--footer-widget end-->
<address>
    <?php
    $raindrops_address_html = '<small>&copy;%1$s &nbsp; %2$s &nbsp;<a href="%3$s" class="entry-rss">%4$s</a> <span>' . esc_html__( 'and', 'Raindrops' ) . '</span><a href="%5$s" class="comments-rss">%6$s</a>';

    $raindrops_address_html = sprintf( $raindrops_address_html, date( "Y" ), $raindrops_current_theme_name, get_bloginfo( 'rss2_url' ), esc_html__( "Entries RSS", "Raindrops" ), get_bloginfo( 'comments_rss2_url' ), esc_html__( 'Comments RSS', "Raindrops" )
    );

    if ( $raindrops_accessibility_link == true &&  ('posts' == get_option( 'show_on_front' ) || ! is_front_page() ) ) {

        $accessible_url = raindrops_current_url();

        $accessible_url = add_query_arg( 'friendly', 'true', $accessible_url );

        $raindrops_address_html .= '<a href="' . $accessible_url . '" class="raindrops-accessibility-link">' . esc_html__( 'Accessible', 'Raindrops' ) . '</a>';
    }

    $raindrops_address_html .= '</small>&nbsp;';

    echo $raindrops_address_html;

    if ( is_child_theme() ) {

        $raindrops_theme_name = 'Child theme ' . esc_html( ucwords( $raindrops_current_theme_name ) ) . ' of ' . esc_html__( "Raindrops Theme", "Raindrops" );
    } else {
        $raindrops_theme_name = esc_html__( "Raindrops Theme", "Raindrops" );
    }

    printf( '&nbsp;<small><a href="%s">%s</a></small>&nbsp;&nbsp;', $raindrops_current_data_theme_uri, $raindrops_theme_name
    );
    ?>
</address>
    <?php raindrops_append_footer(); ?>
</<?php raindrops_doctype_elements( 'div', 'footer' ); ?>>
    <?php raindrops_append_doc(); ?>
</div>
    <?php wp_footer(); ?>
</body>
</html><?php do_action( 'raindrops_after_part_' . basename( __FILE__, '.php' ) . '_' . basename( $template ) ); ?>