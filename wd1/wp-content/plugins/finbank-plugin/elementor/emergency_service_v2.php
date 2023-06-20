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
class Emergency_Service_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_emergency_service_v2';
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
        return esc_html__( 'Emergency Service V2', 'finbank' );
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
            'emergency_service_v2',
            [
                'label' => esc_html__( 'Emergency Service V2', 'finbank' ),
            ]
        );
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'finbank' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'finbank' ),
			]
		);
		$this->add_control(
			'bg_image2',
			[
				'label' => __( 'BG Image Two', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
		    'features', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Credit & Debit Card', 'finbank')],
						['block_title' => esc_html__('Mobile & Internet', 'finbank')],
						['block_title' => esc_html__('Account Details', 'finbank')],
						['block_title' => esc_html__('Cheque / DD', 'finbank')],
						['block_title' => esc_html__('Online Payments', 'finbank')],
						['block_title' => esc_html__('Cyber Security', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'icon_image',
						'label' => esc_html__('Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_sub_title',
						'label' => esc_html__('Sub Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'title_link',
						'label' => __( 'External Url', 'finbank' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
				],
				'title_field' => '{{block_title}}',
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
	
    <!--Start Service Request Area-->
    <section class="service-request-area">
        <div class="container">
            <div class="row service-request-area__inner">

                <div class="col-xl-5 width100">
                    <div class="service-request-content-one">
                        <div class="service-request-content-one-bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
                        <div class="service-request-content-one__title">
                            <?php if($settings['title'] || $settings['text']) { ?>
                            <div class="sec-title">
                                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                                <?php if($settings['text']) { ?>
                                <div class="sub-title">
                                    <p><?php echo wp_kses($settings['text'], true);?></p>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7 width100">
                    <div class="service-request-content-two">
                        <div class="service-request-content-two-bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image2']['id'])); ?>);"></div>
                        <div class="service-request-content-two__inner">
                            <ul class="row">
								<?php foreach($settings['features'] as $key => $item): ?>
                                <!--Start Single Service Request Content Box-->
                                <li class="col-xl-4">
                                    <div class="single-service-request-content-box">
                                        <div class="static-content">
                                            <?php if($item['icon_image']['id']){ ?>
                                            <div class="icon">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                            </div>
                                            <?php } ?>
                                            <div class="more-btn">
                                                <a href="<?php echo esc_url( $item['title_link']['url'] ); ?>">
                                                    <span class="icon-right-arrow"></span>
                                                </a>
                                            </div>
                                            <div class="inner-title">
                                                <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                                <h4><?php echo wp_kses($item['block_sub_title'], true);?></h4>
                                            </div>
                                        </div>
                                        <div class="overlay-content">
                                            <div class="title">
                                                <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                            </div>
                                            <?php $features_list = $item['features_list'];
												if(!empty($features_list)){
												$features_list = explode("\n", ($features_list)); 
											?>
											<ul>
												<?php foreach($features_list as $features): ?>
												   <li><?php echo wp_kses($features, true); ?></li>
												<?php endforeach; ?>
											</ul>
											<?php } ?>
                                        </div>
                                    </div>
                                </li>
                                <!--End Single Service Request Content Box-->
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Service Request Area-->
             
        <?php
    }
}
