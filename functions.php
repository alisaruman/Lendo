<?php
add_action( 'after_setup_theme',function(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'widgets' );
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
require_once(TEMPLATEPATH."/widgets.php");
function time_to_read($p){
    return 0;
}
function get_likes($pid){
    return 0;
}
function page_navigation_f($pages = '', $range = 2){  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
        echo '<div id="pagination" class="w-full p-5 flex flex-wrap lg:flex-nowrap items-center justify-center gap-3 lg:gap-5 bg-white rounded-10 shadow-main mt-6">';
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class=\"flex items-center gap-2\"><i class=\"icon-left-arrow w-4 h-4 rotate-180\"></i><span class=\"text-sm text-gray3\">قبلی</span></a>";
        echo '<ul class="px-3 flex items-center border-l border-r border-gray1 gap-2 text-gray3 text-sm">';
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo "<li><a href='".get_pagenum_link($i)."' class=\"flex items-center justify-center rounded-10 w-5 md:w-8 h-5 md:h-8 duration-200 hover:bg-gray1\" ".($paged == $i ? 'bg-red-700' : 'bg-stone-700').">".$i."</a></li>";
            }
        }
        echo '</ul>';
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' class=\"flex items-center gap-2\"><span class=\"text-sm text-gray3\">بعدی</span><i class=\"icon-left-arrow w-4 h-4\"></i></a>";  
         echo "</div>\n";
     }
}
function lendo_comments($comment, $args, $depth) { 
    ?>
    <div class="w-full py-8 px-5 bg-white rounded-10 shadow-main my-3">
        <div class="flex items-center gap-2">
            <span class="text-sm text-black font-extra"><?php comment_author(); ?></span>
            <span class="text-xs text-gray2"><?php comment_date("Y/m/d"); ?></span>
        </div>
        <div class="text-black text-sm text-justify leading-8">
            <?php comment_text(); ?>
        </div>
    </div>
<?php
}
?>