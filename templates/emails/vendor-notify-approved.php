<?php
/**
 * Vendor Notify Application Approved
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/vendor-notify-approved.php
 *
 * @package    WCVendors
 * @subpackage Templates/Emails
 * @version    3.0.0
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

	<p><?php echo wp_kses_post( $content ); ?></p>

	<?php // translators: %s - The applicant's username ?>
	<p><?php echo esc_attr( sprintf( __( 'Your username: %s', 'wc-vendors' ), $user->user_login ) ); ?></p>
<?php

do_action( 'woocommerce_email_footer', $email );
