<?php
namespace Burgerelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Burger elementor hero section widget.
 *
 * @since 1.0
 */
class Burger_Hero extends Widget_Base {

	public function get_name() {
		return 'burger-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'burger-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'burger-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero section content', 'burger-companion' ),
			]
        );
		$this->add_control(
            'sliders', [
                'label' => __( 'Create New', 'burger-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'bg_img',
                        'label' => esc_html__( 'BG Image', 'burger-companion' ),
                        'description' => esc_html__( 'Best size is 1920x900', 'burger-companion' ),
                        'type' => Controls_Manager::MEDIA,
                        'label_block' => true,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'promo_title',
                        'label' => __( 'Promo Title', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Big Deal', 'burger-companion' ),
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Big Title', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Burger <br> Bachelor',
                    ],
                    [
                        'name' => 'sub_title',
                        'label' => __( 'Sub Title', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Maxican', 'burger-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'bg_img'        => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'promo_title'   => __( 'Big Deal', 'burger-companion' ),
                        'item_title'    => 'Burger <br> Bachelor',
                        'sub_title'     => __( 'Maxican', 'burger-companion' ),
                    ],
                    [
                        'bg_img'        => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'promo_title'   => __( 'Big Deal', 'burger-companion' ),
                        'item_title'    => 'Burger <br> Bachelor',
                        'sub_title'     => __( 'Maxican', 'burger-companion' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'burger-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'burger-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_col', [
				'label' => __( 'Title Color', 'burger-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'after_title_col', [
				'label' => __( 'After Title Color', 'burger-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button BG Color', 'burger-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn3' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_col', [
				'label' => __( 'Button Hover Color', 'burger-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn3:hover' => 'color: {{VALUE}} !important; border-color: {{VALUE}}; background: transparent',
				],
			]
		);

        $this->add_control(
            'bg_overlay_col_separator',
            [
                'label'     => __( 'Overlay Styles', 'burger-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bg_overlay_col',
                'label' => __( 'BG Overlay Color', 'burger-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .slider_area .single_slider.overlay::before',
            ]
        );
		$this->end_controls_section();
	}
    
	protected function render() {
    // call load widget script
    $this->load_widget_script(); 
    $settings  = $this->get_settings();
    $sliders = !empty( $settings['sliders'] ) ? $settings['sliders'] : '';
    ?>

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <?php
            if( is_array( $sliders ) && count( $sliders ) > 0 ){
                foreach ( $sliders as $item ) {
                    $bg_img = !empty( $item['bg_img']['url'] ) ? $item['bg_img']['url'] : '';
                    $promo_title = !empty( $item['promo_title'] ) ? $item['promo_title'] : '';
                    $item_title = !empty( $item['item_title'] ) ? $item['item_title'] : '';
                    $sub_title = !empty( $item['sub_title'] ) ? $item['sub_title'] : '';
                    ?>
                    <div class="single_slider d-flex align-items-center overlay" <?php echo burger_inline_bg_img( esc_url( $bg_img ) ); ?>>
                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-xl-9 col-md-9 col-md-12">
                                    <div class="slider_text text-center">
                                        <?php
                                            if ( $promo_title ) {
                                                echo '
                                                <div class="deal_text">
                                                    <span>'.esc_html( $promo_title ).'</span>
                                                </div>
                                                ';
                                            }
                                            if ( $item_title ) {
                                                echo '<h3>'.wp_kses_post( nl2br($item_title) ).'</h3>';
                                            }
                                            if ( $sub_title ) {
                                                echo '<h4>'.esc_html( $sub_title ).'</h4>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php
    } 
    
    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // slider_active
            $('.slider_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                767:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                992:{
                    items:1,
                    nav:false
                },
                1200:{
                    items:1,
                    nav:false
                },
                1500:{
                    items:1
                }
            }
            });          
        })(jQuery);
        </script>
        <?php 
        }
    }	
}