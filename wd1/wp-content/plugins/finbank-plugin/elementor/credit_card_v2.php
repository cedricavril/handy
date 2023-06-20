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
class Credit_Card_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'finbank_credit_card_v2';
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
        return esc_html__( 'Credit Card V2', 'finbank' );
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
            'credit_card_v2',
            [
                'label' => esc_html__( 'Credit Card V2', 'finbank' ),
            ]
        );
		$this->add_control(
			'about_image',
			[
				'label' => __( 'About Image', 'finbank' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'show_rating_box',
			[
				'label'       => __( 'Enable/Disable Rating Box', 'finbank' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finbank' ),
				'label_off' => __( 'Hide', 'finbank' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'rating',
			[
				'label'       => __( 'Choose the Rating', 'finbank' ),
				'type'  => 'select',
				'label_block' => true,
				'condition' => [
					'show_rating_box' => 'yes',
				],
				'options'  => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
				),
			]
		);
		$this->add_control(
			'box_text',
			[
				'label'       => __( 'Box Text', 'finbank' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'condition' => [
					'show_rating_box' => 'yes',
				],
				'placeholder' => __( 'Enter your Box Text', 'finbank' ),
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
			'title2',
			[
				'label'       => __( 'Form Title', 'finbank' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Form Title', 'finbank' ),
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
        $allowed_tags = wp_kses_allowed_html('post');
    ?>
	
    <!--Start Features Style3 Area-->
    <section class="features-style3-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="features-style3-img-box features-style3-img-box--style2">
                        <?php if($settings['about_image']['id']){ ?>
                        <div class="inner-img-bg" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>);"></div>
                        <?php } ?>
                        <?php if($settings['show_rating_box']):?>
                        <div class="overaly-text">
                            <div class="review-box">
                                <ul>                                    
									<?php $rating = $settings['rating'];
                                        if(!empty($rating)){
                                        for ($x = 1; $x <= 5; $x++) {
                                            if($x <= $rating) echo '<li><i class="fa fa-star"></i></li>'; else echo '<li><i class="fa fa-star-half-alt"></i></li>';
                                        }
                                    } ?>
                                </ul>
                            </div>
                            <h3><?php echo wp_kses($settings['box_text'], true);?></h3>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="features-style3-content">
                        <?php if($settings['title'] || $settings['text']) { ?>
                        <div class="sec-title">
                            <?php if($settings['title']) { ?><h2><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                            <?php if($settings['text']) { ?>
                            <div class="sub-title">
                                <p><?php echo wp_kses($settings['text'], true);?></p>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="text-box">
                            <?php $features_list = $settings['features_list'];
                                if(!empty($features_list)){
                                $features_list = explode("\n", ($features_list)); 
                            ?>
                            <ul>
                            <?php foreach($features_list as $features): ?>
                               <li><div class="icon">
                               		<span class="icon-checkbox-mark"></span>
                               </div>
                               <p><?php echo wp_kses($features, true); ?></p></li>
                            <?php endforeach; ?>
                            </ul>
                            <?php } ?>
                            <div class="apply-credit-card">
                                <?php if($settings['title2']) { ?><h3><?php echo wp_kses($settings['title2'], true);?></h3><?php } ?>
                                <?php if($settings['contact_form_url']) { ?>
                                <div id="apply-credit-card">
                                    <?php echo do_shortcode($settings['contact_form_url']);?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Features Style3 Area-->
        
        <?php
    }
}
