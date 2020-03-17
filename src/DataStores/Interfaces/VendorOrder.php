<?php
/**
 * Vendor Order Data Store Interface
 *
 * Functions that must be defined by vendor order classes.
 *
 * @package    WCVendors
 * @subpackage Interface
 * @version    3.0.0
 * @since      3.0.0
 */

namespace WCVendors\DataStores\Interfaces;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Vendor Order Data Store Interface
 *
 * Functions that must be defined by vendor order classes.
 *
 * @version 3.0.0
 * @since   3.0.0
 */
interface VendorOrder {

	/**
	 * Get the total for this order
	 */
	public function get_vendor_total( &$vendor_order );

}
