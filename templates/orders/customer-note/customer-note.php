<tr>
	<td colspan="100%">
		<h2>
			<?php esc_attr_e( 'Customer note', 'wcvendors' ); ?>
		</h2>

		<p>
			<?php echo $customer_note ? wp_kses_post( $customer_note ) : esc_attr( __( 'No customer note.', 'wcvendors' ) ); ?>
		</p>
	</td>
</tr>
