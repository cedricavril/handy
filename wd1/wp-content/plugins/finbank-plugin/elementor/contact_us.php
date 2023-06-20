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
class Contact_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_contact_us';
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
        return esc_html__( 'Contact Us', 'finbank' );
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
            'contact_us',
            [
                'label' => esc_html__( 'Contact Us', 'finbank' ),
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
					'one' => esc_html__( 'Choose Style Get In Touch', 'finbank' ),
					'two' => esc_html__( 'Choose Style Home Onepage One', 'finbank' ),
					'three' => esc_html__( 'Choose Style Home Onepage Two', 'finbank' ),
					'four' => esc_html__( 'Choose Style Home Onepage Three', 'finbank' ),
				),
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
             'info', 
		 	[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Corporate Office', 'finbank')],
						['block_title' => esc_html__('Office Hours', 'finbank')],
						['block_title' => esc_html__('Front Desk', 'finbank')]
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
						'name' => 'block_info',
						'label' => esc_html__('Description', 'finbank'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_holiday',
						'label' => esc_html__('Holiday Text', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_phone',
						'label' => esc_html__('Phone Number', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_email',
						'label' => esc_html__('Email Address', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'finbank' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style Address', 'finbank' ),
							'two' => esc_html__( 'Choose Style Working Hours', 'finbank' ),
							'three'  => esc_html__( 'Choose Style Phone & Email', 'finbank' ),
						),
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Social Title', 'finbank' ),
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
				'label_block' => true, 
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
            'social_info', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['item#1' => esc_html__('social info', 'finbank')],
						['item#2' => esc_html__('social info', 'finbank')],
						['item#3' => esc_html__('social info', 'finbank')],
						['item#4' => esc_html__('social info', 'finbank')],
					],
				'fields' => 
				[
					[
						'name' => 'social_iconss',
						'label' => esc_html__('Enter The icons', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],	
					[
						'name' => 'social_link',
						'label' => __( 'Social Link', 'finbank' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
			 ]
        );
		$this->add_control(
			'contact_form_url',
			[
				'label'       => __( 'Contact Form Url', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form Url', 'finbank' ),
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
	
    <!--Start Main Contact Form Area-->
    <section class="main-contact-form-area <?php if($settings['style_two'] == 'four') echo 'pdb100'; elseif($settings['style_two'] == 'three') echo 'pdb100'; elseif($settings['style_two'] == 'two') echo 'pdb100'; else echo ''; ?>" <?php if($settings['style_two'] == 'four') echo 'style="background-color: #F0F5F6;"'; else echo ''; ?> id="getintouch">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="contact-info-box-style1">
                        <div class="box1"></div>
                        <?php if($settings['title'] || $settings['text']) { ?>
                        <div class="title">
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            <?php if($settings['text']) { ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                        </div>
						<?php } ?>
                        <ul class="contact-info-1">
                            <?php foreach($settings['info'] as $key => $item): ?>
                            <li>
                                <?php if($item['icons']){ ?>
                                <div class="icon">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                </div>
                                <?php } ?>
                                <div class="text">
                                    <p><?php echo wp_kses($item['block_title'], true);?></p>
                                    <?php if($item['style_two'] =='three') : ?>
                                    <h3><a href="tel:<?php echo esc_attr($item['block_phone']); ?>"><?php echo wp_kses($item['block_phone'], true);?></a></h3>
                                    <h3><a href="mailto:<?php echo esc_attr($item['block_email']); ?>"><?php echo wp_kses($item['block_email'], true);?></a></h3>
                                    <?php elseif($item['style_two'] =='two') :?>
                                    <h3><?php echo wp_kses($item['block_info'], true);?></h3>
                                    <span><?php echo wp_kses($item['block_holiday'], true);?></span>
                                    <?php else : ?>
                                    <h3><?php echo wp_kses($item['block_info'], true);?></h3>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="bottom-box">
                            <?php if($settings['title2']){ ?>
                            <div class="btn-box">
                                <a href="<?php echo esc_url( $settings[ 'btn_link' ][ 'url' ] );?>"><i class="fas fa-arrow-down"></i> <?php echo wp_kses($settings['title2'], true);?></a>
                            </div>
                            <?php } ?>
                            <div class="footer-social-link-style1">
                                <ul class="clearfix">
                                    <?php foreach($settings['social_info'] as $key => $item): ?>
                                    <li>
                                        <a href="<?php echo esc_url($item['social_link']['url']); ?>">
                                            <i class="fab <?php echo wp_kses(str_replace( "fa ",  "",  $item['social_iconss']), true); ?>"></i>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

				<?php if($settings['contact_form_url']) { ?>
                <div class="col-xl-6">
                    <div class="contact-form" <?php if($settings['style_two'] == 'four') echo 'style="background-color: #ffffff;"'; elseif($settings['style_two'] == 'three') echo 'style="background-color: #f5f8f7;"'; elseif($settings['style_two'] == 'two') echo ''; else echo ''; ?>>
                        <div id="contact-form" class="default-form2">
							<?php echo do_shortcode($settings['contact_form_url']);?>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
        </div>
    </section>
    <!--End Main Contact Form Area-->
                         
        <?php
    }
}


