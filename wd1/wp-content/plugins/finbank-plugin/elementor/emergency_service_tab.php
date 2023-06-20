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
class Emergency_Service_Tab extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_emergency_service_tab';
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
        return esc_html__( 'Emergency Service Tab', 'finbank' );
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
            'emergency_service_tab',
            [
                'label' => esc_html__( 'Emergency Service Tab', 'finbank' ),
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
						['block_title' => esc_html__('Credit / Debit Card Related', 'finbank')],
						['block_title' => esc_html__('Mobile / Internet Banking', 'finbank')],
						['block_title' => esc_html__('Account Details Changing', 'finbank')],
						['block_title' => esc_html__('Cheque Book / DD Related', 'finbank')],
						['block_title' => esc_html__('Credit / Debit Card Related', 'finbank')],
						['block_title' => esc_html__('Mobile / Internet Banking', 'finbank')]
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
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'features_list',
						'label' => esc_html__('Feature List', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'bg_image',
						'label' => esc_html__('Feature BG Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'icons2',
						'label' => esc_html__('Enter The icons', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_sub_title',
						'label' => esc_html__('Sub Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_title2',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_phone_no',
						'label' => esc_html__('Phone Number', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
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
	
    <!--Start Features Style2 Area-->
    <section class="features-style2-area">
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
                <div class="col-xl-12">
                    <div class="features-style2-content">

                        <!--Start Features Style2 Tab-->
                        <div class="features-style2-tab">
                            <!--Start Features Style2 Tab Button-->
                            <div class="features-style2-tab__button">
                                <ul class="owl-carousel owl-theme thm-owl__carousel features-style2-carousel owl-nav-style-one tabs-button-box"
                                    data-owl-options='{
                                    "loop": false,
                                    "autoplay": false,
                                    "margin": 0,
                                    "nav": true,
                                    "dots": false,
                                    "smartSpeed": 500,
                                    "autoplayTimeout": 10000,
                                    "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                    "responsive": {
                                            "0": {
                                                "items": 1
                                            },
                                            "768": {
                                                "items": 2
                                            },
                                            "992": {
                                                "items": 3
                                            },
                                            "1200": {
                                                "items": 4
                                            }
                                        }
                                    }'>
									<?php $count = 1; foreach($settings['features'] as $key => $item): ?>
                                    <li data-tab="#tabid1<?php echo esc_attr($count)?>" class="tab-btn-item <?php if($count == 1) echo 'active-btn-item'; ?> clearfix">
                                        <div class="single-features-box-style2">
                                            <div class="icon">
                                                <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                            </div>
                                            <div class="title">
                                                <h3><a href="#"><?php echo wp_kses($item['block_title'], true);?></a></h3>
                                            </div>
                                            <div class="arrow-button">
                                                <a href="#">
                                                    <span class="icon-chevron"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php $count++; endforeach; ?>
                                </ul>
                            </div>
                            <!--End Features Style2 Tab Button-->

                            <!--Start Tabs Content Box-->
                            <div class="tabs-content-box">
                                <?php $count = 1; foreach($settings['features'] as $key => $item): ?>
                                <!--Tab-->
                                <div class="tab-content-box-item <?php if($count == 1) echo 'tab-content-box-item-active'; ?>" id="tabid1<?php echo esc_attr($count)?>">
                                    <div class="features-style2-tab-content-box-item">
                                        <div class="row clearfix">
                                            <?php $features_list = $item['features_list'];
												if(!empty($features_list)){
												$features_list = explode("\n", ($features_list)); 
											?>
                                            <div class="col-xl-6">
                                                <div class="features-style2-text-box">
                                                    <ul>
                                                        <?php foreach($features_list as $features): ?>
                                                        <li><?php echo wp_kses($features, true); ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="col-xl-6">
                                                <div class="features-style2-banner-box">
                                                    <div class="text-box">
                                                        
                                                        <!--Start Single Item-->
                                                        <div class="single-item">
                                                            <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons2']), true);?>"></span>
                                                            <h4><?php echo wp_kses($item['block_sub_title'], true);?></h4>
                                                            <h3><?php echo wp_kses($item['block_title2'], true);?></h3>
                                                            <h2>
                                                                <a href="tel:<?php echo esc_attr($item['block_phone_no']);?>"><?php echo wp_kses($item['block_phone_no'], true);?></a>
                                                            </h2>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php if($item['bg_image']['id']){ ?>
                                                    <div class="img-box">
                                                        <div class="img-box-bg"
                                                            style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['bg_image']['id'])); ?>);">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php $count++; endforeach; ?>
                            </div>
                            <!--End Tabs Content Box-->
                        </div>
                        <!--End Features Style2 Tab-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Features Style2 Area-->
                 
    <?php
    }
}
