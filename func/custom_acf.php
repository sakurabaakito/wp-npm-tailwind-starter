<?php
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' 	=> 'Theme General Settings',
    'menu_title'	=> '各種設定',
    'menu_slug' 	=> 'theme-general-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false,
    'position' => '21',
  ));

  // acf_add_options_sub_page(array(
  //     'page_title' 	=> 'SNSアカウント',
  //     'menu_title'	=> 'SNSアカウント',
  //     'parent_slug'	=> 'theme-general-settings',
  // ));
}