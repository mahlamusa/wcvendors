<?php
/**
 * Vendor Notify Application
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/vendor-notify-application.php
 *
 * @package    WCVendors
 * @subpackage Templates/Emails
 * @version    3.0.0
 * @since      3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output the email header
 *
 * @hooked WC_Emails::email_header()
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

	<?php // translators: %1$s - The name used to refer to a vendor, %2$s - The website name ?>
	<p><?php echo esc_attr( sprintf( __( 'Hi there. This is a notification about your %1$s application on %2$s.', 'wc-vendors' ), wcv_get_vendor_name( true, false ), get_option( 'blogname' ) ) ); ?></p>
	<?php // translators: %s - The application status ?>
	<p><?php echo esc_attr( sprintf( __( 'Your application is currently: %s', 'wc-vendors' ), $status ) ); ?></p>
	<?php // translators: %s - The applicant's username ?>
	<p><?php echo esc_attr( sprintf( __( 'Your username: %s', 'wc-vendors' ), $user->user_login ) ); ?></p>

<?php

/**
 * Output the email footer
 *
 * @hooked WC_Emails::email_footer()
 */
do_action( 'woocommerce_email_footer', $email );
