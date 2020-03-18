<h2><?php esc_attr_e( 'Sales Report', 'wcvendors' ); ?></h2>

<?php

if ( false !== $datepicker ) {
	wc_get_template(
		'date-picker.php',
		array(
			'start_date' => $start_date,
			'end_date'   => $end_date,
		),
		'wc-vendors/dashboard/',
		wcv_plugin_dir . 'templates/dashboard/'
	);
}

?>

<table class="table table-condensed table-vendor-sales-report">
	<thead>
	<tr>
	<th class="product-header"><?php esc_attr_e( 'Product', 'wcvendors' ); ?></th>
	<th class="quantity-header"><?php esc_attr_e( 'Quantity', 'wcvendors' ); ?></th>
	<th class="commission-header"><?php esc_attr_e( 'Commission', 'wcvendors' ); ?></th>
	<th class="rate-header"><?php esc_attr_e( 'Rate', 'wcvendors' ); ?></th>
	<th></th>
	</thead>
	<tbody>

	<?php if ( ! empty( $vendor_summary ) ) : ?>


		<?php if ( ! empty( $vendor_summary['products'] ) ) : ?>

			<?php
			foreach ( $vendor_summary['products'] as $product ) :
				$_product = wc_get_product( $product['id'] );
				?>

				<tr>

					<td class="product"><strong><a
								href="<?php echo esc_url( get_permalink( $_product->get_id() ) ); ?>"><?php echo esc_attr( $product['title'] ); ?></a></strong>
						<?php
						if ( ! empty( $_product->variation_id ) ) {
							echo wp_kses_post( woocommerce_get_formatted_variation( $_product->variation_data ) );
						}
						?>
					</td>
					<td class="qty"><?php echo esc_attr( $product['qty'] ); ?></td>
					<td class="commission"><?php echo esc_attr( wc_price( $product['cost'] ) ); ?></td>
					<td class="rate"><?php echo esc_attr( sprintf( '%.2f%%', $product['commission_rate'] ) ); ?></td>

					<?php if ( $can_view_orders ) : ?>
						<td>
							<a href="<?php echo esc_url_raw( $product['view_orders_url'] ); ?>"><?php esc_attr_e( 'Show Orders', 'wcvendors' ); ?></a>
						</td>
					<?php endif; ?>

				</tr>

			<?php endforeach; ?>

			<tr>
				<td><strong><?php esc_attr_e( 'Totals', 'wcvendors' ); ?></strong></td>
				<td><?php echo esc_attr( $vendor_summary['total_qty'] ); ?></td>
				<td><?php echo esc_attr( wc_price( $vendor_summary['total_cost'] ) ); ?></td>
				<td></td>

				<?php if ( $can_view_orders ) : ?>
					<td></td>
				<?php endif; ?>

			</tr>

		<?php else : ?>

			<tr>
				<td colspan="4"
					style="text-align:center;"><?php esc_attr_e( 'You have no sales during this period.', 'wcvendors' ); ?></td>
			</tr>

		<?php endif; ?>



	<?php else : ?>

		<tr>
			<td colspan="4"
				style="text-align:center;"><?php esc_attr_e( 'You haven\'t made any sales yet.', 'wcvendors' ); ?></td>
		</tr>

	<?php endif; ?>

	</tbody>
</table>
