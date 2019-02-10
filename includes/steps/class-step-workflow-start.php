<?php
/**
 * Gravity Flow Step Workflow Start
 *
 * @package     GravityFlow
 * @subpackage  Classes/Gravity_Flow_Step_Complete
 * @copyright   Copyright (c) 2015-2019, Steven Henty S.L.
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       2.5
 */

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

/**
 * Class Gravity_Flow_Step_Complete
 *
 * @since 2.5
 */
class Gravity_Flow_Step_Workflow_Start extends Gravity_Flow_Step {
	/**
	 * The step type.
	 *
	 * @since 2.5
	 *
	 * @var string
	 */
	public $_step_type = 'workflow_start';

	/**
	 * Returns the step label.
	 *
	 * @since 2.5
	 *
	 * @return string
	 */
	public function get_label() {
		return esc_html__( 'Start', 'gravityflow' );
	}

	/**
	 * Indicates this step can expire without user input.
	 *
	 * @since 2.5
	 *
	 * @return bool
	 */
	public function supports_expiration() {
		return false;
	}

	/**
	 * Returns the HTML for the step icon.
	 *
	 * @since 2.5
	 *
	 * @return string
	 */
	public function get_icon_url() {
		return '<i style="color:darkgreen;" class="fa fa-play" aria-hidden="true"></i>';
	}

	/**
	 * Returns an array of statuses and their properties.
	 *
	 * @since 2.5
	 *
	 * @return array
	 */
	public function get_status_config() {
		return array(
			array(
				'status'                    => 'complete',
				'status_label'              => __( 'Complete', 'gravityflow' ),
				'destination_setting_label' => __( 'First Step', 'gravityflow' ),
				'default_destination'       => 'next',
			),
		);
	}

	/**
	 * Add settings to the step.
	 *
	 * @since 2.5
	 *
	 * @return array
	 */
	public function get_settings() {

		$settings = array(
			'title'  => esc_html__( 'Start', 'grvityflow' ),
			'description' => esc_html__( 'Define the settings for users who are not assignees and for when the workflow is complete.', 'grvityflow' ),
			'fields' => array(
				array(
					'name'     => 'instructions',
					'label'    => __( 'Message', 'gravityflow' ),
					'type'     => 'checkbox_and_textarea',
					'tooltip'  => esc_html__( 'Activate this setting to display a message to the user.', 'gravityflow' ),
					'checkbox' => array(
						'label' => esc_html__( 'Display message', 'gravityflow' ),
					),
					'textarea' => array(
						'use_editor'    => true,
						'default_value' => '',
					),
				),
				array(
					'name'    => 'display_fields',
					'label'   => __( 'Display Fields', 'gravityflow' ),
					'tooltip' => __( 'Select the fields to hide or display to non-assignees.', 'gravityflow' ),
					'type'    => 'display_fields',
				),
			),
		);

		return $settings;
	}
}

Gravity_Flow_Steps::register( new Gravity_Flow_Step_Workflow_Start() );
