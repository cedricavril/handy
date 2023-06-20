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
class Account_Easy_Steps extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_account_easy_steps';
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
        return esc_html__( 'Account Easy Steps', 'finbank' );
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
            'account_easy_steps',
            [
                'label' => esc_html__( 'Account Easy Steps', 'finbank' ),
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
		    'features', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Consult With Team', 'finbank')],
						['block_title' => esc_html__('KYC Verification', 'finbank')],
						['block_title' => esc_html__('Start Your Savings', 'finbank')]
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
						'name' => 'block_text',
						'label' => esc_html__('Text', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'show_bottom_info',
			[
				'label'       => __( 'Enable/Disable Bottom Info', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
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
					'show_bottom_info' => 'yes',
				],
				'placeholder' => __( 'Enter your Text', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Right Title', 'finbank' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_bottom_info' => 'yes',
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => __( 'Button Url', 'finbank' ),
				'type' => Controls_Manager::URL,
				'label_block' => true, 
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'condition' => [
					'show_bottom_info' => 'yes',
				],
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
		
        <!--Start Account Steps Area-->
        <section class="account-steps-area">
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
                <ul class="row account-steps__content">
                    <?php $i=1; foreach($settings['features'] as $key => $item): ?>
                    <!--Start Single Account Steps Colum-->
                    <li class="col-xl-4 single-account-steps-colum text-center">
                        <div class="single-account-steps">
                            <div class="icon">
                                <?php if($item['icons']){ ?>
                                <div class="icon-inner">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                </div>
                                <?php } ?>
                                <div class="counting"><?php echo wp_kses(sprintf('%02d', $i), true); ?></div>
                            </div>
                            <div class="text">
                                <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div>
                        </div>
                    </li>
                    <!--End Single Account Steps Colum-->
                    <?php $i++; endforeach; ?>
                </ul>
				<?php if($settings['show_bottom_info']):?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="account-steps-area__bottom-text">
                            <p><?php echo wp_kses($settings['text2'], true);?> <a href="<?php echo esc_url( $settings[ 'btn_link' ][ 'url' ] );?>"><?php echo wp_kses($settings['btn_title'], true);?></a></p>
                        </div>
                    </div>
                </div>
				<?php endif; ?>
            </div>
        </section>
        <!--End Account Steps Area-->   
             
        <?php
    }
}
