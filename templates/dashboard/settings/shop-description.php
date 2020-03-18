<div id="pv_shop_description_container">
	<p><b><?php esc_attr_e( 'Shop Description', 'wcvendors' ); ?></b><br/>
		<?php // translators: %s Url to vendor shop page ?>
		<?php echo esc_attr( sprintf( __( 'This is displayed on your <a href="%s">shop page</a>.', 'wcvendors' ), esc_url_raw( $shop_page ) ) ); ?>
	</p>

	<p>
		<?php

		if ( $global_html || $has_html ) {
			$old_post        = $GLOBALS['post'];
			$GLOBALS['post'] = 0;  // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			wp_editor( $description, 'pv_shop_description' );
			$GLOBALS['post'] = $old_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		} else {
			?>
			<textarea class="large-text" rows="10" id="pv_shop_description_unhtml" style="width:95%"
						name="pv_shop_description"><?php echo wp_kses_post( $description ); ?></textarea>
															  <?php
		}

		?>
	</p>

</div>
