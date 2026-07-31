<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [] );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 20 );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

/**
 * Avada Child Theme - Ryviu Reviews After Product Long Description
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Remove the default WooCommerce tabs so Description + Reviews render inline.
 * If you want to KEEP the tabs, comment out this line.
 */
add_filter( 'woocommerce_product_tabs', 'nexcove_remove_default_tabs', 98 );
function nexcove_remove_default_tabs( $tabs ) {
    unset( $tabs['description'] );   // Remove default Description tab
    unset( $tabs['reviews'] );       // Remove default Reviews tab
    return $tabs;
}

/**
 * Re-render the long description inline (since we removed the tab).
 * Priority 20 = after the product summary block.
 */
add_action( 'woocommerce_after_single_product_summary', 'nexcove_inline_description', 20 );
function nexcove_inline_description() {
    if ( ! is_product() ) return;

    global $product;
    if ( ! $product || empty( $product->get_description() ) ) return;

    echo '<div class="nexcove-product-description woocommerce-Tabs-panel">';
    echo '<h2>' . esc_html__( 'Description', 'your-child-theme' ) . '</h2>';
    echo '<div class="woocommerce-product-details__short-description">';
    echo apply_filters( 'the_content', $product->get_description() );
    echo '</div>';
    echo '</div>';
}

/**
 * Show Ryviu reviews AFTER the long description.
 * Priority 25 = after nexcove_inline_description (priority 20).
 */
add_action( 'woocommerce_after_single_product_summary', 'nexcove_show_ryviu_after_long_description', 25 );
function nexcove_show_ryviu_after_long_description() {
    if ( ! is_product() ) return;

    global $product;
    if ( ! $product || empty( $product->get_description() ) ) return;

    echo '<div class="nexcove-ryviu-review-section">';
    echo '<h2 class="nexcove-ryviu-title">' . esc_html__( 'Customer Reviews', 'your-child-theme' ) . '</h2>';

    // Try Ryviu shortcode as fallback if do_action doesn't render
    if ( has_action( 'ryviu_display_review' ) ) {
        do_action( 'ryviu_display_review' );
    } elseif ( shortcode_exists( 'ryviu_widget' ) ) {
        echo do_shortcode( '[ryviu_widget]' );
    }

    echo '</div>';
}

/**
 * Avada-specific fix: ensure WooCommerce tab hooks fire correctly.
 * Avada sometimes wraps product content in its own layout builder,
 * so we force WooCommerce to output its tab content area.
 */
add_action( 'wp', 'nexcove_avada_woo_compat' );
function nexcove_avada_woo_compat() {
    if ( ! is_product() ) return;

    // Ensure Avada doesn't suppress woocommerce_after_single_product_summary
    remove_all_filters( 'avada_woocommerce_product_tabs_layout' );
}
// NexCove — AJAX: Products Tab
if ( ! function_exists( 'nx_get_products_for_tab' ) ) {
    function nx_get_products_for_tab( $orderby = 'popularity', $limit = 12 ) {
        $allowed = array( 'popularity', 'date', 'rating' );
        $orderby = in_array( $orderby, $allowed, true ) ? $orderby : 'popularity';

        return wc_get_products(
            array(
                'status'  => 'publish',
                'limit'   => absint( $limit ),
                'orderby' => $orderby,
                'order'   => 'DESC',
            )
        );
    }
}

if ( ! function_exists( 'nx_product_discount_percent' ) ) {
    function nx_product_discount_percent( $product ) {
        if ( ! $product instanceof WC_Product || ! $product->is_on_sale() ) {
            return 0;
        }

        if ( $product->is_type( 'variable' ) ) {
            $regular = (float) $product->get_variation_regular_price( 'max' );
            $sale    = (float) $product->get_variation_sale_price( 'min' );
        } else {
            $regular = (float) $product->get_regular_price();
            $sale    = (float) $product->get_sale_price();
        }

        if ( $regular <= 0 || $sale <= 0 || $sale >= $regular ) {
            return 0;
        }

        return (int) round( ( ( $regular - $sale ) / $regular ) * 100 );
    }
}

if ( ! function_exists( 'nx_render_product_card' ) ) {
    function nx_render_product_card( $product ) {
        if ( ! $product instanceof WC_Product ) {
            return;
        }

        $id       = $product->get_id();
        $image    = get_the_post_thumbnail_url( $id, 'woocommerce_thumbnail' );
        $image    = $image ? $image : wc_placeholder_img_src( 'woocommerce_thumbnail' );
        $discount = nx_product_discount_percent( $product );
        $regular  = (float) ( $product->is_type( 'variable' ) ? $product->get_variation_regular_price( 'max' ) : $product->get_regular_price() );
        $sale     = (float) ( $product->is_type( 'variable' ) ? $product->get_variation_sale_price( 'min' ) : $product->get_sale_price() );
        ?>
        <a class="nx-product" href="<?php echo esc_url( get_permalink( $id ) ); ?>">
            <?php if ( $discount > 0 ) : ?>
                <span class="nx-badge">-<?php echo esc_html( $discount ); ?>%</span>
            <?php endif; ?>
            <div class="nx-product-photo"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>"></div>
            <div class="nx-name"><?php echo esc_html( $product->get_name() ); ?></div>
            <div class="nx-price">
                <?php if ( $product->is_on_sale() && $sale > 0 && $regular > $sale ) : ?>
                    <?php echo wp_kses_post( wc_price( $sale ) ); ?> <del><?php echo wp_kses_post( wc_price( $regular ) ); ?></del>
                <?php else : ?>
                    <?php echo wp_kses_post( $product->get_price_html() ); ?>
                <?php endif; ?>
            </div>
            <div class="nx-rating">Star <?php echo esc_html( $product->get_average_rating() ? $product->get_average_rating() : '0' ); ?> · <?php echo esc_html( $product->get_review_count() ); ?> reviews</div>
        </a>
        <?php
    }
}

if ( ! function_exists( 'nx_products_tab_handler' ) ) {
    function nx_products_tab_handler() {
        $nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';

        if ( ! wp_verify_nonce( $nonce, 'nx_products_tab' ) ) {
            wp_die( esc_html__( 'Security check failed.', 'Avada-Child-Theme' ), '', array( 'response' => 403 ) );
        }

        $allowed = array( 'popularity', 'date', 'rating' );
        $orderby = isset( $_POST['orderby'] ) ? sanitize_text_field( wp_unslash( $_POST['orderby'] ) ) : 'popularity';
        $orderby = in_array( $orderby, $allowed, true ) ? $orderby : 'popularity';
        $products = nx_get_products_for_tab( $orderby, 12 );

        if ( empty( $products ) ) {
            echo '<p class="nx-name">No products found.</p>';
            wp_die();
        }

        foreach ( $products as $product ) {
            nx_render_product_card( $product );
        }

        wp_die();
    }
}
add_action( 'wp_ajax_nx_products_tab', 'nx_products_tab_handler' );
add_action( 'wp_ajax_nopriv_nx_products_tab', 'nx_products_tab_handler' );

// NexCove — AJAX: Newsletter
if ( ! function_exists( 'nx_newsletter_subscribe_handler' ) ) {
    function nx_newsletter_subscribe_handler() {
        $nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';

        if ( ! wp_verify_nonce( $nonce, 'nx_newsletter_subscribe' ) ) {
            wp_send_json(
                array(
                    'success' => false,
                    'message' => 'Security check failed. Please refresh and try again.',
                ),
                403
            );
        }

        $email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';

        if ( ! is_email( $email ) ) {
            wp_send_json(
                array(
                    'success' => false,
                    'message' => 'Please enter a valid email.',
                )
            );
        }

        $emails = get_option( 'nx_newsletter_emails', array() );
        $emails = is_array( $emails ) ? array_map( 'sanitize_email', $emails ) : array();

        if ( ! in_array( $email, $emails, true ) ) {
            $emails[] = $email;
            update_option( 'nx_newsletter_emails', $emails, false );
        }

        wp_send_json(
            array(
                'success' => true,
                'message' => 'Thanks! Check your inbox.',
            )
        );
    }
}
add_action( 'wp_ajax_nx_newsletter_subscribe', 'nx_newsletter_subscribe_handler' );
add_action( 'wp_ajax_nopriv_nx_newsletter_subscribe', 'nx_newsletter_subscribe_handler' );

