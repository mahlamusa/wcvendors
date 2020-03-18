<?php
/**
 * Admin new order email
 *
 * @package WooCommerce/Templates/Emails/HTML
 * @version 2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$order_date = ( version_compare( WC_VERSION, '2.7', '<' ) ) ? $order->order_date : $order->get_date_created();

?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php esc_attr_e( 'A vendor has marked part of your order as shipped. The items that are shipped are as follows:', 'wcvendors' ); ?></p>

<?php do_action( 'woocommerce_email_before_order_table', $order, true ); ?>
<?php // translators: %s The order number. ?>
<h2><?php echo esc_attr( sprintf( __( 'Order: %s', 'wcvendors' ), $order->get_order_number() ) ); ?> (<?php echo wp_kses_post( sprintf( '<time datetime="%s">%s</time>', date_i18n( 'c', strtotime( $order_date ) ), date_i18n( wc_date_format(), strtotime( $order_date ) ) ) ); ?>)</h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php esc_attr_e( 'Product', 'wcvendors' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php esc_attr_e( 'Quantity', 'wcvendors' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php esc_attr_e( 'Price', 'wcvendors' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		echo wp_kses_post(
			wc_get_email_order_items(
				$order,
				array(
					'show_sku'      => true,
					'show_image'    => false,
					'image_size'    => array( 32, 32 ),
					'plain_text'    => false,
					'sent_to_admin' => false,
				)
			)
		);
		?>
	</tbody>
	<tfoot>
		<?php
		$_totals = $order->get_order_item_totals();
		if ( $_totals ) {
			$i = 0;
			foreach ( $_totals as $total ) {
				$i++;
				?>
					<tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; 
						<?php
						if ( 1 === $i ) {
							echo 'border-top-width: 4px;';}
						?>
						"><?php echo esc_attr( $total['label'] ); ?></th>
						<td style="text-align:left; border: 1px solid #eee; 
						<?php
						if ( 1 === $i ) {
							echo 'border-top-width: 4px;';}
						?>
						"><?php echo esc_attr( $total['value'] ); ?></td>
					</tr>
					<?php
			}
		}
		?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_email_after_order_table', $order, true ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, true ); ?>

<h2><?php esc_attr_e( 'Customer details', 'wcvendors' ); ?></h2>

<?php if ( $order->get_billing_email() ) : ?>
	<p><strong><?php esc_attr_e( 'Email:', 'wcvendors' ); ?></strong> <?php echo esc_attr( $order->get_billing_email() ); ?></p>
<?php endif; ?>
<?php if ( $order->get_billing_phone() ) : ?>
	<p><strong><?php esc_attr_e( 'Tel:', 'wcvendors' ); ?></strong> <?php echo esc_attr( $order->get_billing_phone() ); ?></p>
<?php endif; ?>

<?php wc_get_template( 'emails/email-addresses.php', array( 'order' => $order ) ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>
