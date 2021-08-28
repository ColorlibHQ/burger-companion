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
 * Burger about section widget.
 *
 * @since 1.0
 */
class Burger_About_Section extends Widget_Base {

	public function get_name() {
		return 'burger-about-section';
	}

	public function get_title() {
		return __( 'About Section', 'burger-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'burger-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  about section contents  ------------------------------
        // Left section
        $this->start_controls_section(
			'about_left_section_content',
			[
				'label' => __( 'Image Section Contents', 'burger-companion' ),
			]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'burger-companion' ),
                'description' => esc_html__( 'Best size is 1920x1090', 'burger-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'image_1',
            [
                'label'         => __( 'Image 1', 'burger-companion' ),
                'description' => esc_html__( 'Best size is 558x730', 'burger-companion' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'image_2',
            [
                'label'         => __( 'Image 2', 'burger-companion' ),
                'description' => esc_html__( 'Best size is 324x500', 'burger-companion' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->end_controls_section(); // End Hero content

        // Right section
		$this->start_controls_section(
			'about_right_section_content',
			[
				'label' => __( 'About Right Contents', 'burger-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => __( 'Sub Title', 'burger-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'About Us', 'burger-companion' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'burger-companion' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => 'Best Burger <br> in your City'
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label'         => __( 'Section Text', 'burger-companion' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate'
            ]
        );
        $this->add_control(
            'sig_img',
            [
                'label'         => __( 'Signature Image', 'burger-companion' ),
                'description' => esc_html__( 'Best size is 136x95', 'burger-companion' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
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
            'style_team_member', [
                'label' => __( 'Style Member Section', 'burger-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'burger-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings();
    $bg_img  = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $image_1  = !empty( $settings['image_1']['id'] ) ? wp_get_attachment_image( $settings['image_1']['id'], 'burger_about_img_558x730', '', array('alt' => burger_image_alt( $settings['image_1']['url'] ) ) ) : '';
    $image_2  = !empty( $settings['image_2']['id'] ) ? wp_get_attachment_image( $settings['image_2']['id'], 'burger_about_img_324x500', '', array('alt' => burger_image_alt( $settings['image_2']['url'] ) ) ) : '';
    $sig_img  = !empty( $settings['sig_img']['id'] ) ? wp_get_attachment_image( $settings['sig_img']['id'], 'burger_about_sig_img_136x95', '', array('alt' => burger_image_alt( $settings['sig_img']['url'] ) ) ) : '';
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sec_text  = !empty( $settings['sec_text'] ) ? $settings['sec_text'] : '';
    ?>
    <!-- about_area_start -->
    <div class="about_area" <?php echo burger_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="about_thumb2">
                        <?php
                            if ( $image_1 ) {
                                echo '
                                <div class="img_1">
                                    '.wp_kses_post( $image_1 ).'
                                </div>
                                ';
                            }
                            if ( $image_2 ) {
                                echo '
                                <div class="img_2">
                                    '.wp_kses_post( $image_2 ).'
                                </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 offset-lg-1 col-md-6">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <?php
                                if ( $sub_title ) {
                                    echo '<span>'.wp_kses_post( $sub_title ).'</span>';
                                }
                                if ( $sec_title ) {
                                    echo '<h3>'.wp_kses_post( nl2br($sec_title) ).'</h3>';
                                }
                            ?>
                        </div>
                        <?php
                            if ( $sec_text ) {
                                echo '<p>'.wp_kses_post( nl2br($sec_text) ).'</p>';
                            }
                            if ( $sig_img ) {
                                echo '
                                <div class="img_thumb">
                                    '.wp_kses_post( $sig_img ).'
                                </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->
    <?php

    }
}
