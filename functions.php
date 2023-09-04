<?php
add_action( 'after_setup_theme',function(){
    add_theme_support( 'post-thumbnails' );
});
add_action('init',function(){
    //Register Nav Menus
    register_nav_menus( array(
        'header_menu'=>'لینک های منوی بالا',
        'foolad_menu'=> 'منوی قیمت روز فولاد',
        'footer_fast'=> 'دسترسی سریع',
        'footer_products'=> 'منوی محصولات فوتر',
    ));
});
function time_to_read($p){
    return 0;
}
?>