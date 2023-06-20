<?php 

namespace FINBANKPLUGIN\Element;

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
class Foreign_Exchange extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'finbank_foreign_exchange';
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
		return esc_html__( 'Foreign Exchange', 'finbank' );
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
			'foreign_exchange',
			[
				'label' => esc_html__( 'General Setting', 'finbank' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
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
				'placeholder' => __( 'Enter your Title', 'finbank' ),
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
		
		//Money Send & Receive
		$this->start_controls_section(
            'money_send_info',
            [
                'label' => esc_html__( 'Money Send Tab Info', 'finbank' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'tab_title',
			[
				'label'       => __( 'Tab Button Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Tab Title', 'finbank' ),
			]
		);
		$this->add_control(
		   'monthly', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['plan_title' => esc_html__('usd', 'finbank')],
						['plan_title' => esc_html__('sek', 'finbank')],
						['plan_title' => esc_html__('gbp', 'finbank')],
						['plan_title' => esc_html__('jpy', 'finbank')],
						['plan_title' => esc_html__('aud', 'finbank')],
						['plan_title' => esc_html__('cad', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'icon_image',
						'label' => esc_html__('Country Flag Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'plan_title',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'price',
						'label' => esc_html__('Send Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'price2',
						'label' => esc_html__('Receive Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
				],
				'title_field' => '{{plan_title}}',
			 ]
        );
		$this->end_controls_section();
		
		//Load & Redeem Forex Card
		$this->start_controls_section(
            'forex_card',
            [
                'label' => esc_html__( 'Forex Card View', 'finbank' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'tab_title2',
			[
				'label'       => __( 'Tab Button Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Tab Button Title', 'finbank' ),
			]
		);
		$this->add_control(
		   'yearly', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['plan_title2' => esc_html__('jpy', 'finbank')],
						['plan_title2' => esc_html__('AUD', 'finbank')],
						['plan_title2' => esc_html__('CAD', 'finbank')],
						['plan_title2' => esc_html__('USD', 'finbank')],
						['plan_title2' => esc_html__('SEK', 'finbank')],
						['plan_title2' => esc_html__('GBP', 'finbank')]
					],
				'fields' => 
				[
					
					[
						'name' => 'icon_image2',
						'label' => esc_html__('Country Flag Image', 'finbank'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'plan_title2',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'price3',
						'label' => esc_html__('Send Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'price4',
						'label' => esc_html__('Receive Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
				],
				'title_field' => '{{plan_title2}}',
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
	?>
    
    <!--Start Money Exchange Rates Area-->
    <section class="money-exchange-value-area">
        <div class="money-exchange-value-area-bg" <?php if($settings['bg_image']['id']) { ?> style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>);"<?php } ?>></div>
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
                    <div class="money-exchange-value-tab">

                        <!--Start Money Exchange Value Tab Button-->
                        <div class="money-exchange-value-tab__button">
                            <ul class="tabs-button-box">
                                <li data-tab="#money-send-receive" class="tab-btn-item active-btn-item">
                                    <h3><?php echo wp_kses($settings['tab_title'], true); ?></h3>
                                </li>
                                <li data-tab="#load-redeem-forex-card" class="tab-btn-item">
                                    <h3><?php echo wp_kses($settings['tab_title2'], true); ?></h3>
                                </li>
                            </ul>
                            <?php if($settings['btn_title'] || $settings['btn_link']['url']) { ?>
                            <div class="right">
                                <a href="<?php echo esc_url($settings['btn_link']['url']); ?>"><span class="icon-menu"></span><?php echo wp_kses($settings['btn_title'], true); ?></a>
                            </div>
                            <?php } ?>
                        </div>
                        <!--End Money Exchange Value Tab Button-->

                        <!--Start Tabs Content Box-->
                        <div class="tabs-content-box">
                            <!--Tab-->
                            <div class="tab-content-box-item tab-content-box-item-active" id="money-send-receive">
                                <div class="money-exchange-value-tab-content-box-item">
                                    <div class="row">
										<?php foreach ($settings['monthly'] as $key => $item):?>
                                        <!--Start Single Money Exchange Value-->
                                        <div class="col-xl-2 col-lg-4 col-md-4">
                                            <div class="single-money-exchange-value">
                                                <?php if($item['icon_image']['id']){ ?>
                                                <div class="flag-box">
                                                    <div class="flag-box-inner">
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php if($item['plan_title']){ ?><h3><?php echo wp_kses($item['plan_title'], true); ?></h3><?php } ?>
                                                <ul>
                                                    <?php if($item['price']){ ?>
                                                    <li>
                                                        <div class="left">
                                                            <p><?php esc_html_e('Send','finbank'); ?></p>
                                                            <span>:</span>
                                                        </div>
                                                        <div class="right">
                                                            <p><?php echo wp_kses($item['price'], true); ?></p>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if($item['price2']){ ?>
                                                    <li>
                                                        <div class="left">
                                                            <p><?php esc_html_e('Receive','finbank'); ?></p>
                                                            <span>:</span>
                                                        </div>
                                                        <div class="right">
                                                            <p><?php echo wp_kses($item['price2'], true); ?></p>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--End Single Money Exchange Value-->
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <!--Tab-->
                            <div class="tab-content-box-item" id="load-redeem-forex-card">
                                <div class="money-exchange-value-tab-content-box-item">
                                    <div class="row">
										<?php foreach ($settings['yearly'] as $keys => $item):?>
                                        <!--Start Single Money Exchange Value-->
                                        <div class="col-xl-2 col-lg-4 col-md-4">
                                            <div class="single-money-exchange-value">
                                                <?php if($item['icon_image2']['id']){ ?>
                                                <div class="flag-box">
                                                    <div class="flag-box-inner">
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php if($item['plan_title2']){ ?><h3><?php echo wp_kses($item['plan_title2'], true); ?></h3><?php } ?>
                                                <ul>
                                                    <?php if($item['price3']){ ?>
                                                    <li>
                                                        <div class="left">
                                                            <p><?php esc_html_e('Send','finbank'); ?></p>
                                                            <span>:</span>
                                                        </div>
                                                        <div class="right">
                                                            <p><?php echo wp_kses($item['price3'], true); ?></p>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if($item['price4']){ ?>
                                                    <li>
                                                        <div class="left">
                                                            <p><?php esc_html_e('Receive','finbank'); ?></p>
                                                            <span>:</span>
                                                        </div>
                                                        <div class="right">
                                                            <p><?php echo wp_kses($item['price4'], true); ?></p>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--End Single Money Exchange Value-->
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--End Tabs Content Box-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Money Exchange Rates Area-->
    
	<?php 
	}

}
