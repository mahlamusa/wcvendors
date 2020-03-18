<?php
/**
 * Vendor Order Items (plain)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/vendor-order-items.php.
 *
 * @package        WCvendors/Templates/Emails/Plain
 * @version        2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

foreach ( $items as $item_id => $item ) :
	if ( apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
		$product = $item->get_product();
		echo esc_attr( apply_filters( 'woocommerce_order_item_name', $item->get_name(), $item, false ) );
		if ( $show_sku && $product->get_sku() ) {
			echo ' (#' . esc_attr( $product->get_sku() ) . ')';
		}
		echo ' X ' . esc_attr( apply_filters( 'woocommerce_email_order_item_quantity', $item->get_quantity(), $item ) );
		echo ' = ' . esc_attr( $order->get_formatted_line_subtotal( $item ) ) . "\n";

		// allow other plugins to add additional product information here
		do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, $plain_text );
		echo esc_attr(
			strip_tags(
				wc_display_item_meta(
					$item,
					array(
						'before'    => "\n- ",
						'separator' => "\n- ",
						'after'     => '',
						'echo'      => false,
						'autop'     => false,
					)
				)
			)
		);

		// allow other plugins to add additional product information here
		do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order, $plain_text );
	}
	echo "\n\n";
endforeach;
