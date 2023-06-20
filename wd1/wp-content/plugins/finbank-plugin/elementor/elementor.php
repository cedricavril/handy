<?php

namespace FINBANKPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page One
		'banner_v1',
		'our_feature',		
		'banking_tabs_v1',
		'wealth_secure_area',
		'emergency_service_tab',
		'credit_card',
		'foreign_exchange',
		'our_faqs_v1',
		'hotel_deal_offer',
		'emi_calculator',
		'call_to_action',
		
		//Home Page Two
		'banner_v2',
		'corporate_banking',
		'wealth_secure_v2',
		'our_clients',
		'emergency_service_v2',
		'locker_facility',
		'interesting_numbers',
		'our_feature_v2',
		'exciting_offers',
		'latest_news',
		'awards_and_achivements',
		
		//Home Page Three
		'banner_v3',
		'saving_money',
		'our_clients_v2',
		'banking_tabs_v2',
		'benefits_section',
		'emergency_service_v3',
		'account_easy_steps',
		'credit_card_v2',
		'our_testimonials',		
		'latest_news_v2',
		
		//Inner Pages
		'account_easy_steps_v2',
		'mobile_app',
		'get_more_money',
		'statistics_area',
		'eligibility_open_account',
		'required_documents',
		'account_charges',
		'credit_card_v3',
		'best_credit_cards',
		'credit_card_detail',
		'about_us',
		'why_choose_us',
		'mission_statement',
		'statistics_area_v2',
		'careers',
		'career_details',
		'our_team',
		'our_testimonial_v2',
		'faqs_v2',
		'our_feature_v2',		
		'applying_process',
		'send_your_request',
		'grid_view_news',
		'list_view_news',
		'contact_us',
		'branch_location',
		'customer_care_center',
		
		
		//Elements Pages
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = FINBANKPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\FINBANKPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'finbank',
			[
				'title' => esc_html__( 'Finbank', 'finbank' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'finbank' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();