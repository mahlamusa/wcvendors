<?php
/**
 * Admin Vendor Shipped
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-notify-shipped.php.
 *
 * @package       WCVendors/Templates/Emails/HTML
 * @version       2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_email_header', $email_heading, $email );

?>
	<?php // translators: %1$s - Name used to refer to vendor, %2$s - Order number ?>
	<p><?php echo esc_attr( sprintf( __( '%1$s has marked  order #%2$s as shipped.', 'wc-vendors' ), wcv_get_vendor_shop_name( $vendor_id ), $order->get_id() ) ); ?></p>
<?php


do_action( 'woocommerce_email_footer', $email );
