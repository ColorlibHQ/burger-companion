<?php
namespace Burgerelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Burger elementor Food Menu section widget.
 *
 * @since 1.0
 */
class Burger_Food_Menus extends Widget_Base {

	public function get_name() {
		return 'burger-food-menu';
	}

	public function get_title() {
		return __( 'Food Menus', 'burger-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'burger-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Food Menu content ------------------------------
		$this->start_controls_section(
			'food_menu_content',
			[
				'label' => __( 'Food Menu content', 'burger-companion' ),
			]
        );

        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'burger-companion' ),
                'description' => esc_html__( 'Best size is 1920x1430', 'burger-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'burger-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Burger Menu', 'burger-companion' ),
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'burger-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Best Ever Burgers', 'burger-companion' ),
            ]
        );

        $this->add_control(
            'menus_sec_separator',
            [
                'label' => esc_html__( 'Menus Section', 'burger-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
		$this->add_control(
            'menus', [
                'label' => __( 'Create New', 'burger-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => esc_html__( 'Menu Image', 'burger-companion' ),
                        'description' => esc_html__( 'Best size is 166x166', 'burger-companion' ),
                        'type' => Controls_Manager::MEDIA,
                        'label_block' => true,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Menu Title', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Beefy Burgers', 'burger-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Menu Text', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( 'Great way to make your business appear trust and relevant.', 'burger-companion' ),
                    ],
                    [
                        'name' => 'item_price',
                        'label' => __( 'Menu Price', 'burger-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( '$5', 'burger-companion' ),
                    ],
                ],
                'default'   => [
                    [ 
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Beefy Burgers', 'burger-companion' ),
                        'item_text'   => __( 'Great way to make your business appear trust and relevant.', 'burger-companion' ),
                        'item_price'   => __( '$5', 'burger-companion' ),
                    ],
                    [ 
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Burger Boys', 'burger-companion' ),
                        'item_text'   => __( 'Great way to make your business appear trust and relevant.', 'burger-companion' ),
                        'item_price'   => __( '$7', 'burger-companion' ),
                    ],
                    [ 
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Burger Bizz', 'burger-companion' ),
                        'item_text'   => __( 'Great way to make your business appear trust and relevant.', 'burger-companion' ),
                        'item_price'   => __( '$9', 'burger-companion' ),
                    ],
                    [ 
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Crackles Burger', 'burger-companion' ),
                        'item_text'   => __( 'Great way to make your business appear trust and relevant.', 'burger-companion' ),
                        'item_price'   => __( '$15', 'burger-companion' ),
                    ],
                    [ 
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Bull Burgers', 'burger-companion' ),
                        'item_text'   => __( 'Great way to make your business appear trust and relevant.', 'burger-companion' ),
                        'item_price'   => __( '$11', 'burger-companion' ),
                    ],
                    [ 
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Rocket Burgers', 'burger-companion' ),
                        'item_text'   => __( 'Great way to make your business appear trust and relevant.', 'burger-companion' ),
                        'item_price'   => __( '$14', 'burger-companion' ),
                    ],
                    [ 
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Smokin Burger', 'burger-companion' ),
                        'item_text'   => __( 'Great way to make your business appear trust and relevant.', 'burger-companion' ),
                        'item_price'   => __( '$18', 'burger-companion' ),
                    ],
                    [ 
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Delish Burger', 'burger-companion' ),
                        'item_text'   => __( 'Great way to make your business appear trust and relevant.', 'burger-companion' ),
                        'item_price'   => __( '$25', 'burger-companion' ),
                    ],
                ]
            ]
		);

        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'burger-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'More Items', 'burger-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'burger-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
		$this->end_controls_section(); // End features content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_features_section', [
                'label' => __( 'Style Features Section', 'burger-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Section Title Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'burger-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label' => __( 'Title Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .single_feature h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .single_feature p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'section_bg_style_seperator',
            [
                'label' => esc_html__( 'BG Styles', 'burger-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sec_bg_color', [
                'label' => __( 'Bg Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $bg_img  = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $menus  = !empty( $settings['menus'] ) ? $settings['menus'] : '';
    $btn_title = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>
    
    <div class="best_burgers_area" <?php echo burger_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <?php 
                            if ( $sub_title ) { 
                                echo '<span>'.esc_html( $sub_title ).'</span>';
                            }
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $menus ) && count( $menus ) > 0 ) {
                    foreach( $menus as $item ) {
                        $item_img = !empty( $item['item_img']['id'] ) ? wp_get_attachment_image( $item['item_img']['id'], 'burger_menu_img_166x166', '', array('alt' => burger_image_alt( $item['item_img']['url'] ) ) ) : '';
                        $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                        $item_text = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                        $item_price = ( !empty( $item['item_price'] ) ) ? $item['item_price'] : '';
                        ?>
                        <div class="col-xl-6 col-md-6 col-lg-6">
                            <div class="single_delicious d-flex align-items-center">
                                <?php 
                                    if ( $item_img ) { 
                                        echo '<div class="thumb">
                                            '.wp_kses_post( $item_img ).'
                                        </div>';
                                    }

                                    echo '<div class="info">';
                                        if ( $item_title ) { 
                                            echo '<h3>'.esc_html( $item_title ).'</h3>';
                                        }
                                        if ( $item_text ) { 
                                            echo '<p>'.wp_kses_post( $item_text ).'</p>';
                                        }
                                        if ( $item_price ) { 
                                            echo '<span>'.esc_html( $item_price ).'</span>';
                                        }
                                    echo '</div>';
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php 
            if ( $btn_title ) { 
                echo '        
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iteam_links">
                            <a class="boxed-btn5" href="'.esc_url( $btn_url ).'">'.esc_html( $btn_title ).'</a>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>
    <?php
    }
}