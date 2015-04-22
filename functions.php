<?php

require_once ( get_template_directory() . '/options.php' );

function setup_theme_admin_menus() {
    add_submenu_page('themes.php',
        'Theme Options', 'Options', 'manage_options',
        'about-text', 'about_text');
}

// This tells WordPress to call the function named "setup_theme_admin_menus"
// when it's time to create the menu pages.
add_action("admin_menu", "setup_theme_admin_menus");

function register_my_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_my_menu' );


//Custom Form Validation
//Requiring either Phone or Email
function phone_or_email($field_value) {
  if (filter_var($field_value, FILTER_VALIDATE_EMAIL)){
    return true;
  } elseif (strlen($field_value) >= 10 && ctype_digit($field_value)){
    return true;
  } else {
    return false;
  };
};
function custom_email_validation_filter($result, $tag) {
  $type = $tag['type'];
  $name = $tag['name'];
  if($name == 'YourEmail') { // Only apply to fields with the form field name of "your-email"
    $the_value = $_POST[$name];
    if(!phone_or_email($the_value)){
      $result['valid'] = false;
      $result['reason'][$name] = 'You must submit a valid email address or phone mumber.'; // Error message
    };
  };
  return $result;
};



