<?php
if ( function_exists( 'wc_print_notices' ) ) {
	wc_print_notices();
}
?>
<?php // translators: %s The name of the product ?>
<h2><?php echo esc_attr( sprintf( 'Orders for %s', wc_get_product( $product_id )->get_title() ) ); ?></h2>

<?php do_action( 'wc_vendors_before_order_detail', $body ); ?>

<table class="table table-striped table-bordered">
	<thead>
	<tr>
		<?php foreach ( $headers as $header ) : ?>
			<th class="<?php echo esc_attr( sanitize_title( $header ) ); ?>"><?php echo esc_attr( $header ); ?></th>
		<?php endforeach; ?>
	</tr>
	</thead>
	<tbody>

	<?php
	foreach ( $body as $order_id => $order ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

		$order_items = ! empty( $items[ $order_id ]['items'] ) ? $items[ $order_id ]['items'] : array();
		$count       = count( $order_items );
		?>

		<tr>

			<?php
			$order_keys  = array_keys( $order );
			$first_index = array_shift( $order_keys );
			$last_index  = end( $order_keys );
			foreach ( $order as $detail_key => $detail ) :
				if ( $detail_key === $last_index ) {
					continue;
				}
				?>
				<?php if ( $detail_key === $first_index ) : ?>

					<td class="<?php echo esc_attr( $detail_key ); ?>"
						rowspan="<?php echo 1 ===  $count? 3 : esc_attr( $count + 3 ); ?>"><?php echo esc_attr( $detail ); ?></td>

				<?php else : ?>

					<td class="<?php echo esc_attr( $detail_key ); ?>"><?php echo esc_attr( $detail ); ?></td>

				<?php endif; ?>
			<?php endforeach; ?>

		</tr>

		<tr>

			<?php
			foreach ( $order_items as $item ) {

				wc_get_template(
					'table-body.php',
					array(
						'item'     => $item,
						'count'    => $count,
						'order_id' => $order_id,
					),
					'wc-vendors/orders/',
					wcv_plugin_dir . 'templates/orders/'
				);

			}

			if ( ! empty( $order['comments'] ) ) {
				$customer_note = $order['comments'];
				wc_get_template(
					'customer-note.php',
					array(
						'customer_note' => $customer_note,
					),
					'wc-vendors/orders/customer-note/',
					wcv_plugin_dir . 'templates/orders/customer-note/'
				);
			}

			?>

		<tr>
			<td colspan="100%">

				<?php
				$can_view_comments = get_option( 'wcvendors_capability_order_read_notes' );
				$can_add_comments  = get_option( 'wcvendors_capability_order_update_notes' );

				if ( $can_view_comments || $can_add_comments ) :

					$_comments = array();

					if ( $can_view_comments ) {
						$_order    = new WC_Order( $order_id );
						$_comments = $_order->get_customer_order_notes();
					}
					?>
				<a href="#" class="order-comments-link">
					<p>
						<?php // translators: %s The number of comments ?>
						<?php echo esc_attr( sprintf( __( 'Comments (%s)', 'wcvendors' ), count( $_comments ) ) ); ?>
					</p>
				</a>

				<div class="order-comments">
					<?php

					endif;

				if ( $can_view_comments && ! empty( $_comments ) ) {
					wc_get_template(
						'existing-comments.php',
						array(
							'comments' => $_comments,
						),
						'wc-vendors/orders/comments/',
						wcv_plugin_dir . 'templates/orders/comments/'
					);
				}

				if ( $can_add_comments ) {
					wc_get_template(
						'add-new-comment.php',
						array(
							'order_id'   => $order_id,
							'product_id' => $product_id,
						),
						'wc-vendors/orders/comments/',
						wcv_plugin_dir . 'templates/orders/comments/'
					);
				}

				?>
				</div>

				<?php if ( class_exists( 'WC_Shipment_Tracking' ) ) : ?>

					<?php if ( is_array( $providers ) ) : ?>

						<a href="#" class="order-tracking-link">
							<p>
								<?php esc_attr_e( 'Shipping', 'wcvendors' ); ?>
							</p>
						</a>

						<div class="order-tracking">
							<?php

							wc_enqueue_js( WCV_Vendor_dashboard::wc_st_js( $provider_array ) );

							wc_get_template(
								'shipping-form.php',
								array(
									'order_id'       => $order_id,
									'product_id'     => $product_id,
									'providers'      => $providers,
									'provider_array' => $provider_array,
								),
								'wc-vendors/orders/shipping/',
								wcv_plugin_dir . 'templates/orders/shipping/'
							);
							?>
						</div>

					<?php endif; ?>
					
				<?php endif; ?>

			</td>
		</tr>

		</tr>

	<?php endforeach; ?>

	</tbody>
</table>
<?php do_action( 'wc_vendors_after_order_detail', $body ); ?>
