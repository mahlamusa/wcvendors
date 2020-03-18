<form method="post">
	<p>
		<label style="display:inline;" for="from"><?php esc_attr_e( 'From:', 'wcvendors' ); ?></label>
		<input class="date-pick" type="date" name="start_date" id="from"
			   value="<?php echo esc_attr( gmdate( 'Y-m-d', $start_date ) ); ?>"/>

		<label style="display:inline;" for="to"><?php esc_attr_e( 'To:', 'wcvendors' ); ?></label>
		<input type="date" class="date-pick" name="end_date" id="to"
			   value="<?php echo esc_attr( gmdate( 'Y-m-d', $end_date ) ); ?>"/>

		<input type="submit" class="btn btn-inverse btn-small" style="float:none;"
			   value="<?php esc_attr_e( 'Show', 'wcvendors' ); ?>"/>
	</p>
</form>
