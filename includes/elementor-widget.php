<?php
if (!class_exists('\Elementor\Widget_Base')) {
    return;
}

class SPDDG_Elementor_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'spddg_pre_directions';
    }

    public function get_title() {
        return 'Pre Directions DDG';
    }

    public function get_icon() {
        return 'eicon-countdown';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function register_controls() {
        // ==================== CONTENT TAB ====================
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content Settings', 'shortcode-pre-directions-ddg'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'countdown_seconds',
            [
                'label' => __('Countdown Seconds', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'default' => 5,
            ]
        );

        $this->add_control(
            'redirect_url',
            [
                'label' => __('Redirect URL', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'shortcode-pre-directions-ddg'),
                'show_external' => false,
            ]
        );

        $this->add_control(
            'custom_message',
            [
                'label' => __('Custom Message', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Redirecting in {seconds} seconds...', 'shortcode-pre-directions-ddg'),
                'placeholder' => __('Redirecting in {seconds} seconds...', 'shortcode-pre-directions-ddg'),
                'description' => __('Use {seconds} to display countdown', 'shortcode-pre-directions-ddg'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Click to redirect now', 'shortcode-pre-directions-ddg'),
            ]
        );

        $this->end_controls_section();

        // ==================== STYLE TAB ====================
        // Message Style
        $this->start_controls_section(
            'message_style',
            [
                'label' => __('Message Style', 'shortcode-pre-directions-ddg'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'message_color',
            [
                'label' => __('Text Color', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .spddg-message' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'message_typography',
                'selector' => '{{WRAPPER}} .spddg-message',
            ]
        );

        $this->add_responsive_control(
            'message_align',
            [
                'label' => __('Alignment', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'shortcode-pre-directions-ddg'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'shortcode-pre-directions-ddg'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'shortcode-pre-directions-ddg'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .spddg-message' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'message_margin',
            [
                'label' => __('Margin', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .spddg-message' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Button Style
        $this->start_controls_section(
            'button_style',
            [
                'label' => __('Button Style', 'shortcode-pre-directions-ddg'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .spddg-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .spddg-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .spddg-button',
            ]
        );

        $this->add_control(
            'button_align',
            [
                'label' => __('Alignment', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'shortcode-pre-directions-ddg'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'shortcode-pre-directions-ddg'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'shortcode-pre-directions-ddg'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .spddg-button-container' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .spddg-button',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .spddg-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .spddg-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __('Margin', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .spddg-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .spddg-button',
            ]
        );

        $this->end_controls_section();

        // Container Style
        $this->start_controls_section(
            'container_style',
            [
                'label' => __('Container Style', 'shortcode-pre-directions-ddg'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'container_bg_color',
            [
                'label' => __('Background Color', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .spddg-container' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'selector' => '{{WRAPPER}} .spddg-container',
            ]
        );

        $this->add_control(
            'container_border_radius',
            [
                'label' => __('Border Radius', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .spddg-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'container_padding',
            [
                'label' => __('Padding', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .spddg-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'container_margin',
            [
                'label' => __('Margin', 'shortcode-pre-directions-ddg'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .spddg-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'container_box_shadow',
                'selector' => '{{WRAPPER}} .spddg-container',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        // Режим редактирования
        if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            echo '<div class="spddg-container" style="padding:20px;background:#f5f5f5;border:1px dashed #ddd;text-align:center;">';
            echo '<div class="spddg-message">' . str_replace(
                '{seconds}', 
                $settings['countdown_seconds'], 
                $settings['custom_message']
            ) . '</div>';
            echo '<div class="spddg-button-container">';
            echo '<a href="#" class="spddg-button" style="padding:10px 20px;background:#0073aa;color:white;text-decoration:none;display:inline-block;">';
            echo $settings['button_text'];
            echo '</a>';
            echo '</div>';
            echo '<p><small>' . __('Redirect URL:', 'shortcode-pre-directions-ddg') . ' ' . $settings['redirect_url']['url'] . '</small></p>';
            echo '</div>';
            return;
        }

        // Фронтенд
        if (empty($settings['redirect_url']['url'])) {
            return;
        }

        echo '<div class="spddg-container">';
        echo '<div class="spddg-message">' . str_replace(
            '{seconds}', 
            '<span class="spddg-countdown">' . $settings['countdown_seconds'] . '</span>', 
            $settings['custom_message']
        ) . '</div>';
        echo '<div class="spddg-button-container">';
        echo '<a href="' . esc_url($settings['redirect_url']['url']) . '" class="spddg-button">';
        echo $settings['button_text'];
        echo '</a>';
        echo '</div>';
        echo '<meta http-equiv="refresh" content="' . (int)$settings['countdown_seconds'] . ';url=' . esc_url($settings['redirect_url']['url']) . '" />';
        echo '</div>';

        // Скрипт счетчика
        echo '<script>
        (function() {
            var seconds = ' . (int)$settings['countdown_seconds'] . ';
            var el = document.querySelector(".spddg-countdown");
            if (el) {
                var interval = setInterval(function() {
                    seconds--;
                    el.textContent = seconds;
                    if (seconds <= 0) clearInterval(interval);
                }, 1000);
            }
        })();
        </script>';
    }
}
