<?php get_header(); 
the_post();
?>
    <!-- breadcrumb -->
    <section id="breadcrumb">
        <div class="container">
            <div
                class="w-full flex flex-wrap lg:flex-nowrap items-center gap-1 lg:gap-3 text-gray3 text-sm py-6 border-b border-gray1">
                <a href="<?php bloginfo("url"); ?>" title="خانه">خانه</a>
                <i class="icon-green-chevron-left w-4 h-4"></i>
<?php $cats = get_the_category(); if(!empty($cats)){ ?>
                <a href="<?=get_category_link($cats[0]); ?>" title="<?=$cats[0]->name; ?>"><?=$cats[0]->name; ?></a>
                <i class="icon-green-chevron-left w-4 h-4"></i>
<?php } ?>
                <span class="font-extra"><?php the_title(); ?></span>
            </div>
        </div>
    </section>
    <!-- breadcrumb -->

    <!-- single top info -->
    <section id="single-top-info">
        <div class="container">
            <h1 class="font-extra text-black text-base lg:text-2xl py-5"><?php the_title(); ?></h1>
            <?php the_post_thumbnail("full",array("class"=>"mx-auto max-w-full h-auto rounded-10","alt"=>get_the_title())); ?>
        </div>
    </section>
    <!-- single top info -->

    <!-- single main -->
    <section id="single-main" class="py-6">
        <div class="container">
            <div class="w-full flex flex-col lg:flex-row gap-5">

                <div class="w-full lg:w-9/12">

                    <div class="w-full bg-white rounded-10 flex flex-col md:flex-row gap-3 md:gap-0 items-center justify-between border border-light3 p-5 mb-6">
                        <div class="flex flex-col md:flex-row items-center justify-center md:justify-start gap-3">
                            <div class="flex gap-3">
<?php foreach(get_the_category() as $c){ ?>
                                <a href="<?=get_category_link($c); ?>" title="<?=$c->name; ?>" class="flex">
                                    <span class="text-green2 text-xs lg:text-sm py-1 lg:py-2 px-2 lg:px-4 rounded-10 bg-lightGreen"><?=$c->name; ?></span>
                                </a>
<?php } ?>
                            </div>
                            <div class="text-xs lg:text-sm text-gray3">
                                <span>تاریخ انتشار: <?php the_time("Y-m-d"); ?></span>
                                <span class="px-1">-</span>
                                <span>مطالعه: <?=time_to_read($post); ?> دقیقه</span>
                            </div>
                        </div>
                        <ul class="list-none flex items-center justify-end gap-3 lg:gap-5">
                            <li>
                                <a href="#" class="flex"><i class="icon-gray-whatsapp w-6 h-6"></i></a>
                            </li>
                            <li>
                                <a href="#" class="flex"><i class="icon-gray-twitter w-6 h-6"></i></a>
                            </li>
                            <li>
                                <a href="#" class="flex"><i class="icon-gray-telegram w-6 h-6"></i></a>
                            </li>
                            <li>
                                <a href="#" class="flex"><i class="icon-gray-linkedin w-6 h-6"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div id="toc" class="w-full bg-white rounded-10 border border-light3 p-5 mb-6">
                        <div class="w-full flex items-center justify-between cursor-pointer" id="opener">
                            <span class="text-black text-base font-extra">فهرست محتوا</span>
                            <i class="icon-chevron-bottom w-6 h-6 duration-200"></i>
                        </div>
                        <ul class="w-full list-none text-gray3 text-sm leading-9 duration-300 max-h-0 opacity-0 invisible py-0">
                            <li class="cursor-pointer">آشنایی با بهترین وام اینترنتی در ایران </li>
                            <li class="cursor-pointer">مزایای دریافت بهترین وام اینترنتی</li>
                            <li class="cursor-pointer">چگونگی دریافت وام اینترنتی</li>
                        </ul>
                    </div>

                    <div id="single-content" class="mb-6 pb-6">
                        <?php the_content(); ?>
                    </div>
<!--
                    <a href="#" target="_blank" rel="nofollow noopener" class="block mb-6" title="بنر">
                        <img src="images/temp/wide-banner1.jpg" alt="بنر" class="max-w-full mx-auto h-auto rounded-10" />
                    </a>
-->
                    <div id="post-author" class="w-full bg-secondary text-white p-5 rounded-10 mb-12">
                        <div class="flex items-center gap-3">
                            <?php echo get_avatar( get_the_author_meta('ID'),64,"",get_the_author_meta('display_name'), array( 'class' => 'w-14 h-14 rounded-full' ) );  ?>

                            <div class="flex flex-col">
                                <span class="text-sm font-extra">توسط <?php the_author(); ?></span>
                                <span class="text-xs text-gray1"><?=count_user_posts($post->post_author); ?> نوشته</span>
                            </div>
                        </div>
                    </div>

                    <hr class="bg-gray1" />

                    <div class="w-full flex items-center justify-between py-5 border-b border-gray1">
                        <div class="flex items-center gap-2">
                            <span class="text-gray3 text-xs lg:text-sm">برچسب ها: </span>
<?php foreach(get_the_tags() ?: [] as $t){ ?>
                            <a href="<?=get_tag_link($t); ?>" title="<?=$t->name; ?>">
                                <span class="text-green2 text-xs lg:text-sm py-1 lg:py-2 px-2 lg:px-4 rounded-10 bg-lightGreen"><?=$t->name; ?></span>
                            </a>
<?php } ?>
                        </div>
                        <div class="flex items-center justify-end gap-2 cursor-pointer">
                            <span class="text-sm text-black"><?=get_likes($post->ID); ?></span>
                            <i class="icon-heart w-6 h-6"></i>
                        </div>
                    </div>

                    <div id="related-posts" class="py-6">
                        <p class="text-base text-black font-extra py-3">مطالب مرتبط</p>
                        <div class="w-full flex flex-col md:flex-row gap-5">
<?php
$relateds = [];
$cats = get_the_category();
if(!empty($cats)){
    $relateds = get_posts(array("showposts"=>"2","cat"=>$cats[0]->term_id,"post__not_in"=>array($post->ID)));
} else {
    $relateds = get_posts(array("showposts"=>"2","orderby"=>"rand"));
}
foreach($relateds as $rel){
?>
                            <div class="w-full md:w-1/2">
                                <div class="item group relative rounded-10 overflow-hidden">
                                    <a href="<?=get_permalink($rel); ?>">
                                        <?=get_the_post_thumbnail($rel,"medium",array("class"=>"w-full h-auto duration-200 group-hover:brightness-50","alt"=>get_the_title($rel))); ?>
                                        <div class="content w-full absolute bottom-0 right-0 p-5 bg-gradient-to-t from-black to-transparent">
                                            <span class="text-white text-xs py-1 px-3 rounded-10 bg-dark1 duration-200 group-hover:bg-primary"><?php $cats = get_the_category($rel); echo $cats[0]->name; ?></span>
                                            <h3 class="text-white text-sm font-extra mt-3"><?=get_the_title($rel); ?></h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
<?php } ?>

                        </div>
                    </div>

                    

                    <?php comments_template(); ?>

                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </section>
    <!-- single main -->
<?php get_footer(); ?>