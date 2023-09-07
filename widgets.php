<?php
add_action("widgets_init",function(){
    register_sidebar( array(
        'name' => "سایدبار",
        'id' => 'sidebar',
        'description' => "سایدبار اصلی سایت",
        'before_widget' => '',
        'after_widget' => '</div>',
        'before_title' => '<div class="main-title pt-9 lg:pt-6 pb-3 w-full flex items-center"><i class="icon-blue-pattern w-4 h-4"></i><h3 class="text-secondary font-extra text-base lg:text-xl pr-2">',
        'after_title' => '</h3></div><div class="w-full rounded-10 bg-white shadow-main mb-5">',
    ) );
});


// Creating the widget
class latest_widgets extends WP_Widget {
 
    // The construct part
    function __construct() {
        parent::__construct(
            'latest_widgets', 
            "نمایش آخرین نوشته ها", 
            array( 'description' => "ویجت اختصاصی قالب برای نمایش آخرین نوشته ها", )
        );
    }
     
    // Creating widget front-end
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty($instance['title']) ){ echo $args['before_title'] . $instance['title'] . $args['after_title']; }
        $posts = get_posts(array("showposts"=>$instance['limit'],"cat"=>$instance['cat']));
        echo '<ul class="m-0 p-0 list-none">';
        foreach($posts as $p){
            echo '<li class="group py-5 px-3 flex border-b border-gray4 last:border-0">
                    <a href="'.get_permalink($p).'" title="'.get_the_title($p).'" class="w-3/12">
                        '.get_the_post_thumbnail($p,"thumbnail",array("class"=>"w-16 h-16 rounded-full duration-200 group-hover:brightness-50","alt"=>get_the_title($p))).'
                    </a>
                    <div class="content w-9/12">
                        <a href="'.get_permalink($p).'" title="'.get_the_title($p).'">
                            <h3 class="line-clamp-3 text-black text-sm duration-200 group-hover:text-secondary">
                                '.get_the_title($p).'
                            </h3>
                        </a>
                        <div class="flex items-center gap-2 text-gray2 pt-1">
                            <i class="icon-calendar3 w-3 h-3"></i>
                            <span class="text-sm">'.get_the_time("Y-m-d",$p).'</span>
                        </div>
                    </div>
                </li>';
        }
        echo '</ul>';
        echo $args['after_widget'];
    }
     
    // Creating widget Backend
    public function form( $instance ) {
        ?>
            <p>
                <label for="<?=$this->get_field_id( 'title' ); ?>">عنوان</label>
                <input class="widefat" id="<?=$this->get_field_id( 'title' ); ?>" name="<?=$this->get_field_name( 'title' ); ?>" type="text" value="<?=isset($instance[ 'title' ]) ? $instance[ 'title' ] : ""; ?>" />
            </p>
            <p>
                <label for="<?=$this->get_field_id( 'limit' ); ?>">تعداد پست های قابل نمایش</label>
                <input class="widefat" id="<?=$this->get_field_id( 'limit' ); ?>" name="<?=$this->get_field_name( 'limit' ); ?>" type="text" value="<?=isset($instance[ 'limit' ]) ? $instance[ 'limit' ] : ""; ?>" />
            </p>
            <p>
                <label for="<?=$this->get_field_id( 'cat' ); ?>">دسته بندی</label>
                <?php  wp_dropdown_categories( 'show_option_none=انتخاب دسته بندی&name='.$this->get_field_id( 'cat' ).'&selected='.(isset($instance[ 'cat' ]) ? $instance[ 'cat' ] : "0") ); ?>
            </p>
        <?php
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : 'آخرین نوشته ها';
        $instance['cat'] = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '1';
        $instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '10';
        return $instance;
    }
     
    // Class wpb_widget ends here
}
add_action( 'widgets_init',function(){
    register_widget('latest_widgets');
});
?>