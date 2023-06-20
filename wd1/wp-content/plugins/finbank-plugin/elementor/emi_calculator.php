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
class Emi_Calculator extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'finbank_emi_calculator';
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
		return esc_html__( 'EMI Calculator', 'finbank' );
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
			'emi_calculator',
			[
				'label' => esc_html__( 'EMI Calculator', 'finbank' ),
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
			'image',
			[
				'label' => __( 'BG Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
		   'features_tab', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Home Loan', 'finbank')],
						['btn_title' => esc_html__('Personal Loan', 'finbank')],
						['btn_title' => esc_html__('Vehicle Loan', 'finbank')],
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
						'name' => 'btn_title',
						'label' => esc_html__('Tab Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'loan_title',
						'label' => esc_html__('Loan Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'loan_value',
						'label' => esc_html__('Loan Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'year_title',
						'label' => esc_html__('Year Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'year_value',
						'label' => esc_html__('Enter Years Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'interest_title',
						'label' => esc_html__('Interest Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'interest_value',
						'label' => esc_html__('Enter Interest Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'icons2',
						'label' => esc_html__('Enter The icons', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'emi_title',
						'label' => esc_html__('Monthly EMI Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'emi_interest_value',
						'label' => esc_html__('Monthly EMI Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_title2',
						'label' => esc_html__('Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'External Url', 'finbank' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'interest_amount_title',
						'label' => esc_html__('Interest Amount Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'interest_amount_value',
						'label' => esc_html__('Interest Amount Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'interest_amount_link',
						'label' => __( 'Interest Amount Url', 'finbank' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'total_amount_title',
						'label' => esc_html__('Total Amount Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'total_amount_value',
						'label' => esc_html__('Total Amount Value', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'total_amount_link',
						'label' => __( 'Total Amount Url', 'finbank' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{btn_title}}',
			 ]
        );
		$this->add_control(
			'style_two',
			 [
				'label'   => esc_html__( 'Choose Different Style', 'finbank' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Style One', 'finbank' ),
					'two'  => esc_html__( 'Choose Style Two', 'finbank' ),
				),
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
    <!--Start EMI Calculator Area-->
    <section class="<?php if($settings['style_two'] == 'two') echo 'emi-calculator-style2-area'; else echo 'emi-calculator-area'; ?>">
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
                    <div class="<?php if($settings['style_two'] == 'two') echo 'emi-calculator-tab emi-calculator-tab--style2'; else echo 'emi-calculator-tab'; ?>">

                        <div class="emi-calculator-tab__button">
                            <div class="emi-calculator-tab__button--bg" <?php if($settings['image']['id']) { ?> style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['image']['id'])); ?>);"<?php } ?>></div>
                            <ul class="tabs-button-box">
                                <?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                                <li data-tab="#home-loan<?php echo esc_attr($count); ?>" class="tab-btn-item <?php if($count == 1) echo 'active-btn-item' ?>">
                                    <div class="icon-box">
                                        <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                        <div class="overlay-text">
                                            <p><?php echo wp_kses($item['btn_title'], true); ?></p>
                                        </div>
                                    </div>
                                </li>
                                <?php $count++; endforeach; ?>
                            </ul>
                        </div>

                        <div class="emi-calculator-tab-content-box-outer">
                            <!--Start Tabs Content Box-->
                            <div class="tabs-content-box">
                                <?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                                <!--Tab-->
                                <div class="tab-content-box-item <?php if($count == 1) echo 'tab-content-box-item-active';?>" id="home-loan<?php echo esc_attr($count);?>">
                                    <div class="emi-calculator-tab-content-box-item">

                                        <div class="range-box">
                                            <div class="row">
                                                <div class="col-lg-12 column">
                                                    <div class="price-range-box">
                                                        <div class="inner">
                                                            <h4><?php echo wp_kses($item['loan_title'], true); ?></h4>
                                                            <div class="price-range-slider"></div>
                                                            <div class="range-input">
                                                                <div class="input">
                                                                    <input type="text" class="property-amount" name="field-name" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="right-box">
                                                            <h5><?php echo wp_kses($item['loan_value'], true); ?></h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 column">
                                                    <div class="loan-term-range-box">
                                                        <div class="inner">
                                                            <h4><?php echo wp_kses($item['year_title'], true); ?></h4>
                                                            <div class="loan-term-range-slider"></div>
                                                            <div class="range-input">
                                                                <div class="input">
                                                                    <input type="text" class="loan-term-range" name="field-name" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="right-box">
                                                            <h5><?php echo wp_kses($item['year_value'], true); ?></h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 column">
                                                    <div class="interest-rate-range-box">
                                                        <div class="inner">
                                                            <h4><?php echo wp_kses($item['interest_title'], true); ?></h4>
                                                            <div class="interest-rate-range-slider"></div>
                                                            <div class="range-input">
                                                                <div class="input">
                                                                    <input type="text" class="interest-rate-range" name="field-name" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="right-box">
                                                            <h5><?php echo wp_kses($item['interest_value'], true); ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="emi-calculator-output-box clearfix">
                                            <div class="left-box">
                                                <div class="top">
                                                    <?php if($item['icons2']) { ?>
                                                    <div class="icon">
                                                        <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons2']), true);?>"></span>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="inner-title">
                                                        <h3><?php echo wp_kses($item['emi_title'], true); ?></h3>
                                                        <h2><?php echo wp_kses($item['emi_interest_value'], true); ?></h2>
                                                    </div>
                                                </div>
                                                <?php if($item['btn_title2']) { ?>
                                                <div class="btns-box">
                                                    <a class="btn-one" href="<?php echo esc_url( $item['btn_link']['url'] ); ?>">
                                                        <span class="txt"><?php echo wp_kses( $item['btn_title2'], true ); ?></span>
                                                    </a>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="right-box">
                                                <ul>
                                                    
                                                    <li>
                                                        <div class="inner">
                                                            <div class="icon">
                                                                <span class="icon-right-arrow"></span>
                                                            </div>
                                                            <div class="text">
                                                                <a href="<?php echo esc_url( $item['interest_amount_link']['url'] ); ?>"><?php echo wp_kses( $item['interest_amount_title'], true ); ?></a>
                                                                <p><?php echo wp_kses( $item['interest_amount_value'], true ); ?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                    <li>
                                                        <div class="inner">
                                                            <div class="icon">
                                                                <span class="icon-right-arrow"></span>
                                                            </div>
                                                            <div class="text">
                                                                <a href="<?php echo esc_url( $item['total_amount_link']['url'] ); ?>"><?php echo wp_kses( $item['total_amount_title'], true ); ?></a>
                                                                <p><?php echo wp_kses( $item['total_amount_value'], true ); ?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
								<?php $count++; endforeach; ?>
                            </div>
                            <!--End Tabs Content Box-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End EMI Calculator Area-->
        
 	<?php 
	}
}
