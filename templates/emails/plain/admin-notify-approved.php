<?php
/**
 * Admin new notify vendor approved (plain text)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/admin-notify-approved.php
 *
 * @package        WCVendors/Templates/Emails/Plain
 * @version        2.0.13
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

echo '= ' . esc_attr( $email_heading ) . " =\n\n";

// translators: %1$s - The name used to refer to the vendor, %2$s - The website name
echo esc_attr( sprintf( __( 'Hi there. You or another admin has approved a user to be a %1$s on %2$s.', 'wc-vendors' ), wcv_get_vendor_name( true, false ), get_option( 'blogname' ) ) ) . "\n\n";

// translators: %s - Application status
echo esc_attr( sprintf( __( 'Application status: %s', 'wc-vendors' ), esc_attr( ucfirst( $status ) ) ) );
// translators: %s - The approved applicant's username
echo esc_attr( sprintf( __( 'Approved username: %s', 'wc-vendors' ), esc_attr( $user->user_login ) ) ) . "\n\n";


echo esc_attr( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) );
