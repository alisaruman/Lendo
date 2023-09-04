<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php if(is_home()){ bloginfo("name"); } else { wp_title(" - "); } ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=get_template_directory_uri(); ?>/images/global/favicon.png" />
    <link rel="apple-touch-icon" href="<?=get_template_directory_uri(); ?>/images/global/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="<?=get_template_directory_uri(); ?>/output.css" rel="stylesheet" />
    <link href="<?=get_template_directory_uri(); ?>/style.css" rel="stylesheet" />
    <?php wp_head(); ?>
</head>

<body class="font-vazir m-0 p-0 bg-light1" dir="rtl">

    <!-- header -->
    <header>
        <div class="container">

            <div class="first-part w-full flex items-center justify-between py-8">
                <a href="<?php bloginfo("url"); ?>" title="لندو">
                    <img src="<?=(get_field("logo","option") ? get_field("logo","option") : get_template_directory_uri()."/images/global/logo.png"); ?>" alt="لندو" title="لندو" class="w-32 h-auto" />
                </a>
                <div class="hidden lg:block searchbox relative w-2/12 border-r border-light2">
                    <form method="get" action="<?php bloginfo("url"); ?>">
                        <input type="text" name="s" id="s" class="w-full border-0 py-1 pl-3 pr-10 placeholder-gray2 text-sm bg-transparent text-secondary" placeholder="جستجو ...">
                        <i class="icon-search w-5 h-5 absolute top-1/2 right-3 -translate-y-1/2"></i>
                    </form>
                </div>
                <!-- mobile hamburger -->
                <div id="hamburger" class="block lg:hidden cursor-pointer z-50">
                    <div class="dash1 w-7 h-1 bg-secondary my-1 duration-500 rounded"></div>
                    <div class="dash2 w-7 h-1 bg-secondary my-1 duration-500 rounded"></div>
                    <div class="dash3 w-7 h-1 bg-secondary my-1 duration-500 rounded"></div>
                </div>
                <!-- mobile hamburger -->

                <!-- mobile menu -->
                <div id="mobile-menu"
                    class="fixed lg:hidden py-5 px-3 top-0 invisible -right-full opacity-0 w-9/12 bg-secondary h-full z-30 duration-500 after:fixed after:w-3/12 after:h-full after:top-0 after:left-0 after:duration-100 after:backdrop-blur">
                    <div class="searchbox relative w-full border border-primary p-3 rounded-10">
                        <form method="get" action="<?php bloginfo("url"); ?>">
                            <input type="text" name="s" id="s"
                                class="w-full border-0 placeholder-gray2 text-sm bg-transparent text-light1"
                                placeholder="جستجو ...">
                        </form>
                    </div>

                    <nav class="w-full py-5">
                        <ul class="list-none flex flex-col">
<?php
$locations = get_nav_menu_locations();
if(isset($locations["header_menu"])){
    $menu = wp_get_nav_menu_object($locations["header_menu"]);
    if($menu){
        $items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );
        foreach($items as $i){
            if($i->menu_item_parent == 0){
                $parent = $i->ID;
                $childs = [];
                foreach($items as $t){
                    if($t->menu_item_parent == $parent){
                        $childs[] = '<li><a href="'.$t->url.'" title="'.$t->title.'" class="duration-200 hover:text-primary">'.$t->title.'</a></li>';
                    }
                }
                echo '<li class="py-3'.(count($childs) > 0 ? " menu-item-has-children" : "").'"><a href="'.$i->url.'" title="'.$t->title.'" class="flex items-center gap-2"><i class="'.get_field("icon",$i).' w-6 h-6 brightness-100 invert"></i><span class="text-white text-sm">'.$i->title.'</span></a>';
                if(count($childs) > 0){
                    echo '<ul class="sub-menu w-full text-white text-sm leading-9 rounded-10 bg-dark1 px-3 invisible max-h-0 opacity-0 duration-300">';
                    echo implode("\n",$childs);
                    echo '</ul>';
                }
                echo '</li>';
            }
        }
    }
}
?>

                        </ul>
                    </nav>

                    <div class="w-full">
                        <a href="<?=get_field("header_btn_url","option"); ?>" class="flex items-center justify-center gap-2 bg-gradient-to-tr from-green2 to-green3 p-2 rounded-10 text-white text-sm">
                            <div class="relative flex items-center justify-center w-8 h-8 bg-white rounded-full">
                                <i class="icon-progressbar inline-flex w-5 h-5"></i>
                                <span
                                    class="absolute text-green2 text-[10px] font-extra top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">۲۰</span>
                            </div>
                            ثبت‌نام وام ۲۰ میلیونی
                        </a>
                    </div>

                </div>
                <!-- mobile menu -->
            </div>

            <div class="hidden lg:block second-part p-4 rounded-10 shadow-main">
                <div class="w-full flex items-center lg:gap-8 xl:gap-12 2xl:gap-16">
                    <div class="w-10/12">
                        <nav class="w-full">
                            <ul class="list-none flex items-center justify-between">
<?php
$locations = get_nav_menu_locations();
if(isset($locations["header_menu"])){
    $menu = wp_get_nav_menu_object($locations["header_menu"]);
    if($menu){
        $items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );
        foreach($items as $i){
            if($i->menu_item_parent == 0){
                $parent = $i->ID;
                $childs = [];
                foreach($items as $t){
                    if($t->menu_item_parent == $parent){
                        $childs[] = '<li><a href="'.$t->url.'" title="'.$t->title.'" class="duration-200 hover:text-primary">'.$t->title.'</a></li>';
                    }
                }
                echo '<li'.(count($childs) > 0 ? ' class="group menu-item-has-children"' : "").'><a href="'.$i->url.'" title="'.$t->title.'" class="flex items-center gap-2 py-1 px-3 rounded-10 duration-200 hover:bg-lightGreen"><i class="'.get_field("icon",$i).' w-6 h-6"></i><span class="text-black text-sm">'.$i->title.'</span></a>';
                if(count($childs) > 0){
                    echo '<ul class="sub-menu absolute opacity-0 group-hover:opacity-100 invisible group-hover:visible top-[175%] duration-300 group-hover:top-[120%] right-0 z-10 py-2 px-4 min-w-[230px] text-black text-sm leading-9 rounded-10 bg-white shadow-main">';
                    echo implode("\n",$childs);
                    echo '</ul>';
                }
                echo '</li>';
            }
        }
    }
}
?>

                            </ul>
                        </nav>
                    </div>
                    <div class="hidden lg:block w-2/12">
                        <a href="<?=get_field("header_btn_url","option"); ?>" class="flex items-center justify-center gap-2 bg-gradient-to-tr from-green2 to-green3 hover:from-green3 hover:to-green2 p-2 rounded-10 text-white text-sm">
                            <div class="relative flex items-center justify-center w-8 h-8 bg-white rounded-full">
                                <i class="icon-progressbar inline-flex w-5 h-5"></i>
                                <span
                                    class="absolute text-green2 text-[10px] font-extra top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">۲۰</span>
                            </div>
                            ثبت‌نام وام ۲۰ میلیونی
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <!-- header -->
