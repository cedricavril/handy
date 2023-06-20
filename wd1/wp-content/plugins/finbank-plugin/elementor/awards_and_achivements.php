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
class awards_and_achivements extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_awards_and_achivements';
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
        return esc_html__( 'Awards And Achivements', 'finbank' );
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
            'awards_and_achivements',
            [
                'label' => esc_html__( 'Awards And Achivements', 'finbank' ),
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
					'one' => esc_html__( 'Choose Style Home Three', 'finbank' ),
					'two' => esc_html__( 'Choose Style About Us', 'finbank' ),
				),
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
						['block_title' => esc_html__('Bank of the Year<br> Europe', 'finbank')],
						['block_title' => esc_html__('Best Commercial<br> Bank Award', 'finbank')]
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
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		$this->add_control(
			'show_pattern_images',
			[
				'label'       => __( 'Enable/Disable Pattern Images', 'finbank' ),
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
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
		    'features2', 
		    [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title2' => esc_html__('Bank of the Year<br> Europe', 'finbank')],
						['block_title2' => esc_html__('Best Commercial<br> Bank Award', 'finbank')]
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
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'features_list2',
						'label' => esc_html__('Feature List', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'finbank')
					],
				],
				'title_field' => '{{block_title2}}',
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
	
    <!--Start Awards Achivements Area-->
    <section class="awards-achivements-area" <?php if($settings['style_two'] == 'two') echo 'style="background-color: #f7f1eb;"'; else echo ''; ?>>
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
                    <div class="awards-achivements-left-box">
                        <?php foreach($settings['features'] as $key => $item): ?>
                        <!--Start single awards achivements box -->
                        <div class="single-awards-achivements-box">
                            <div class="top">
                                <?php if($item['icon_image']['id']){ ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                </div>
                                <?php } ?>
                                <div class="inner-title">
                                    <h3><?php echo wp_kses($item['block_title'], true);?></h3>
                                </div>
                            </div>
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
                        </div>
                        <!--End single awards achivements box -->
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="awards-img-box">
                        <?php if($settings['show_pattern_images']):?>
                        <div class="round-box"></div>
                        <div class="shape1">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/resources/trophy-shape-1.png" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                        </div>
                        <div class="shape2">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/resources/trophy-shape-2.png" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                        </div>
                        <?php endif; ?>
                        <?php if($settings['bg_image']['id']) { ?>
                        <div class="inner">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="awards-achivements-right-box">
                        <?php foreach($settings['features2'] as $key => $item): ?>
                        <!--Start single awards achivements box -->
                        <div class="single-awards-achivements-box">
                            <div class="top">
                                <?php if($item['icon_image2']['id']){ ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'finbank'); ?>">
                                </div>
                                <?php } ?>
                                <div class="inner-title">
                                    <h3><?php echo wp_kses($item['block_title2'], true);?></h3>
                                </div>
                            </div>
                            <?php $features_list = $item['features_list2'];
								if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
							<ul>
								<?php foreach($features_list as $features): ?>
								   <li><?php echo wp_kses($features, true); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php } ?>
                        </div>
                        <!--End single awards achivements box -->
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Awards Achivements Area-->
             
        <?php
    }
}
