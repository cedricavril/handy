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
class Emergency_Service_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_emergency_service_v3';
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
        return esc_html__( 'Emergency Service V3', 'finbank' );
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
            'emergency_service_v3',
            [
                'label' => esc_html__( 'Emergency Service V3', 'finbank' ),
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
				'type'        => Controls_Manager::TEXTAREA,
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
			'pattern_image',
			[
				'label' => __( 'Pattern Image', 'finbank' ),
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
						['block_title' => esc_html__('Cyber Security', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'finbank'),
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
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'finbank' ),
				'default'     => __( 'View All Accounts', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				  'label' => __( 'Button Url', 'finbank' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
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
	
    <!--Start Service Request Style2 Area-->
    <section class="service-request-style2-area">
        <div class="container">
            <div class="row">
				<?php if($settings['bg_image']['id']){ ?>
                <div class="col-xl-6">
                    <div class="service-request-style2-img-box">
                        <div class="service-request-style2-img-box__inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                        </div>
                    </div>
                </div>
				<?php } ?>
                <div class="col-xl-6">
                    <div class="service-request-style2-content-box">
                        <?php if($settings['pattern_image']['id']){ ?>
                        <div class="pattern-bottom" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id'])); ?>);"></div>
                        <?php } ?>
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
                        <div class="service-request-style2-content-box__inner">
                            <ul>
                                <?php foreach($settings['features'] as $key => $item): ?>
                                <li>
                                    <div class="single-service-request-style2-box">
                                        <div class="icon">
                                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                        </div>
                                        <?php if($item['block_title']) { ?>
                                        <div class="title">
                                            <h3>
                                                <?php echo wp_kses($item['block_title'], true);?>
                                                <a href="<?php echo esc_url( $item['title_link']['url'] ); ?>"><span class="icon-right-arrow"></span></a>
                                            </h3>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php if($settings['btn_link']['url']) { ?>
                            <div class="service-request-style2__btns-box">
                                <a class="btn-one" href="<?php echo esc_url($settings['btn_link']['url']);?>">
                                    <span class="txt"><?php echo wp_kses($settings['btn_title'], true);?></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Service Request Style2 Area-->
             
        <?php
    }
}
