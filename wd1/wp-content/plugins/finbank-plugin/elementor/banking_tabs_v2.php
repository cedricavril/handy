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
class Banking_Tabs_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'finbank_banking_tabs_v2';
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
		return esc_html__( 'Banking Tabs V2', 'finbank' );
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
			'banking_tabs_v2',
			[
				'label' => esc_html__( 'Banking Tabs V2', 'finbank' ),
			]
		);
		$this->add_control(
		   'features_tab', 
		   [
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['btn_title' => esc_html__('Trading & Demat a/c', 'finbank')],
						['btn_title' => esc_html__('Tax Savings a/c', 'finbank')],
						['btn_title' => esc_html__('Gold Savings a/c', 'finbank')],
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
						'name' => 'btn_sub_title',
						'label' => esc_html__('Tab Sub Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Tab Button Title', 'finbank'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'finbank')
					],
					[
						'name' => 'text_limit',
						'label'   => esc_html__( 'Number of Text', 'finbank' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_number',
						'label'   => esc_html__( 'Number of post', 'finbank' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 100,
						'step'    => 1,
					],
					[
						'name' => 'query_orderby',
						'label'   => esc_html__( 'Order By', 'finbank' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'date',
						'options' => array(
							'date'       => esc_html__( 'Date', 'finbank' ),
							'title'      => esc_html__( 'Title', 'finbank' ),
							'menu_order' => esc_html__( 'Menu Order', 'finbank' ),
							'rand'       => esc_html__( 'Random', 'finbank' ),
						),
					],
					[
						'name' => 'query_order',
						'label'   => esc_html__( 'Order', 'finbank' ),
						'label_block' => true,
						'type'    => Controls_Manager::SELECT,
						'default' => 'DESC',
						'options' => array(
							'DESC' => esc_html__( 'DESC', 'finbank' ),
							'ASC'  => esc_html__( 'ASC', 'finbank' ),
						),
					],
					[
					  'name' => 'query_category',
					  'type' => Controls_Manager::SELECT,
					  'label' => esc_html__('Category', 'finbank'),
					  'label_block' => true,
					  'options' => get_service_categories()
					],
				],
				'title_field' => '{{btn_title}}',
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
    
    <!--Start Banking Tab Area-->
    <section class="banking-tab-area" id="services">
        <div class="auto-container">
            <div class="banking-tab">

                <!--Start Tabs Content Box-->
                <div class="tabs-content-box">
					<?php $count = 1; foreach($settings['features_tab'] as $keys => $item): 
						$paged = finbank_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
				
						$this->add_render_attribute( 'wrapper', 'class', 'templatepath-finbank' );
						$args = array(
							'post_type'      => 'service',
							'posts_per_page' => finbank_set( $item, 'query_number' ),
							'orderby'        => finbank_set( $item, 'query_orderby' ),
							'order'          => finbank_set( $item, 'query_order' ),
							'text_limit'     => finbank_set( $item, 'text_limit' ),
							'paged'         => $paged
						);
						
						if( finbank_set( $item, 'query_category' ) ) $args['service_cat'] = finbank_set( $item, 'query_category' );
						$query = new \WP_Query( $args );
						if ( $query->have_posts()):	
					?>
                    <!--Tab-->
                    <div class="tab-content-box-item <?php if($count == 1) echo 'tab-content-box-item-active';?>" id="<?php echo esc_attr($count);?>">
                        <?php 
							global $post;
							while ( $query->have_posts() ) : $query->the_post();
							$post_thumbnail_id = get_post_thumbnail_id($post->ID);
							$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
						?>
                        <div class="banking-tab-content-item">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="banking-tab-img-box">
                                        <div class="banking-tab-img-box__bg"
                                            style="background-image: url('<?php echo esc_url($post_thumbnail_url);?>');">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="banking-tab-text-box">
                                        <div class="inner-title">
                                            <h3><?php echo (get_post_meta( get_the_id(), 'description', true ));?></h3>
                                            <h2><?php the_title(); ?></h2>
                                        </div>
                                        <div class="banking-tab-text-box__inner">
                                            <div class="text">
                                                <p><?php echo wp_kses(finbank_trim(get_the_content(), $item['text_limit']), true); ?></p>
                                            </div>
                                            <?php 
												$features_list = get_post_meta( get_the_id(), 'features_list2', true);
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
					<?php endif;?>
                    <?php $count++; endforeach; ?>
                </div>
                <!--End Tabs Content Box-->
                <!--Start Banking Tab Button-->
                <div class="banking-tab__button">
                    <ul class="tabs-button-box clearfix">
						<?php $count = 1; foreach($settings['features_tab'] as $key => $item): ?>
                        <li data-tab="#<?php echo esc_attr($count); ?>" class="tab-btn-item <?php if($count == 1) echo 'active-btn-item' ?>">
                            <div class="inner">
                                <?php if($item['icons']){ ?>
                                <div class="icon">
                                    <span class="<?php echo wp_kses(str_replace( "icon ",  "", $item['icons']), true);?>"></span>
                                </div>
                                <?php } ?>
                                <div class="title">
                                    <h4><?php echo wp_kses($item['btn_sub_title'], true); ?></h4>
                                    <h3><?php echo wp_kses($item['btn_title'], true); ?></h3>
                                </div>
                            </div>
                        </li>
						<?php $count++; endforeach; ?>
                    </ul>
                </div>
                <!--End Banking Tab Button-->
            </div>
        </div>
    </section>
    <!--End Banking Tab Area-->
        
		<?php 
	}

}
