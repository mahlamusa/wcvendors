<?php
/**
 * Admin new notify new vendor product (plain text)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/admin-notify-product.php
 *
 * @package        WCVendors/Templates/Emails/Plain
 * @version        2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

echo '= ' . esc_attr( $email_heading ) . " =\n\n";

do_action( 'woocommerce_email_header', $email_heading, $email );

// translators: %s The name of the website.
echo esc_attr( sprintf( __( 'This is a notification about a new product on %s.', 'wc-vendors' ), get_option( 'blogname' ) ) ) . "\n\n";

// translators: %s The product title.
echo esc_attr( sprintf( __( 'Product title: %s', 'wc-vendors' ), $product->get_title() ) ) . "\n\n";

// translators: %s The applicant's username
echo esc_attr( sprintf( __( 'Submitted by: %s', 'wc-vendors' ), $vendor_name ) ) . "\n\n";

// translators: The link to product edit page
echo wp_kses_post( sprintf( __( 'Edit product: %s', 'wc-vendors' ), admin_url( 'post.php?post=' . $post_id . '&action=edit' ) ) ) . "\n\n";

echo esc_attr( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) );
