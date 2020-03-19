<?php
/**
 * The general admin settings.
 *
 * @package WCVendors
 * @subpackage Admin/Settings
 */

namespace WCVendors\Admin\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The general admin settings.
 */
class General extends Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'general';
		$this->label = __( 'General', 'wc-vendors' );

		parent::__construct();
	}

	/**
	 * Get sections.
	 *
	 * @return array
	 */
	public function get_sections() {
		$sections = array(
			'' => __( 'General', 'wc-vendors' ),
		);

		return apply_filters( 'wcvendors_get_sections_' . $this->id, $sections );
	}

	/**
	 * Get settings array.
	 *
	 * @param string $current_section Current section ID.
	 *
	 * @return array
	 */
	public function get_settings( $current_section = '' ) {

		$settings = array(
			// General Options.
			array(
				'type' => 'title',
				'desc' => __( 'These are the general settings for your marketplace', 'wc-vendors' ),
				'id'   => 'general_options',
			),
			array(
				// translators: %s - Name used to refer to a Vendor.
				'title'   => sprintf( __( '%s Registration', 'wc-vendors' ), wcv_get_vendor_name() ),
				// translators: %s - Name used to refer to a Vendor.
				'desc'    => sprintf( __( 'Allow users to apply to become a %s', 'wc-vendors' ), lcfirst( wcv_get_vendor_name() ) ),
				'id'      => 'wcvendors_vendor_allow_registration',
				'default' => 'no',
				'type'    => 'checkbox',
			),
			array(
				// translators: %s - Name used to refer to a Vendor.
				'title'   => sprintf( __( '%s Approval', 'wc-vendors' ), wcv_get_vendor_name() ),
				// translators: %s - Name used to refer to a Vendor.
				'desc'    => sprintf( __( 'Manually approve all %s applications', 'wc-vendors' ), lcfirst( wcv_get_vendor_name() ) ),
				'id'      => 'wcvendors_vendor_approve_registration',
				'default' => 'no',
				'type'    => 'checkbox',
			),
			array(
				// translators: %s - Name used to refer to a Vendor.
				'title'   => sprintf( __( '%s Taxes', 'wc-vendors' ), wcv_get_vendor_name() ),
				// translators: %s - Name used to refer to a Vendor.
				'desc'    => sprintf( __( 'Give any taxes to the %s', 'wc-vendors' ), wcv_get_vendor_name() ),
				'id'      => 'wcvendors_vendor_give_taxes',
				'default' => 'no',
				'type'    => 'checkbox',
			),
			array(
				// translators: %s - Name used to refer to a Vendor.
				'title'   => sprintf( __( '%s Shipping', 'wc-vendors' ), wcv_get_vendor_name() ),
				// translators: %s - Name used to refer to a Vendor.
				'desc'    => sprintf( __( 'Give any shipping to the %s', 'wc-vendors' ), wcv_get_vendor_name() ),
				'id'      => 'wcvendors_vendor_give_shipping',
				'default' => 'no',
				'type'    => 'checkbox',
			),
			array(
				'type' => 'sectionend',
				'id'   => 'general_options',
			),
		);

		return apply_filters( 'wcvendors_get_settings_' . $this->id, $settings );
	}
}
