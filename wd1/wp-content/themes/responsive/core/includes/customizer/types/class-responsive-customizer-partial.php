<?php
/**
 * Customizer partial type enforcing.
 *
 * @package Responsive
 */

/**
 * Class Responsive_Customizer_Partial
 */
class Responsive_Customizer_Partial {
	/**
	 * ID of control that will be attached to. Also ID of the partial itself.
	 *
	 * @var string the control ID.
	 */
	public $control_id;

	/**
	 * Args for the partial.
	 *
	 * @var array args passed into partial.
	 */
	public $args = array();

	/**
	 * Responsive_Customizer_Partial constructor.
	 *
	 * @param string $control_id the control id.
	 * @param array  $args the partial args.
	 */
	public function __construct( $control_id, $args ) {
		$this->id   = $control_id;
		$this->args = $args;
	}
}
