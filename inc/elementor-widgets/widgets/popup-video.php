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
 * Burger popup video section widget.
 *
 * @since 1.0
 */
class Burger_Popup_Video_Section extends Widget_Base {

	public function get_name() {
		return 'burger-popup-video-section';
	}

	public function get_title() {
		return __( 'Popup Video', 'burger-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'burger-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Popup Video section contents  ------------------------------
        // Popup video section
        $this->start_controls_section(
			'popup_video_section_content',
			[
				'label' => __( 'Popup video Contents', 'burger-companion' ),
			]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'burger-companion' ),
                'description' => esc_html__( 'Best size is 1920x700', 'burger-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Sec Title', 'burger-companion' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Burger <br> Bachelor', 'burger-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => __( 'Sub Title', 'burger-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'How we make delicious Burger', 'burger-companion' )
            ]
        );
        $this->add_control(
            'video_url',
            [
                'label'         => __( 'Popup Video URL', 'burger-companion' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'default'       => [
                    'url'       => 'https://www.youtube.com/watch?v=mwExFzKorws',
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
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $video_url  = !empty( $settings['video_url']['url'] ) ? $settings['video_url']['url'] : '';
    ?>

    <!-- video_area_start -->
    <div class="video_area overlay" <?php echo burger_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="video_area_inner text-center">
            <?php
                if ( $sec_title ) {
                    echo '<h3>'.wp_kses_post( nl2br($sec_title) ).'</h3>';
                }
                if ( $sub_title ) {
                    echo '<span>'.esc_html( $sub_title ).'</span>';
                }
                if ( $video_url ) {
                    echo '
                    <div class="video_payer">
                        <a href="'.esc_url( $video_url ).'" class="video_btn popup-video">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                    ';
                }
            ?>
        </div>
    </div>
    <!-- video_area_end -->
    <?php

    }
}
