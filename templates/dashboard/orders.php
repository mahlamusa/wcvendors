<?php
/**
 * The template for displaying the dashboard order
 *
 * Override this template by copying it to yourtheme/wc-vendors/dashboard/
 *
 * @package    WCVendors
 * @version    1.9.4
 */
?>	

<script type="text/javascript">
jQuery(function () {
	jQuery('a.view-items').on('click', function (e) {
		e.preventDefault();
		var id = jQuery(this).closest('tr').data('order-id');

		if ( jQuery(this).text() == "<?php esc_attr_e( 'Hide items', 'wcvendors' ); ?>" ) {
			jQuery(this).text("<?php esc_attr_e( 'View items', 'wcvendors' ); ?>");
		} else {
			jQuery(this).text("<?php esc_attr_e( 'Hide items', 'wcvendors' ); ?>");
		}

		jQuery("#view-items-" + id).fadeToggle();
	});

	jQuery('a.view-order-tracking').on('click', function (e) {
		e.preventDefault();
		 var id = jQuery(this).closest('tr').data('order-id');
		jQuery("#view-tracking-" + id).fadeToggle(); 
	});
});
</script>

<h2><?php esc_attr_e( 'Orders', 'wcvendors' ); ?></h2>

<?php global $woocommerce; ?>

<?php
if ( function_exists( 'wc_print_notices' ) ) {
	wc_print_notices(); }
?>

<table class="table table-condensed table-vendor-sales-report">
	<thead>
	<tr>
	<th class="product-header"><?php esc_attr_e( 'Order', 'wcvendors' ); ?></th>
	<th class="quantity-header"><?php esc_attr_e( 'Shipping', 'wcvendors' ); ?></th>
	<th class="commission-header"><?php esc_attr_e( 'Total', 'wcvendors' ); ?></th>
	<th class="rate-header"><?php esc_attr_e( 'Date', 'wcvendors' ); ?></th>
	<th class="rate-header"><?php esc_attr_e( 'Links', 'wcvendors' ); ?></th>
	</thead>
	<tbody>

	<?php
	if ( ! empty( $order_summary ) ) :
			$_totals  = 0;
		   $user_id = get_current_user_id();
		?>

		<?php
		foreach ( $order_summary as $_order ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

			$_order          = new WC_Order( $_order->order_id );
			$order_id       = ( version_compare( WC_VERSION, '2.7', '<' ) ) ? $_order->id : $_order->get_id();
			$valid_items    = WCV_Queries::get_products_for_order( $order_id );
			$valid          = array();
			$needs_shipping = false;

			$items = $_order->get_items();

			foreach ( $items as $key => $value ) {
				if ( in_array( $value['variation_id'], $valid_items ) || in_array( $value['product_id'], $valid_items ) ) {
					$valid[] = $value;
				}
				// See if product needs shipping
				$product        = new WC_Product( $value['product_id'] );
				$needs_shipping = ( ! $product->needs_shipping() || $product->is_downloadable( 'yes' ) ) ? false : true;

			}

			$shippers = (array) get_post_meta( $order_id, 'wc_pv_shipped', true );
			$shipped  = in_array( $user_id, $shippers );

			$order_date = ( version_compare( WC_VERSION, '2.7', '<' ) ) ? $_order->order_date : $_order->get_date_created();

			?>

			<tr id="order-<?php echo esc_attr( $order_id ); ?>" data-order-id="<?php echo esc_attr( $order_id ); ?>">
				<td><?php echo esc_attr( $_order->get_order_number() ); ?></td>
				<td><?php echo wp_kses_post( apply_filters( 'wcvendors_dashboard_google_maps_link', '<a target="_blank" href="' . esc_url_raw( 'http://maps.google.com/maps?&q=' . urlencode( esc_html( preg_replace( '#<br\s*/?>#i', ', ', $_order->get_formatted_shipping_address() ) ) ) . '&z=16' ) . '">' . esc_html( preg_replace( '#<br\s*/?>#i', ', ', $_order->get_formatted_shipping_address() ) ) . '</a>' ) ); ?></td>
				<td>
				<?php
				$sum      = WCV_Queries::sum_for_orders( array( $order_id ), array( 'vendor_id' => get_current_user_id() ) );
				$total    = $sum[0]->line_total;
				$_totals += $total;
				echo esc_attr( wc_price( $total ) );
				?>
				</td>
				<td><?php echo esc_attr( date_i18n( wc_date_format(), strtotime( $order_date ) ) ); ?></td>
				<td>
				<?php
				$order_actions = array(
					'view' => array(
						'class'   => 'view-items',
						'content' => __( 'View items', 'wcvendors' ),
					),
				);
				if ( $needs_shipping ) {
					$order_actions['shipped'] = array(
						'class'   => 'mark-shipped',
						'content' => __( 'Mark shipped', 'wcvendors' ),
						'url'     => '?wc_pv_mark_shipped=' . $order_id,
					);
				}
				if ( $shipped ) {
					$order_actions['shipped'] = array(
						'class'   => 'mark-shipped',
						'content' => __( 'Shipped', 'wcvendors' ),
						'url'     => '#',
					);
				}

				if ( $providers && $needs_shipping && class_exists( 'WC_Shipment_Tracking' ) ) {
					$order_actions['tracking'] = array(
						'class'   => 'view-order-tracking',
						'content' => __( 'Tracking', 'wcvendors' ),
					);
				}

				$order_actions = apply_filters( 'wcvendors_order_actions', $order_actions, $_order );

				if ( $order_actions ) {
					$output = array();
					foreach ( $order_actions as $key => $data ) {
						$output[] = sprintf(
							'<a href="%s" id="%s" class="%s">%s</a>',
							( isset( $data['url'] ) ) ? $data['url'] : '#',
							( isset( $data['id'] ) ) ? $data['id'] : $key . '-' . $order_id,
							( isset( $data['class'] ) ) ? $data['class'] : '',
							$data['content']
						);
					}
					echo esc_attr( implode( ' | ', $output ) );
				}
				?>
				</td>
			</tr>

			<tr id="view-items-<?php echo esc_attr( $order_id ); ?>" style="display:none;">
				<td colspan="5">
					<?php
					$product_id = '';
					foreach ( $valid as $key => $item ) :

						// Get variation data if there is any.
						$variation_detail = ! empty( $item['variation_id'] ) ? WCV_Orders::get_variation_data( $item['variation_id'] ) : '';

						?>
						<?php echo esc_attr( $item['qty'] . 'x ' . $item['name'] ); ?>
						<?php
						if ( ! empty( $variation_detail ) ) {
							echo '<br />' . wp_kses_post( $variation_detail );
						}
						?>


					<?php endforeach; ?>

				</td>
			</tr>

			<?php if ( class_exists( 'WC_Shipment_Tracking' ) ) : ?>
			
				<?php if ( is_array( $providers ) ) : ?>
				<tr id="view-tracking-<?php echo esc_attr( $order_id ); ?>" style="display:none;"> 
					<td colspan="5">
						<div class="order-tracking">
							<?php
							wc_get_template(
								'shipping-form.php',
								array(
									'order_id'   => $order_id,
									'product_id' => $product_id,
									'providers'  => $providers,
								),
								'wc-vendors/orders/shipping/',
								wcv_plugin_dir . 'templates/orders/shipping/'
							);
							?>
						</div>

					</td>
				</tr>
				<?php endif; ?>
				
			<?php endif; ?>

		<?php endforeach; ?>

			<tr>
				<td><b>Total:</b></td>
				<td colspan="4"><?php echo esc_attr( wc_price( $_totals ) ); ?></td>
			</tr>

	<?php else : ?>

		<tr>
			<td colspan="4"
				style="text-align:center;"><?php esc_attr_e( 'You have no orders during this period.', 'wcvendors' ); ?></td>
		</tr>

	<?php endif; ?>

	</tbody>
</table>
