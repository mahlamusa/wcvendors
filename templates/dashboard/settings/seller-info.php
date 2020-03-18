<div id="pv_seller_info_container">
	<p>
		<b><?php echo esc_attr( apply_filters( 'wcvendors_seller_info_label', __( 'Seller info', 'wcvendors' ) ) ); ?></b><br/>
		<?php esc_attr_e( 'This is displayed on each of your products.', 'wcvendors' ); ?></p>

	<p>
		<?php

		if ( $global_html || $has_html ) {
			$old_post        = $GLOBALS['post'];
			$GLOBALS['post'] = 0; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			wp_editor( $seller_info, 'pv_seller_info' );
			$GLOBALS['post'] = $old_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		} else {
			?>
			<textarea class="large-text" rows="10" id="pv_seller_info_unhtml" style="width:95%"
						name="pv_seller_info"><?php echo wp_kses_post( $seller_info ); ?></textarea>
														 <?php
		}

		?>
	</p>
</div>
