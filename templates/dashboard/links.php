<center>
<p>
		<a href="<?php echo esc_url_raw( $shop_page ); ?>" class="button"><?php echo esc_attr_e( 'View Your Store', 'wcvendors' ); ?></a>
		<a href="<?php echo esc_url_raw( $settings_page ); ?>" class="button"><?php echo esc_attr_e( 'Store Settings', 'wcvendors' ); ?></a>

<?php if ( $can_submit ) { ?>
				<a target="_TOP" href="<?php echo esc_url_raw( $submit_link ); ?>" class="button"><?php echo esc_attr_e( 'Add New Product', 'wcvendors' ); ?></a>
				<a target="_TOP" href="<?php echo esc_url_raw( $edit_link ); ?>" class="button"><?php echo esc_attr_e( 'Edit Products', 'wcvendors' ); ?></a>
	<?php
}
do_action( 'wcvendors_after_links' );
?>
</center>

<hr>
