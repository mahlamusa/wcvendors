<?php
/**
 * Admin New Vendor Product
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-notify-product.php.
 *
 * @package       WCVendors/Templates/Emails/HTML
 * @version       2.1.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

	<?php // translators: %s Website name. ?>
	<p><?php echo esc_attr( sprintf( __( 'This is a notification about a new product on %s.', 'wc-vendors' ), get_option( 'blogname' ) ) ); ?></p>

	<p>
		<?php // translators: %s - Product title ?>
		<?php echo esc_attr( sprintf( __( 'Product title: %s', 'wc-vendors' ), $product->get_title() ) ); ?><br/>
		<?php // translators: %s - The name of the vendor ?>
		<?php echo esc_attr( sprintf( __( 'Submitted by: %s', 'wc-vendors' ), $vendor_name ) ); ?><br/>
		<?php // translators: %1$s The link to edit the product ?>
		<?php echo esc_attr( sprintf( __( 'Edit product: <a href="%1$s">%1$s</a>', 'wc-vendors' ), admin_url( 'post.php?post=' . $post_id . '&action=edit' ) ) ); ?>
	</p>

<?php

do_action( 'woocommerce_email_footer', $email );
