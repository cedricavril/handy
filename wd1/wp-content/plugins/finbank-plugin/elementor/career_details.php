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
class Career_Details extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_career_details';
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
        return esc_html__( 'Career Details', 'finbank' );
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
            'career_details',
            [
                'label' => esc_html__( 'Career Details', 'finbank' ),
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
			'show_address_box',
			[
				'label'       => __( 'Enable/Disable Reginal Officer Info', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
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
				'condition' => [
					'show_address_box' => 'yes',
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
				'condition' => [
					'show_address_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Title', 'finbank' ),
			]
		);
		$this->add_control(
			'block_address',
			[
				'label'       => __( 'Address', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_address_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Address', 'finbank' ),
			]
		);
		$this->add_control(
			'block_btn_title',
			[
				'label'       => __( 'Button Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_address_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Button Title', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => __( 'External Url', 'whitehall' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'condition' => [
					'show_address_box' => 'yes',
				],
				'default' => ['url' => '','is_external' => true,'nofollow' => true,],
			]
		);
		$this->add_control(
			'block_btn_title2',
			[
				'label'       => __( 'Button Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_address_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Button Title', 'finbank' ),
			]
		);
		$this->add_control(
			'btn_link2',
			[
				'label' => __( 'External Url', 'whitehall' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'condition' => [
					'show_address_box' => 'yes',
				],
				'default' => ['url' => '','is_external' => true,'nofollow' => true,],
			]
		);
		$this->add_control(
			'block_title2',
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
			'block_title3',
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
			'features_list',
			[
				'label'       => __( 'Feature List', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feature List', 'finbank' ),
			]
		);
		$this->add_control(
			'block_title4',
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
			'features_list2',
			[
				'label'       => __( 'Feature List', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feature List', 'finbank' ),
			]
		);
		$this->add_control(
			'block_title5',
			[
				'label'       => __( 'Social Title', 'finbank' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Social Title', 'finbank' ),
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
						'name' => 'block_info',
						'label' => esc_html__('Icon Label', 'finbank'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'social_link',
						'label' => __( 'Social Link', 'finbank' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'style_two',
						'label'   => esc_html__( 'Choose Different Style', 'finbank' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'one',
						'options' => array(
							'one' => esc_html__( 'Choose Style Facebook', 'finbank' ),
							'two' => esc_html__( 'Choose Style Twitter', 'finbank' ),
							'three'  => esc_html__( 'Choose Style Google', 'finbank' ),
							'four'  => esc_html__( 'Choose Style Linkedin', 'finbank' ),
						),
					],
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
	
    <!--Start Career Details Area-->
    <section class="career-details-area">
        <div class="container">
            <div class="row">

                <div class="<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) echo 'col-xl-8 col-md-12 col-sm-12 '; else echo 'col-xl-12 col-lg-12'; ?>">
                    <div class="career-details-content">
                        <?php if($settings['show_address_box']):?>
                        <div class="job-title-box">
                            <div class="left">
                                <h4><?php echo wp_kses($settings['block_sub_title'], true);?></h4>
                                <h3><?php echo wp_kses($settings['block_title'], true);?></h3>
                                <?php if($settings['block_address']) { ?><p><span class="icon-pin"></span> <?php echo wp_kses($settings['block_address'], true);?></p><?php } ?>
                            </div>
                            <div class="right">
                                <?php if($settings['block_btn_title']) { ?><a class="job-style" href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"><?php echo wp_kses($settings['block_btn_title'], true);?></a><?php } ?>
                                <?php if($settings['block_btn_title2']) { ?><a class="job-style style2" href="<?php echo esc_url( $settings['btn_link2']['url'] ); ?>"><?php echo wp_kses($settings['block_btn_title2'], true);?></a><?php } ?>
                            </div>
                        </div>
						<?php endif; ?>
                        <?php if($settings['block_title2'] || $settings['block_text']) { ?>
                        <div class="job-description-content">
                            <?php if($settings['block_title2']) { ?><h2><?php echo wp_kses($settings['block_title2'], true);?></h2><?php } ?>
                            <?php echo wp_kses($settings['block_text'], true);?>
                        </div>
						<?php } ?>
                        <?php if($settings['block_title3'] || $settings['features_list']) { ?>
                        <div class="responsibilities-content">
                            <?php if($settings['block_title3']) { ?><h2><?php echo wp_kses($settings['block_title3'], true);?></h2><?php } ?>
                            <?php $features_list = $settings['features_list'];
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
						<?php } ?>
                        <?php if($settings['block_title4'] || $settings['features_list2']) { ?>
                        <div class="requirements-content-box">
                            <?php if($settings['block_title4']) { ?><h2><?php echo wp_kses($settings['block_title4'], true);?></h2><?php } ?>
                            <?php $features_list = $settings['features_list2'];
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
						<?php } ?>
                        <div class="job-social-share-box">
                            <?php if($settings['block_title5']) { ?><h2><?php echo wp_kses($settings['block_title5'], true);?></h2><?php } ?>
                            <ul>
                                <?php foreach($settings['social_info'] as $key => $item): ?>
                                <li><a class="<?php if($item['style_two'] =='four') echo 'linked'; elseif($item['style_two'] =='three') echo 'googlep'; elseif($item['style_two'] =='two') echo 'tw'; else echo ''; ?>" href="<?php echo esc_url($item['social_link']['url']); ?>"><i class="fab <?php echo wp_kses(str_replace( "fa ",  "",  $item['social_iconss']), true); ?>"></i><?php echo wp_kses($item['block_info'], true);?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>
				<?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                <div class="col-xl-4">
                    <div class="resume-box">
                        <?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                    </div>
                </div>
				<?php endif; ?>
            </div>
        </div>
    </section>
    <!--End Career Details Area-->
      
        <?php
    }
}
