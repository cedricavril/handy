<?php namespace FINBANKPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Branch_Location extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_branch_location';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Branch Location', 'finbank' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-library-open';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'finbank' ];
    }

    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'branch_location',
            [
                'label' => esc_html__( 'Branch Location', 'finbank' ),
            ]
        );
		$this->add_control(
			'show_map_box',
			[
				'label'       => __( 'Enable/Disable Google Map', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'google_map_url',
			[
				'label'       => __( 'Google Map Url', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_map_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Google Map Url', 'finbank' ),
			]
		);
		$this->add_control(
			'show_search_box',
			[
				'label'       => __( 'Enable/Disable Search Box', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
		   'features_tab', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Branch', 'finbank')],
						['btn_title' => esc_html__('atm', 'finbank')]
					],
				'fields' => 
				[
					
					[
						'name' => 'btn_title',
						'label' => esc_html__('Tab Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'branch_name',
						'label' => esc_html__('Branch Name', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'text_title',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'branch_text',
						'label' => esc_html__('Text', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'address_title',
						'label' => esc_html__('Address Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'branch_address',
						'label' => esc_html__('Branch Address', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'contact_title',
						'label' => esc_html__('Contact Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'branch_phone',
						'label' => esc_html__('Phone Number', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'branch_email',
						'label' => esc_html__('Email Address', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					
				],
				'title_field' => '{{btn_title}}',
			 ]
        );
		$this->end_controls_section();
    }

    /**
     * Render button widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
    ?>
	
    <!--Google Map Start-->
    <section class="google-map">
        <?php if($settings['show_map_box']):?>
		<?php echo do_shortcode($settings['google_map_url']);?>
		<?php endif; ?>
        <div class="google-map-content-box">
            <div class="branch-atm-tab">
                <!--Start Branch Atm Tab Buttom-->
                <div class="branch-atm-tab__button">
                    <ul class="tabs-button-box">
                        <?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                        <li data-tab="#branch<?php echo esc_attr($count); ?>" class="tab-btn-item <?php if($count == 1) echo 'active-btn-item' ?>">
                            <h5><?php echo wp_kses($item['btn_title'], true); ?></h5>
                        </li>
                        <?php $count++; endforeach; ?>
                    </ul>
                    <?php if($settings['show_search_box']):?>
                    <div class="location-search-box">
                        <div class="location-search-box__inner">
                            <form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <div class="input-box">
                                    <input name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Enter Your Location', 'finbank' ); ?>" type="text">
                                    <div class="icon">
                                        <span class="icon-map"></span>
                                    </div>
                                </div>
                                <button type="submit"><?php esc_html_e('Search','finbank');?></button>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <!--End Branch Atm Tab Buttom-->

                <!--Start Tabs Content Box-->
                <div class="tabs-content-box">
                    <?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                    <!--Tab-->
                    <div class="tab-content-box-item <?php if($count == 1) echo 'tab-content-box-item-active';?>" id="branch<?php echo esc_attr($count);?>">
                        <div class="branch-atm-tab-content-box-item">
                            <div class="inner-title">
                                <h3><?php echo wp_kses($item['branch_name'], true); ?></h3>
                            </div>
                            <ul>
                                <li>
                                    <h3><?php echo wp_kses($item['text_title'], true); ?></h3>
                                    <p><?php echo wp_kses($item['branch_text'], true); ?></p>
                                </li>
                                <li>
                                    <h3><?php echo wp_kses($item['address_title'], true); ?></h3>
                                    <p><?php echo wp_kses($item['branch_address'], true); ?></p>
                                </li>
                                <li>
                                    <h3><?php echo wp_kses($item['contact_title'], true); ?></h3>
                                    <p><a href="tel:<?php echo esc_attr($item['branch_phone']); ?>"><?php echo wp_kses($item['branch_phone'], true); ?></a></p>
                                    <p><a href="mailto:<?php echo esc_attr($item['branch_email']); ?>"><?php echo wp_kses($item['branch_email'], true); ?></a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
					<?php $count++; endforeach; ?>
                </div>
                <!--End Tabs Content Box-->

            </div>
        </div>

    </section>
    <!--Google Map End-->      
             
        <?php
    }
}
