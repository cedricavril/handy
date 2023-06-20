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
class Exciting_Offers extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_exciting_offers';
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
        return esc_html__( 'Exciting Offers', 'finbank' );
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
            'exciting_offers',
            [
                'label' => esc_html__( 'Exciting Offers', 'finbank' ),
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
		    'features', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Get 10% Cashback on Xfinity Restuarant.', 'finbank')],
						['block_title' => esc_html__('Get 25% Cashback on Brex Restuarant.', 'finbank')]
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
						'name' => 'block_date',
						'label' => esc_html__('Date', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_cate',
						'label' => esc_html__('Category', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_btn_title',
						'label' => esc_html__('Button Title', 'finbank'),
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
						'name' => 'block_btn_title2',
						'label' => esc_html__('Share Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'share_link',
						'label' => __( 'External Share Url', 'finbank' ),
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
			'show_subscribe_box',
			[
				'label'       => __( 'Enable/Disable Subscribe Box', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'show_subscribe_box' => 'yes',
				],
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
				'condition' => [
					'show_subscribe_box' => 'yes',
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
				'condition' => [
					'show_subscribe_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Text', 'finbank' ),
			]
		);
		$this->add_control(
			'mailchimp_form_url',
			[
				'label'       => __( 'MailChimp Form Url', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_subscribe_box' => 'yes',
				],
				'placeholder' => __( 'Enter your MailChimp Form Url', 'finbank' ),
			]
		);
		$this->add_control(
		    'features2', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title2' => esc_html__('Get 30% Cashback on Sysco Restuarant.', 'finbank')],
						['block_title2' => esc_html__('Get 18% Cashback on Laren Restuarant.', 'finbank')]
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
						'name' => 'block_date2',
						'label' => esc_html__('Date', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_cate2',
						'label' => esc_html__('Category', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_title2',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_btn_title2',
						'label' => esc_html__('Button Title', 'finbank'),
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
					[
						'name' => 'block_btn_title3',
						'label' => esc_html__('Share Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'share_link2',
						'label' => __( 'External Share Url', 'finbank' ),
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
			'btn_title',
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
			'btn_link',
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
	
    <!--Start Offers Area-->
    <section class="offers-area">
        <div class="container">
            <?php if($settings['title'] || $settings['text']) { ?>
            <div class="sec-title text-center">
                <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
				<?php if($settings['text']) { ?>
                <div class="sub-title">
                    <p><?php echo wp_kses($settings['text'], true);?></p>
                </div>
                <?php } ?>
            </div>
            <?php } ?>

            <div class="row">
                <div class="col-xl-4">
                    <?php foreach($settings['features'] as $key => $item): ?>
                    <!--Start Single Offer Box-->
                    <div class="single-offer-box">
                        <div class="top">
                            <?php if($item['icon_image']['id']){ ?>
                            <div class="offer-logo">
                                <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                            </div>
                            <?php } ?>
                            <div class="date-box">
                                <p><?php echo wp_kses($item['block_date'], true);?></p>
                            </div>
                        </div>
                        <?php if($item['block_cate']){ ?>
                        <div class="category">
                            <h4><?php echo wp_kses($item['block_cate'], true);?></h4>
                            <div class="border-box"></div>
                        </div>
                        <?php } ?>
                        <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                        <div class="bottom">
                            <?php if($item['title_link']['url']) { ?>
                            <div class="btn-box">
                                <a href="<?php echo esc_url( $item['title_link']['url'] ); ?>"><span class="icon-right-arrow"></span><?php echo wp_kses($item['block_btn_title'], true);?></a>
                            </div>
                            <?php } ?>
                            <?php if($item['share_link']['url']) { ?>
                            <div class="share-btn">
                                <a href="<?php echo esc_url( $item['share_link']['url'] ); ?>"><span class="icon-share"></span><?php echo wp_kses($item['block_btn_title2'], true);?></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--End Single Offer Box-->
                    <?php endforeach; ?>
                </div>
				<?php if($settings['show_subscribe_box']):?>
                <div class="col-xl-4">
                    <div class="subscribe-box-style1">
                        <?php if($settings['bg_image']['id']){ ?>
                        <div class="icon">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                        </div>
                        <?php } ?>
                        <div class="inner-title">
                            <?php if($settings['title2']) { ?><h3><?php echo wp_kses($settings['title2'], true);?></h3><?php } ?>
                            <?php if($settings['text2']) { ?><p><?php echo wp_kses($settings['text2'], true);?></p><?php } ?>
                        </div>
                        <div class="subscribe-form-style1">
                            <?php echo do_shortcode($settings['mailchimp_form_url']);?>
                        </div>
                    </div>
                </div>
				<?php endif; ?>
                <div class="col-xl-4">
                    <?php foreach($settings['features2'] as $key => $item): ?>
                    <!--Start Single Offer Box-->
                    <div class="single-offer-box">
                        <div class="top">
                            <?php if($item['icon_image2']['id']){ ?>
                            <div class="offer-logo">
                                <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                            </div>
                            <?php } ?>
                            <div class="date-box">
                                <p><?php echo wp_kses($item['block_date2'], true);?></p>
                            </div>
                        </div>
                        <?php if($item['block_cate2']){ ?>
                        <div class="category">
                            <h4><?php echo wp_kses($item['block_cate2'], true);?></h4>
                            <div class="border-box"></div>
                        </div>
                        <?php } ?>
                        <h3><?php echo wp_kses($item['block_title2'], true);?></h3>
                        <div class="bottom">
                            <?php if($item['title_link2']['url']) { ?>
                            <div class="btn-box">
                                <a href="<?php echo esc_url( $item['title_link2']['url'] ); ?>"><span class="icon-right-arrow"></span><?php echo wp_kses($item['block_btn_title2'], true);?></a>
                            </div>
                            <?php } ?>
                            <?php if($item['share_link2']['url']) { ?>
                            <div class="share-btn">
                                <a href="<?php echo esc_url( $item['share_link2']['url'] ); ?>"><span class="icon-share"></span><?php echo wp_kses($item['block_btn_title3'], true);?></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--End Single Offer Box-->
                    <?php endforeach; ?>
                </div>
            </div>
			<?php if($settings['btn_link']['url']) { ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="view-all-offer-btn">
                        <a href="<?php echo esc_url($settings['btn_link']['url']);?>"><span class="icon-right-arrow"></span><?php echo wp_kses($settings['btn_title'], true);?></a>
                    </div>
                </div>
            </div>
			<?php } ?>

        </div>
    </section>
    <!--End Offers Area-->
             
        <?php
    }
}
