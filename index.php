<?php get_header(); ?>
    <!-- slider -->
    <section id="slider" class="py-6">
        <div class="container">
            <div class="w-full grid grid-cols-1 lg:grid-cols-3 lg:gap-3">
                <div class="col-span-2">

                    <div class="swiper mySwiper circle-swiper" id="main-swiper">
                        <div class="swiper-wrapper">
<?php
$posts = get_posts(array("showposts"=>get_field("slider_index_top_limit","option"),"meta_key"=>"place","meta_value"=>"header_top_right"));
foreach($posts as $p){
?>
                            <div class="swiper-slide">
                                <div class="w-full rounded-10 overflow-hidden bg-white shadow-main">
                                    <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                        <?=get_the_post_thumbnail($p,"full",array("class"=>"w-full h-auto cover","alt"=>get_the_title($p))); ?>
                                    </a>
                                    <div class="content py-4 px-6">
<?php foreach(get_the_category($p) as $c){ ?>
                                        <a href="<?=get_category_link($c); ?>" title="<?=$c->name; ?>">
                                            <span class="text-green2 text-xs py-1 px-3 rounded-10 bg-lightGreen"><?=$c->name; ?></span>
                                        </a>
<?php } ?>
                                        <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                            <h2 class="font-extra text-black text-md lg:text-xl py-4 lg:line-clamp-1 duration-200 hover:text-secondary">
                                                <?=get_the_title($p); ?>
                                            </h2>
                                        </a>
                                        <p class="text-gray2 text-justify text-xs lg:text-sm lg:line-clamp-2">
                                            <?=get_the_excerpt($p); ?>
                                        </p>
                                        <div class="w-full flex items-center justify-between py-6">
                                            <div class="author flex items-center gap-2 lg:gap-4">
                                                <?php echo get_avatar( get_the_author_meta('ID',$p->post_author),64,"",get_the_author_meta('display_name',$p->post_author), array( 'class' => 'w-10 h-10 rounded-10' ) );  ?>
                                                <div class="flex flex-col">
                                                    <span class="text-gray3 text-sm"><?=get_the_author($p); ?></span>
                                                    <span class="text-gray2 text-xs">در <?=get_the_time("Y-m-d",$p ); ?></span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-5 text-gray2">
                                                <div>
                                                    <span class="text-sm">مطالعه: <?=time_to_read($p); ?> دقیقه</span>
                                                    <i class="icon-hourglass w-3 h-3"></i>
                                                </div>
                                                <div class="w-0 h-4 border-r border-gray1"></div>
                                                <div>
                                                    <span class="text-sm"><?=get_comments_number($p); ?> دیدگاه</span>
                                                    <i class="icon-comment w-3 h-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php } ?>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>


                </div>
                <div class="col-span-1 grid gap-3">
<?php
$posts = get_posts(array("showposts"=>3,"meta_key"=>"place","meta_value"=>"header_top_left"));
foreach($posts as $p){
?>
                    <div class="item group relative rounded-10 overflow-hidden">
                        <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                            <?=get_the_post_thumbnail($p,"medium",array("class"=>"w-full h-auto duration-200 group-hover:brightness-50","alt"=>get_the_title($p))); ?>
                            <div class="content w-full absolute bottom-0 right-0 p-5 bg-gradient-to-t from-black to-transparent">
                                <span class="text-white text-xs py-1 px-3 rounded-10 bg-dark1 duration-200 group-hover:bg-primary"><?php $cat = get_the_category($p); echo $cat[0]->name; ?></span>
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

    <!-- popular titles -->
    <section id="popular-titles">
        <div class="container">
            <div class="main-title pt-9 pb-3 w-full flex items-center">
                <i class="icon-blue-pattern w-4 h-4"></i>
                <h3 class="text-secondary font-extra text-base lg:text-xl pr-2">محبوب ترین عنوان ها</h3>
            </div>
            <div class="swiper mySwiper circle-swiper outside lg:px-5 lg:-mx-5 width-fixer" id="popular-swiper">
                <div class="swiper-wrapper pb-16">
<?php
$posts = get_posts(array("showposts"=>get_field("specials_limit","option"),"meta_key"=>"place","meta_value"=>"specials"));
foreach($posts as $p){
?>
                    <div class="swiper-slide">
                        <div class="item w-full bg-white rounded-10 border border-gray1 shadow-main p-3">
                            <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
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
    <!-- popular titles -->

    <!-- last news -->
    <section id="last-news">
        <div class="container">
            <div class="main-title pt-6 pb-3 w-full flex items-center">
                <i class="icon-green-pattern w-4 h-4"></i>
                <h3 class="text-primary font-extra text-base lg:text-xl pr-2">اخبار لندو</h3>
            </div>
            <div class="w-full flex flex-col lg:flex-row items-center gap-7">
<?php
$posts = get_posts(array("showposts"=>"3","meta_key"=>"place","meta_value"=>"news"));
foreach($posts as $p){
?>
                <div class="w-full lg:w-1/3">
                    <div class="item group relative rounded-10 overflow-hidden">
                        <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                            <?=get_the_post_thumbnail($p,"medium",array("class"=>"w-full h-auto duration-200 brightness-50 lg:brightness-100 lg:group-hover:brightness-50","alt"=>get_the_title($p))); ?>
                            <div class="news-content w-full absolute bottom-0 left-0 bg-gradient-to-t from-black to-transparent p-5 text-white">
                                <h3 class="font-extra text-base pb-3"><?=get_the_title($p); ?></h3>
                                <p class="text-sm pb-3 lg:opacity-0 duration-300 lg:max-h-0 lg:group-hover:max-h-32 lg:group-hover:opacity-100">
                                    <?=get_the_excerpt($p); ?>
                                </p>
                                <div class="flex items-center gap-5">
                                    <div class="flex items-center gap-2">
                                        <i class="icon-calendar w-3 h-3"></i>
                                        <span class="text-sm"><?=get_the_time("Y-m-d",$p); ?></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="icon-comment2 w-3 h-3"></i>
                                        <span class="text-sm"><?=get_comments_number($p); ?> دیدگاه</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
<?php } ?>
            </div>
        </div>
    </section>
    <!-- last news -->

    <!-- main posts -->
    <section id="main-posts" class="pt-9">
        <div class="container">
            <div class="w-full flex flex-col lg:flex-row lg:gap-7">

                <div class="w-full lg:w-8/12 lg:w-9/12">
<?php while(have_rows("blocks","option")){ the_row(); ?>
                    <div class="main-title pt-6 pb-3 w-full flex items-center">
                        <i class="icon-blue-pattern w-4 h-4"></i>
                        <h3 class="text-secondary font-extra text-base lg:text-xl pr-2"><?php the_sub_field("title"); ?></h3>
                    </div>
                    <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-3">
<?php
$posts = get_posts(array("showposts"=>get_sub_field("limit"),"cat"=>get_sub_field("cat")));
foreach($posts as $p){ ?>
                        <div class="w-full">
                            <div class="item w-full bg-white rounded-10 shadow-main p-3">
                                <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                    <img src="images/temp/post1.png" alt="پست اول" class="" />
                                    <?=get_the_post_thumbnail($p,"thumbnail",array("class"=>"w-full h-auto rounded-10","alt"=>get_the_title($p))); ?>
                                </a>
                                <a href="<?=get_permalink($p); ?>" title="<?=get_the_title($p); ?>">
                                    <h3 class="lg:line-clamp-2 lg:h-14 font-extra text-black text-sm pt-3 duration-200 hover:text-secondary">
                                        <?=get_the_title($p); ?>
                                    </h3>
                                </a>
                                <p class="line-clamp-2 h-14 text-gray3 text-sm py-3">
                                    <?=get_the_excerpt($p); ?>
                                </p>
                                <div class="flex items-center gap-5 text-gray2">
                                    <div class="flex items-center gap-2">
                                        <i class="icon-calendar3 w-3 h-3"></i>
                                        <span class="text-sm"><?=get_the_time("Y-m-d",$p); ?></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="icon-comment w-3 h-3"></i>
                                        <span class="text-sm"><?=get_comments_number($p); ?> دیدگاه</span>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php } ?>
                    </div>
                    
<?php } ?>
                    

                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </section>
    <!-- main posts -->
<?php get_footer(); ?>