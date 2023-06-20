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
class Careers extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_careers';
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
        return esc_html__( 'Careers', 'finbank' );
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
            'careers',
            [
                'label' => esc_html__( 'Careers', 'finbank' ),
            ]
        );
		$this->add_control(
			'show_about_box',
			[
				'label'       => __( 'Enable/Disable About Us Box', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'about_image',
			[
				'label' => __( 'About Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'show_about_box' => 'yes',
				],
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'pattern_image',
			[
				'label' => __( 'Pattern Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'show_about_box' => 'yes',
				],
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
				'condition' => [
					'show_about_box' => 'yes',
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
				'condition' => [
					'show_about_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Text', 'finbank' ),
			]
		);
		$this->add_control(
			'features_list',
			[
				'label'       => __( 'Feature List', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_about_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Feature List', 'finbank' ),
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
				'condition' => [
					'show_about_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Button Title', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				  'label' => __( 'Button Url', 'finbank' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'condition' => [
					'show_about_box' => 'yes',
				],
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
			 ]
		);
		$this->add_control(
			'email',
			[
				'label'       => __( 'Email Address', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_about_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Email Address', 'finbank' ),
			]
		);
		$this->add_control(
			'show_table_info',
			[
				'label'       => __( 'Enable/Disable Table Info', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
		    'features', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_location' => esc_html__('Los Angeles', 'finbank')],
						['block_location' => esc_html__('Los Angeles', 'finbank')],
						['block_location' => esc_html__('California', 'finbank')],
						['block_location' => esc_html__('Newyork', 'finbank')],
						['block_location' => esc_html__('San Fransisco', 'finbank')]
					],
				'fields' => 
				[
					[
						'name' => 'block_dpt',
						'label' => esc_html__('Department', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_job',
						'label' => esc_html__('Job Description', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_location',
						'label' => esc_html__('Location', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'block_date',
						'label' => esc_html__('Date', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_title2',
						'label' => esc_html__('Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_link2',
						'label' => __( 'External Url', 'finbank' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_location}}',
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
			'icon_image',
			[
				'label' => __( 'Icon Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'show_subscribe_box' => 'yes',
				],
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'form_title',
			[
				'label'       => __( 'Form Title', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_subscribe_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Form Title', 'finbank' ),
			]
		);
		$this->add_control(
			'mailchimp_form_url',
			[
				'label'       => __( 'Mailchimp Form Url', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_subscribe_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Mailchimp Form Url', 'finbank' ),
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
	
    <!--Start Intro Style2 Area-->
    <section class="intro-style2-area">
        <div class="container">
			<?php if($settings['show_about_box']):?>
            <div class="row">
                <div class="col-xl-6">
                    <div class="intro-style2-img-box">
                        <div class="inner">
                            <?php if($settings['about_image']['id']){ ?>
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                            <?php } ?>
							<?php if($settings['pattern_image']['id']){ ?>
                            <div class="shape-1">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['pattern_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="intro-style2-content-box">
                        <?php if($settings['title']) { ?>
                        <div class="sec-title">
                            <h2><?php echo wp_kses($settings['title'], true);?></h2>
                        </div>
                        <?php } ?>
                        <?php if($settings['text']) { ?>
                        <div class="text">
                            <?php echo wp_kses($settings['text'], true);?>
                        </div>
						<?php } ?>
                        <?php $features_list = $settings['features_list'];
							if(!empty($features_list)){
							$features_list = explode("\n", ($features_list)); 
						?>
						<ul>
						<?php foreach($features_list as $features): ?>
						   <li><div class="icon-box">
								<span class="icon-checkbox-mark"></span>
						   </div>
						   <p><?php echo wp_kses($features, true); ?></p></li>
						<?php endforeach; ?>
						</ul>
						<?php } ?>
                        <?php if($settings['btn_title'] || $settings['email']) { ?>
                        <div class="send-resume-box">
                            <div class="icon">
                                <span class="icon-cv"></span>
                            </div>
                            <div class="title">
                                <?php if($settings['btn_title']) { ?>
                                <h4><a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"><?php echo wp_kses( $settings['btn_title'], true ); ?></a></h4>
                                <?php } ?>
                                <?php if($settings['email']) { ?>
                                <h3><a href="mailto:<?php echo esc_attr( $settings['email']); ?>"><?php echo wp_kses( $settings['email'], true ); ?></a></h3>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
			<?php endif; ?>
			<?php if($settings['show_table_info']):?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="job-list-table-box">

                        <div class="table-outer">
                            <table class="job-list-table">

                                <thead class="header">
                                    <tr>
                                        <th><?php esc_html_e('Department', 'finbank'); ?></th>
                                        <th><?php esc_html_e('Job Role', 'finbank'); ?></th>
                                        <th><?php esc_html_e('Location', 'finbank'); ?></th>
                                        <th><?php esc_html_e('Last Date', 'finbank'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
									<?php foreach($settings['features'] as $key => $item): ?>
                                    <tr>
                                        <td class="department">
                                            <h3><?php echo wp_kses($item['block_dpt'], true);?></h3>
                                        </td>
                                        <td class="job-role">
                                            <h3><?php echo wp_kses($item['block_job'], true);?></h3>
                                        </td>
                                        <td class="location">
                                            <p><?php echo wp_kses($item['block_location'], true);?></p>
                                        </td>
                                        <td class="last-date">
                                            <p><?php echo wp_kses($item['block_date'], true);?></p>
                                        </td>
                                        <?php if($item['btn_title2']) { ?>
                                        <td>
                                            <div class="btn-box">
                                                <a class="btn-one" href="<?php echo esc_url( $item['btn_link2']['url'] ); ?>">
                                                    <span class="txt"><?php echo wp_kses( $item['btn_title2'], true ); ?></span>
                                                </a>
                                            </div>
                                        </td>
                                        <?php } ?>
                                    </tr>
									<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
			<?php endif; ?>
			<?php if($settings['show_subscribe_box']):?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="subscribe-box-style1 subscribe-box-style1--style2">
                        <?php if($settings['icon_image']['id']){ ?>
                        <div class="icon">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                        </div>
                        <?php } ?>
                        <?php if($settings['form_title']){ ?>
                        <div class="inner-title">
                            <h3><?php echo wp_kses($settings['form_title'], true);?></h3>
                        </div>
                        <?php } ?>
                        <?php if($settings['mailchimp_form_url']) { ?>
                        <div class="subscribe-form-style1">
                            <?php echo do_shortcode($settings['mailchimp_form_url']);?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
			<?php endif; ?>
        </div>
    </section>
    <!--End Intro Style2 Area-->
        
        <?php
    }
}
