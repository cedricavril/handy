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
class Customer_Care_Center extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_customer_care_center';
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
        return esc_html__( 'Customer Care Center', 'finbank' );
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
            'customer_care_center',
            [
                'label' => esc_html__( 'Customer Care Center', 'finbank' ),
            ]
        );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
             'info', 
		 	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Personal Banking', 'finbank')],
						['btn_title' => esc_html__('Corporate Banking', 'finbank')],
					],
				'fields' => 
				[
					[
						'name' => 'btn_title',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_name',
						'label' => esc_html__('Heading One', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_name2',
						'label' => esc_html__('Heading Two', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_title',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_phone_title',
						'label' => esc_html__('Phone Text', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_phone_no',
						'label' => esc_html__('Phone Number', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_email',
						'label' => esc_html__('Email Address', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_title2',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_phone_no2',
						'label' => esc_html__('Phone Number', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_email2',
						'label' => esc_html__('Email Address', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],												
					[
						'name' => 'table_text',
						'label' => esc_html__('Description', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'table_btn_title',
						'label' => esc_html__('Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_url',
						'label' => __( 'Button Link', 'finbank' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
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
	
    <!--Start Customer Care Numbers Area-->
    <section class="customer-care-numbers-area">
        <div class="container">
            <?php if($settings['title']) { ?>
            <div class="title-box">
                <h2><?php echo wp_kses($settings['title'], true);?></h2>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="customer-care-numbers-tab">

                        <div class="customer-care-numbers-tab__button">
                            <ul class="tabs-button-box clearfix">
                                <?php $count = 1; foreach($settings['info'] as $key => $item): ?>
                                <li data-tab="#personal-banking<?php echo esc_attr($count); ?>" class="tab-btn-item <?php if($count == 1) echo 'active-btn-item' ?>">
                                    <h4><?php echo wp_kses($item['btn_title'], true); ?></h4>
                                </li>
                                <?php $count++; endforeach; ?>
                            </ul>
                        </div>

                        <!--Start Tabs Content Box-->
                        <div class="tabs-content-box">
                            <?php $count = 1; foreach($settings['info'] as $key => $item): ?>
                            <!--Tab-->
                            <div class="tab-content-box-item <?php if($count == 1) echo 'tab-content-box-item-active';?>" id="personal-banking<?php echo esc_attr($count);?>">

                                <div class="customer-care-numbers-tab-content-box-item">
                                    <div class="customer-care-numbers-table-box">
                                        <div class="table-outer">
                                            <table class="customer-care-numbers-table">
                                                <thead class="header">
                                                    <tr>
                                                        <th><?php echo wp_kses($item['table_name'], true); ?></th>
                                                        <th><?php echo wp_kses($item['table_name2'], true); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="inner-title">
                                                            <?php if($item['table_title']) { ?><h3><?php echo wp_kses($item['table_title'], true); ?></h3><?php } ?>
                                                        </td>
                                                        <td class="contact-info">
                                                            <ul>
                                                                <?php if($item['table_phone_no']) { ?>
                                                                <li>
                                                                    <a href="tel:<?php echo esc_attr($item['table_phone_no']); ?>"><?php echo wp_kses($item['table_phone_no'], true); ?></a>
                                                                    <span><?php echo wp_kses($item['table_phone_title'], true); ?></span>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($item['table_email']) { ?>
                                                                <li>
                                                                    <a class="color2" href="mailto:<?php echo esc_attr($item['table_email']); ?>"><?php echo wp_kses($item['table_email'], true); ?></a>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                    	
                                                        <td class="inner-title">
                                                            <?php if($item['table_title2']) { ?><h3><?php echo wp_kses($item['table_title2'], true); ?></h3><?php } ?>
                                                        </td>                                                        
                                                        <td class="contact-info">
                                                            <ul>
                                                                <?php if($item['table_phone_no2']) { ?>
                                                                <li>
                                                                    <a href="tel:<?php echo esc_attr($item['table_phone_no2']); ?>"><?php echo wp_kses($item['table_phone_no2'], true); ?></a>
                                                                </li>
                                                                <?php } ?>
                                                                <?php if($item['table_email2']) { ?>
                                                                <li>
                                                                    <a class="color2" href="mailto:<?php echo esc_attr($item['table_email2']); ?>"><?php echo wp_kses($item['table_email2'], true); ?></a>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
										<?php if($item['table_text'] || $item['table_btn_title']) { ?>
                                        <div class="bottom-text text-center">
                                            <h3><?php echo wp_kses($item['table_text'], true); ?> <a href="<?php echo esc_url($item['btn_url']['url']); ?>"><?php echo wp_kses($item['table_btn_title'], true); ?></a></h3>
                                        </div>
										<?php } ?>
                                    </div>
                                </div>

                            </div>
                            <?php $count++; endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Customer Care Numbers Area-->  
             
        <?php
    }
}
