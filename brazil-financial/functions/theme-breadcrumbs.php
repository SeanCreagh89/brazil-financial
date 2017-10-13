<?php

/**
    * Theme Breadcrumbs Output
    *
    * @package Brazil Financial
    * @author Sean Creagh
*/



function theme_breadcrumbs() {

    global $post, $wp_query;

    $home = get_the_title( get_option( 'page_on_front' ) );
    $blog = '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . get_the_title( get_option( 'page_for_posts' ) ) . '</a>';
    $separator = '<li class="separator">-</li>';

    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $class; $style;

    if ( $thumbnail != '' ) {

        $class = 'class="wrapper parallax"';
        $style = 'style="background-image: url( ' . $thumbnail[0] . ' );"';

    } else {

        $class = 'class="wrapper"';
        $style = '';

    }

    if ( !is_front_page() ) { ?>

    <div id="Breadcrumbs-bar" <?php echo '' . $class . '' . $style; ?>>

        <div class="container remove-spacing clearfix">

            <div id="Breadcrumbs">

                <ol class="clearfix">

                    <?php

                    if ( !is_search() && !is_author() ) {

                        echo '<li><a href="' . get_home_url() . '">' . $home . '</a></li>';
                        echo $separator;

                    }
                
                    if ( is_page() ) {

                        if ( $post->post_parent ) { 

                            $ancestor = get_post_ancestors( $post->ID );
                            $ancestor = array_reverse( $ancestor );

                            if ( !isset( $parents ) ) $parents = null;

                            foreach ( $ancestor as $ancestors ) {

                                $parents = '<a href="' . get_permalink( $ancestors ) . '">' . get_the_title( $ancestors ) . '</a>';

                            }

                            echo '<li>' . $parents . '</li>';
                            echo $separator;
                            echo '<li><span>' . get_the_title() . '</span></li>';

                        } else {

                            echo '<li><span>' . get_the_title() . '</span></li>';

                        }

                    } elseif ( is_home( get_option( 'page_for_posts' ) ) ) {

                        echo '<li><span>' . get_the_title( get_option( 'page_for_posts' ) ) . '</span></li>';

                    } elseif ( is_single() ) {

                        echo '<li>' . $blog . '</li>';
                        echo $separator;
                        echo '<li><span>' . get_the_title() . '</span></li>';

                    } elseif ( is_category() ) {

                        echo '<li>' . $blog . '</li>';
                        echo $separator;
                        echo '<li><span>' . single_cat_title( '', false ) . '</span></li>';

                    } elseif ( is_tag() ) {

                        $term_id = get_query_var( 'tag_id' );
                        $terms = get_terms( 'post_tag', 'include=' . $term_id );
                        $get_term_name = $terms[0]->name;

                        echo '<li>' . $blog . '</li>';
                        echo $separator;
                        echo '<li><span>' . $get_term_name . '</span></li>';

                    } elseif ( is_author() ) {

                        global $author;
                        $userdata = get_userdata ( $author );

                        echo '<li><span>Posts by ' . $userdata->display_name . '</span></li>';

                    } elseif ( is_search() ) {

                        $result_counter = $wp_query->found_posts;
                        echo '<li><span>' . $result_counter . ' results found for: '. get_search_query() . '</span></li>';

                    } elseif ( is_404() ) {

                        echo '<li><span>404 Error</span></li>';

                    } ?>

                </ol>

            </div>

            <?php if ( is_active_sidebar( 'header-widget-b' ) ) { ?>

            <div id="Breadcrumb-widget"><?php dynamic_sidebar( 'header-widget-b' ); ?></div>

            <?php } ?>

        </div>

    </div>

    <?php }

}

?>