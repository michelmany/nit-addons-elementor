<?php

namespace NIT_Addons_Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use NIT_Addons_Elementor\Classes\NIT_Posts_Helper;

class Accordion extends Widget_Base
{

  public function get_name()
  {
    return 'tbp_accordion_item';
  }

  public function get_title()
  {
    return 'TBP Accordion Item';
  }

  public function get_icon()
  {
    return 'fa fa-code';
  }

  public function get_categories()
  {
    return ['nit-addons-elementor'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'content_section',
      [
        'label' => __('Content', 'plugin-name'),
        'tab' => Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'url',
      [
        'label' => __('URL to embed', 'plugin-name'),
        'type' => Controls_Manager::TEXT,
        'input_type' => 'url',
        'placeholder' => __('https://your-link.com', 'plugin-name'),
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {

    $settings = $this->get_settings_for_display();

    // $custom_posts = NIT_Posts_Helper::get_all_posts_by_type('post');

    $html = wp_oembed_get($settings['url']);

    echo '<div class="oembed-elementor-widget">';

    echo ($html) ? $html : $settings['url'];

    echo '</div>';
  }
}
