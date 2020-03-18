<?php
/**
 *  Vendor notify denied (plain text)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/vendor-notify-denied.php
 *
 * @package        WCVendors/Templates/Emails/Plain
 * @version        2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

echo '= ' . esc_attr( $email_heading ) . " =\n\n";
// translators: %1$s The name used to refer to a Vendor, %2$s The name of the website.
echo esc_attr( sprintf( __( 'Hi there. This is a notification about a %1$s application on %2$s.', 'wc-vendors' ), wcv_get_vendor_name( true, false ), get_option( 'blogname' ) ) ) . "\n\n";
// translators: %s The application status
echo esc_attr( sprintf( __( 'Your application is currently: %s', 'wc-vendors' ), $status ) ) . "\n\n";
// translators: %s The applicant's username
echo esc_attr( sprintf( __( 'Applicant username: %s', 'wc-vendors' ), $user->user_login ) ) . "\n\n";

echo esc_attr( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) );
