<?php
/**
 * Customizer Section type Enforcing.
 *
 * @package Responsive
 */

/**
 * Class Responsive_Customizer_Section
 */
class Responsive_Customizer_Section {
	/**
	 * ID of section
	 *
	 * @var string the control ID.
	 */
	public $id;

	/**
	 * Args for section instance.
	 *
	 * @var array args passed into section.
	 */
	public $args = array();

	/**
	 * Custom section ( string of class name | null)
	 *
	 * @var null|string
	 */
	public $custom_section = null;

	/**
	 * Responsive_Customizer_Section constructor.
	 *
	 * @param string $id the control id.
	 * @param array  $args the add_section array.
	 * @param string $custom_section [optional] this should be added if the section is a custom section.
	 */
	public function __construct( $id, $args, $custom_section = null ) {
		$this->id             = $id;
		$this->args           = $args;
		$this->custom_section = $custom_section;
	}
}
