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
class Credit_Card_Detail extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_credit_card_detail';
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
        return esc_html__( 'Credit Card Detail', 'finbank' );
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
            'credit_card_detail',
            [
                'label' => esc_html__( 'Credit Card Detail', 'finbank' ),
            ]
        );
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'finbank' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => finbank_get_sidebars(),
			]
		);
		$this->add_control(
			'block_sub_title',
			[
				'label'       => __( 'Sub Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'finbank' ),
			]
		);
		$this->add_control(
			'block_title',
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
			'block_text',
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
			'show_card_box',
			[
				'label'       => __( 'Enable/Disable Card Box', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
             'cards_img', 
		 	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						
					],
				'fields' => 
				[
					[
						'name' => 'bg_image',
						'label' => esc_html__('Card Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
				],
			 ]
        );
		$this->add_control(
             'cards_info', 
		 	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['title2' => esc_html__('Welcome Bonus', 'finbank')],
						['title2' => esc_html__('Accelerated Rewards', 'finbank')],
						['title2' => esc_html__('Fuel Surcharge Waiver', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'title2',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'text2',
						'label' => esc_html__('Text', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
				],
				'title_field' => '{{title2}}',
			 ]
        );
		$this->add_control(
			'show_benefit_box',
			[
				'label'       => __( 'Enable/Disable Features Box', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'block_title2',
			[
				'label'       => __( 'Features Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_benefit_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Features Title', 'finbank' ),
			]
		);
		$this->add_control(
			'block_text2',
			[
				'label'       => __( 'Text', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_benefit_box' => 'yes',
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
						['title3' => esc_html__('Earn Interest up to 7%', 'finbank')],
						['title3' => esc_html__('Free SMS Alerts', 'finbank')],
						['title3' => esc_html__('International Debit Cards', 'finbank')],
						['title3' => esc_html__('Provides Safety', 'finbank')]
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
						'name' => 'title3',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'text3',
						'label' => esc_html__('Text', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'finbank' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style One', 'finbank' ),
							'two' => esc_html__( 'Choose Style Two', 'finbank' ),
							'three'  => esc_html__( 'Choose Style Three', 'finbank' ),
							'four'  => esc_html__( 'Choose Style Four', 'finbank' ),
						),
					],
				],
				'title_field' => '{{title3}}',
			 ]
        );
		$this->add_control(
			'show_offer_box',
			[
				'label'       => __( 'Enable/Disable Exciting Offers Box', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'block_title3',
			[
				'label'       => __( 'Features Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_offer_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Features Title', 'finbank' ),
			]
		);
		$this->add_control(
			'block_text3',
			[
				'label'       => __( 'Text', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_offer_box' => 'yes',
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
						['block_cate' => esc_html__('Medical', 'finbank')],
						['block_cate' => esc_html__('Entertainment', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'logo_image',
						'label' => esc_html__('Logo Image', 'finbank'),
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
						'name' => 'title4',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],					
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Apply Now', 'finbank')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'finbank' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'btn_title2',
						'label' => esc_html__('Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Read More', 'finbank')
					],
					[
						'name' => 'btn_link2',
						'label' => __( 'Button Link', 'finbank' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_cate}}',
			 ]
        );
		$this->add_control(
			'show_accordion_box_info',
			[
				'label'       => __( 'Enable/Disable Accordion Box', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
             'accordion_box', 
		 	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['accordion_title' => esc_html__('Eligibility to Apply', 'finbank')],
						['accordion_title' => esc_html__('Fees & Charges', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'accordion_title',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'accordion_title2',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'accordion_btn_title',
						'label' => esc_html__('Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('Open An Account', 'finbank')
					],
					[
						'name' => 'btn_link3',
						'label' => __( 'Button Link', 'finbank' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{accordion_title}}',
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
	
    <!--Start Cards Details Area-->
    <section class="cards-details-area">
        <div class="container">
            <div class="row">
				<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                <div class="col-xl-4">
                    <div class="sidebar-box-style2">
                        <?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                    </div>
                </div>
				<?php endif; ?>

                <div class="<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) echo 'col-xl-8 col-md-12 col-sm-12 '; else echo 'col-xl-12 col-lg-12'; ?>">
                    <div class="cards-deails-content-box">
                        <div class="cards-deails-content-1">
                            <div class="inner-title">
                                <?php if($settings['block_sub_title']) { ?><h5><?php echo wp_kses($settings['block_sub_title'], true);?></h5><?php } ?>
                                <?php if($settings['block_title']) { ?><h2><?php echo wp_kses($settings['block_title'], true);?></h2><?php } ?>
                            </div>
                            <?php if($settings['block_text']) { ?>
                            <div class="text">
                                <?php echo wp_kses($settings['block_text'], true);?>
                            </div>
                            <?php } ?>
                        </div>
						<?php if($settings['show_card_box']):?>
                        <div class="cards-deails-content-2">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="img-box">
                                        <ul>
                                            <?php foreach($settings['cards_img'] as $key => $item): ?>
                                            <li>
                                            	<?php if($item['bg_image']['id']) { ?>
                                                <div class="single-img-box">
                                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                                </div>
                                                <?php } ?>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="text-box">
                                        <ul>
                                            <?php foreach($settings['cards_info'] as $key => $item): ?>
                                            <li>
                                            	<?php if($item['title2'] || $item['text2']) { ?>
                                                <span class="icon-shield-2"></span>
                                                <h3><?php echo wp_kses($item['title2'], true);?></h3>
                                                <p><?php echo wp_kses($item['text2'], true);?></p>
                                                <?php } ?>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
						<?php if($settings['show_benefit_box']):?>
                        <div class="card-details-features-box">
                            <?php if($settings['block_title2'] || $settings['block_text2']) { ?>
                            <div class="inner-title">
                                <?php if($settings['block_title2']) { ?><h2><?php echo wp_kses($settings['block_title2'], true);?></h2><?php } ?>
                                <?php echo wp_kses($settings['block_text2'], true);?>
                            </div>
							<?php } ?>
                            <div class="row">
								<?php foreach($settings['features'] as $key => $item): ?>
                                <!--Start Card Details Single Features Box-->
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="card-details-single-features-box <?php if($item['style_two'] =='four') echo 'style4'; elseif($item['style_two'] =='three') echo 'style3'; elseif($item['style_two'] =='two') echo 'style2'; else echo ''; ?>">
                                        <div class="single-benefits-box">
                                            <?php if($item['icons']){ ?>
                                            <div class="icon">
                                                <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                            </div>
                                            <?php } ?>
                                            <div class="text">
                                                <h3><?php echo wp_kses($item['title3'], true);?></h3>
                                                <p><?php echo wp_kses($item['text3'], true);?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Card Details Single Features Box-->
								<?php endforeach; ?>
                            </div>
                        </div>
						<?php endif; ?>
                        <?php if($settings['show_offer_box']):?>
                        <!--Start Card details Offer Box-->
                        <div class="card-details-offer-box">
                            <?php if($settings['block_title3'] || $settings['block_text3']) { ?>
                            <div class="inner-title">
                                <?php if($settings['block_title3']) { ?><h2><?php echo wp_kses($settings['block_title3'], true);?></h2><?php } ?>
                                <?php echo wp_kses($settings['block_text3'], true);?>
                            </div>
							<?php } ?>
                            <div class="row">
                                <?php foreach($settings['features2'] as $key => $item): ?>
                                <!--Start Single Offer Box-->
                                <div class="col-xl-6">
                                    <div class="single-offer-box">
                                        <div class="top">
                                        	<?php if($item['logo_image']['id']) { ?>
                                            <div class="offer-logo">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($item['logo_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                            </div>
                                            <?php } ?>
                                            <?php if($item['block_date']) { ?>
                                            <div class="date-box">
                                                <p><?php echo wp_kses($item['block_date'], true); ?></p>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php if($item['block_cate']) { ?>
                                        <div class="category">
                                            <h4><?php echo wp_kses($item['block_cate'], true); ?></h4>
                                            <div class="border-box"></div>
                                        </div>
                                        <?php } ?>
                                        <h3><?php echo wp_kses($item['title4'], true);?></h3>
                                        <div class="bottom">
                                            <?php if($item['btn_title'] || $item['btn_link']['url']){ ?>
                                            <div class="btn-box">
                                                <a href="<?php echo esc_url($item['btn_link']['url']); ?>"><span class="icon-right-arrow"></span><?php echo wp_kses($item['btn_title'], true); ?></a>
                                            </div>
                                            <?php } ?>
                                            <?php if($item['btn_title2'] || $item['btn_link2']['url']){ ?>
                                            <div class="share-btn">
                                                <a href="<?php echo esc_url($item['btn_link2']['url']); ?>"><span class="icon-share"></span><?php echo wp_kses($item['btn_title2'], true); ?></a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!--End Single Offer Box-->
								<?php endforeach; ?>
                            </div>
                        </div>
                        <!--End Card details Offer Box-->
						<?php endif; ?>
                        <?php if($settings['show_accordion_box_info']):?>
                        <div class="card-deatils-accordion-box">
                            <ul class="accordion-box">
                                <?php $i=1; foreach($settings['accordion_box'] as $key => $item): ?>
                                <li class="accordion block <?php if($i==1) echo 'active-block';?>">
                                    <div class="acc-btn <?php if($i==1) echo 'active';?>">
                                        <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                        <h3><?php echo wp_kses($item['accordion_title'], true);?></h3>
                                    </div>
                                    <div class="acc-content <?php if($i==1) echo 'current';?>">
                                        <div class="card-deatils-accordion-box-content">
                                            <h4><?php echo wp_kses($item['accordion_title2'], true);?></h4>
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
                                            <?php if($item['accordion_btn_title'] || $item['btn_link3']['url']) { ?>
                                            <div class="btns-box">
                                                <a class="btn-one" href="<?php echo esc_url($item['btn_link3']['url']); ?>">
                                                    <span class="txt"><?php echo wp_kses($item['accordion_btn_title'], true);?></span>
                                                </a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                                <?php $i++; endforeach; ?>
                            </ul>
                        </div>
						<?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Cards Details Area-->
      
        <?php
    }
}
