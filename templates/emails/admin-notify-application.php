<?php
/**
 * Admin New Vendor Application
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-notify-application.php.
 *
 * @package       WCVendors/Templates/Emails/HTML
 * @version       2.1.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

	<?php // translators: %1$s - Name used to refer to vendor, %2$s - Website name ?>
	<p><?php echo esc_attr( sprintf( __( 'Hi there. This is a notification about a %1$s application on %2$s.', 'wc-vendors' ), wcv_get_vendor_name( true, false ), get_option( 'blogname' ) ) ); ?></p>

	<?php // translators: %s - Application status ?>
	<p><?php echo esc_attr( sprintf( __( 'The application is currently: %s', 'wc-vendors' ), ucfirst( $status ) ) ); ?></p>

	<?php // translators: %s - Applicant username ?>
	<p><?php echo esc_attr( sprintf( __( 'Applicant username: %s', 'wc-vendors' ), $user->user_login ) ); ?></p>

<?php if ( 'pending' === $status ) : ?>
	<p>
	<?php // translators: %1$s - Link to application approval page, %2$s - Text for approve vendor link ?>
		<?php echo wp_kses_post( sprintf( __( 'You can approve or deny the application at the following link <a href="%1$s">%2$s</a>', 'wc-vendors' ), admin_url( 'users.php?role=pending_vendor' ), __( 'Approve Application', 'wc-vendors' ) ) ); ?>
	</p>
<?php endif; ?>

<?php

do_action( 'woocommerce_email_footer', $email );
