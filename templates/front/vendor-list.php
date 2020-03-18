<?php
/*
*   Template Variables available
*   $shop_name : pv_shop_name
*   $shop_description : pv_shop_description (completely sanitized)
*   $shop_link : the vendor shop link
*   $vendor_id  : current vendor id for customization
*/
?>

<div class="vendor_list" style="display:inline-block; margin-right:10%;">
		<center>
		<a href="<?php echo esc_url_raw( $shop_link ); ?>"><?php echo get_avatar( $vendor_id, 200 ); ?></a><br />
		<a href="<?php echo esc_url_raw( $shop_link ); ?>" class="button"><?php echo esc_attr( $shop_name ); ?></a>
		<br /><br />
		</center>
</div>
