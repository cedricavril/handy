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
class Corporate_Banking extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_corporate_banking';
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
        return esc_html__( 'Corporate Banking', 'finbank' );
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
            'corporate_banking',
            [
                'label' => esc_html__( 'Corporate Banking', 'finbank' ),
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
			'btn_title',
			[
				'label'       => __( 'Button Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'finbank' ),
				'default'     => __( 'More Service', 'finbank' ),
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
		$this->add_control(
		    'features', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Savings &<br> CDs', 'finbank')],
						['block_title' => esc_html__('Online &<br> Mobile', 'finbank')],
						['block_title' => esc_html__('Cosumer<br> Loan', 'finbank')],
						['block_title' => esc_html__('Invest &<br> Insure', 'finbank')],
						['block_title' => esc_html__('Credit &<br> Debit Cards', 'finbank')]
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
			'bg_image2',
			[
				'label' => __( 'Right BG Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Right Title', 'finbank' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Right Text', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'finbank' ),
			]
		);
		$this->add_control(
		    'features2', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title2' => esc_html__('Commercial<br> C/A', 'finbank')],
						['block_title2' => esc_html__('Online &<br> Mobile', 'finbank')],
						['block_title2' => esc_html__('Business<br> Loan', 'finbank')],
						['block_title2' => esc_html__('Invest &<br> Insure', 'finbank')],
						['block_title2' => esc_html__('Cash<br> Management', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'icon_image2',
						'label' => esc_html__('Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'block_title2',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'title_link2',
						'label' => __( 'External Url', 'finbank' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title2}}',
			 ]
        );	
		$this->add_control(
			'btn_title2',
			[
				'label'       => __( 'Right Button Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'finbank' ),
				'default'     => __( 'More Service', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_link2',
			[
				  'label' => __( 'Right Button Url', 'finbank' ),
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
	
    <!--Start Individual Corporate Banking area-->
    <section class="individual-corporate-banking-area" id="services">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="individual-banking">
                        <div class="individual-banking-bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"></div>
                        <div class="individual-banking__inner">
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
                            <div class="individual-banking__inner-content">
                                <ul>
                                    <?php foreach($settings['features'] as $key => $item): ?>
                                    <li>
                                        <!--Start Single Features Of Banking-->
                                        <div class="single-features-of-banking">
                                            <?php if($item['icon_image']['id']){ ?>
                                            <div class="icon-holder">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                            </div>
                                            <?php } ?>
                                            <h3><a href="<?php echo esc_url( $item['title_link']['url'] ); ?>"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                                            <?php if($item['title_link']['url']) { ?>
                                            <div class="btn-box">
                                                <a href="<?php echo esc_url( $item['title_link']['url'] ); ?>"><span class="icon-right-arrow"></span></a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <!--End Single Features Of Banking-->
                                    </li>
                                    <?php endforeach; ?>
                                    <?php if($settings['btn_link']['url']) { ?>
                                    <li>
                                        <!--Start Single Features Of Banking-->
                                        <div class="single-features-of-banking more-services">
                                            <div class="more-service-box">
                                                <a href="<?php echo esc_url($settings['btn_link']['url']);?>"><span class="icon-add"></span></a>
                                                <h3><?php echo wp_kses($settings['btn_title'], true);?></h3>
                                            </div>
                                        </div>
                                        <!--End Single Features Of Banking-->
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-6">
                    <div class="corporate-banking">
                        <div class="corporate-banking-bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image2']['id'])); ?>);"></div>
                        <div class="corporate-banking__inner">
                            <?php if($settings['title2'] || $settings['text2']) { ?>
                            <div class="sec-title">
                                <?php if($settings['title2']) { ?><h2><?php echo wp_kses($settings['title2'], true);?></h2><?php } ?>
                                <?php if($settings['text2']) { ?>
                                <div class="sub-title">
                                    <p><?php echo wp_kses($settings['text2'], true);?>/p>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <div class="corporate-banking__inner-content">
                                <ul>
                                    <?php foreach($settings['features2'] as $key => $item): ?>
                                    <li>
                                        <!--Start Single Features Of Banking-->
                                        <div class="single-features-of-banking single-features-of-banking--style2">
                                            <?php if($item['icon_image2']['id']){ ?>
                                            <div class="icon-holder">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                            </div>
                                            <?php } ?>
                                            <h3><a href="<?php echo esc_url( $item['title_link2']['url'] ); ?>"><?php echo wp_kses($item['block_title2'], true);?></a></h3>
                                            <?php if($item['title_link2']['url']) { ?>
                                            <div class="btn-box">
                                                <a href="<?php echo esc_url( $item['title_link2']['url'] ); ?>"><span class="icon-right-arrow"></span></a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <!--End Single Features Of Banking-->
                                    </li>
                                    <?php endforeach; ?>
                                    <?php if($settings['btn_link2']['url']) { ?>
                                    <li>
                                        <!--Start Single Features Of Banking-->
                                        <div
                                            class="single-features-of-banking single-features-of-banking--style2 more-services">
                                            <div class="more-service-box">
                                                <a href="<?php echo esc_url($settings['btn_link2']['url']);?>"><span class="icon-add"></span></a>
                                                <h3><?php echo wp_kses($settings['btn_title2'], true);?></h3>
                                            </div>
                                        </div>
                                        <!--End Single Features Of Banking-->
                                    </li>
									<?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Individual Corporate Banking area-->
             
        <?php
    }
}
