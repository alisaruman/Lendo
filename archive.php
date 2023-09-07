<?php get_header(); 
$cat = get_term_by('id',get_queried_object_id(  ),"category");
?>
    <!-- archive banner -->
    <section id="archive-banner" class="pt-6">
        <div class="container">
            <a href="#" target="_blank" rel="nofollow noopener">
                <img src="<?=get_template_directory_uri(); ?>/images/temp/wide-banner2.jpg" alt="بنر" class="w-full h-auto" />
            </a>
        </div>
    </section>
    <!-- archive banner -->

    <!-- slider -->
    <section id="slider" class="py-6">
        <div class="container">
            <div class="w-full grid grid-cols-1 lg:grid-cols-5 lg:gap-3">
                <div class="col-span-3">
<?php $p = get_posts(array("showposts"=>"1","meta_key"=>"place","meta_value"=>"archive_top_right"));
if(!empty($p)){ $p = $p[0]; ?>
                    <div class="w-full rounded-10 overflow-hidden bg-white shadow-main mb-4 md:mb-0">

                        <div class="item group relative rounded-10 overflow-hidden">
                            <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                <?=get_the_post_thumbnail($p,"full",array("alt"=>get_the_title($p),"class"=>"w-full h-auto duration-200 group-hover:brightness-50")); ?>
                                <div class="content w-full absolute bottom-0 right-0 p-5 bg-gradient-to-t from-black to-transparent">
                                    <h3 class="text-white text-sm md:text-xl font-extra mt-3">
                                        <?php the_title(); ?>
                                    </h3>
                                </div>
                            </a>
                        </div>

                        <div class="content py-4 px-6">
                            <div class="w-full flex flex-col md:flex-row gap-7 md:gap-0 items-center justify-between">
                                <div class="author flex items-center gap-2 lg:gap-4">
                                    <?php echo get_avatar( get_the_author_meta('ID',$p->post_author),64,"",get_the_author_meta('display_name',$p->post_author), array( 'class' => 'w-10 h-10 rounded-10' ) );  ?>
                                    <div class="flex flex-col">
                                        <span class="text-gray3 text-sm">توسط <?=get_the_author_meta('display_name',$p->post_author); ?></span>
                                        <span class="text-gray2 text-xs">در <?=get_the_time("Y-m-d",$p); ?> </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 lg:gap-3 text-gray2">
                                    <div class="flex items-center gap-1">
                                        <i class="icon-hourglass w-3 h-3"></i>
                                        <span class="text-sm">مطالعه: <?=time_to_read($p); ?> دقیقه</span>
                                    </div>
                                    <div class="w-0 h-4 border-r border-gray1"></div>
                                    <div class="flex items-center gap-1">
                                        <i class="icon-comment w-3 h-3"></i>
                                        <span class="text-sm"><?=get_comments_number($p); ?> دیدگاه</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } ?>
                </div>
                <div class="col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-3">
<?php
$postss = get_posts(array("showposts"=>"4","meta_key"=>"place","meta_value"=>"archive_top_left"));
foreach($postss as $p){
?>
                    <div class="item group relative rounded-10 overflow-hidden">
                        <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                            <?=get_the_post_thumbnail($p,"medium",array("class"=>"w-full h-auto duration-200 group-hover:brightness-50","alt"=>get_the_title($p))); ?>
                            <div
                                class="content w-full absolute bottom-0 right-0 p-5 bg-gradient-to-t from-black to-transparent">
                                <h3 class="text-white text-sm font-extra mt-3"><?=get_the_title($p); ?></h3>
                            </div>
                        </a>
                    </div>
<?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- slider -->

    <!-- top invests -->
    <section id="popular-titles">
        <div class="container">
            <div class="main-title pt-9 pb-3 w-full flex items-center">
                <i class="icon-blue-pattern w-4 h-4"></i>
                <h3 class="text-secondary font-extra text-base lg:text-xl pr-2">منتخب <?=$cat->name; ?></h3>
            </div>
            <div class="swiper mySwiper circle-swiper outside lg:px-5 lg:-mx-5 width-fixer" id="popular-swiper">
                <div class="swiper-wrapper pb-16">
<?php
$postss = get_posts(array("showposts"=>get_field("special_archive_limit","option"),"cat"=>$cat->term_id,"meta_key"=>"place","meta_value"=>"specials"));
foreach($postss as $p){
?>
                    <div class="swiper-slide">
                        <div class="item w-full bg-white rounded-10 border border-gray1 shadow-main p-3">
                            <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                <img src="images/temp/post1.png" alt="پست اول" class="" />
                                <?=get_the_post_thumbnail($p,"medium",array("class"=>"w-full h-auto rounded-10","alt"=>get_the_title($p))); ?>
                            </a>
                            <div class="flex items-center gap-3 py-3">
<?php foreach(get_the_category($p) as $c){ ?>
                                <a href="<?=get_category_link($c); ?>" title="<?=$c->name; ?>">
                                    <span class="text-green2 text-xs py-1 px-3 rounded-10 bg-lightGreen"><?=$c->name; ?></span>
                                </a>
<?php } ?>
                                <div class="flex items-center gap-1">
                                    <i class="icon-hourglass w-3 h-3"></i>
                                    <span class="text-xs lg:text-sm text-gray2">مطالعه: <?=time_to_read($p); ?> دقیقه</span>
                                </div>
                            </div>
                            <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                <h3 class="font-extra text-black text-sm lg:text-xl duration-200 hover:text-secondary">
                                    <?=get_the_title($p); ?>
                                </h3>
                            </a>
                            <p class="line-clamp-2 text-gray3 text-sm py-3">
                                <?=get_the_excerpt($p); ?>
                            </p>
                        </div>
                    </div>
<?php } ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>
    <!-- top invests -->

    <!-- main posts -->
    <section id="main-posts" class="pt-9">
        <div class="container">
            <div class="w-full flex flex-col lg:flex-row lg:gap-7">

                <div class="w-full lg:w-8/12 lg:w-9/12">

                    <!-- rent guide -->
                    <div class="main-title pt-6 pb-3 w-full flex items-center">
                        <i class="icon-blue-pattern w-4 h-4"></i>
                        <h3 class="text-secondary font-extra text-base lg:text-xl pr-2">جدیدترین مطالب <?=$cat->name; ?></h3>
                    </div>
                    <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-3">
<?php while(have_posts()){ the_post(); ?>
                        <div class="w-full">
                            <div class="item w-full bg-white rounded-10 shadow-main p-3">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail("medium",array("class"=>"w-full h-auto rounded-10","alt"=>get_the_title())); ?>
                                </a>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <h3 class="lg:line-clamp-2 lg:h-14 font-extra text-black text-sm pt-3 duration-200 hover:text-secondary">
                                        <?php the_title(); ?>
                                    </h3>
                                </a>
                                <p class="line-clamp-2 h-14 text-gray3 text-sm py-3">
                                    <?=get_the_excerpt(); ?>
                                </p>
                                <div class="flex items-center gap-5 text-gray2">
                                    <div class="flex items-center gap-2">
                                        <i class="icon-calendar3 w-3 h-3"></i>
                                        <span class="text-sm"><?php the_time("Y-m-d"); ?></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="icon-comment w-3 h-3"></i>
                                        <span class="text-sm"><?=get_comments_number(); ?> دیدگاه</span>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php } ?>
                    </div>
                    <?php page_navigation_f(); ?>
                    

                    <!-- rent guide -->
                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </section>
    <!-- main posts -->
<?php get_footer(); ?>