<?php
/**
 * Vendor Notify Application Denied
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/vendor-notify-denied.php
 *
 * @package WCVendors/Templates/Emails
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

	<p><?php echo wp_kses_post( $content ); ?></p>

	<p><?php echo wp_kses_post( $reason ); ?></p>
<?php // translators: %s - Applicant username ?>
	<p><?php echo esc_attr( sprintf( __( 'Applicant username: %s', 'wc-vendors' ), $user->user_login ) ); ?></p>

<?php

do_action( 'woocommerce_email_footer', $email );
