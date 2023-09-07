
<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','kubrick'); ?></p>

			<?php
			return;
		}
	}
?>


<?php if ('open' == $post->comment_status) { ?>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) { ?>
<p>برای ارسال نظر باید وارد شوید<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in','kubrick'); ?></a></p>
<?php } else {
$commenter = wp_get_current_commenter();    
?>
    <div id="comments" class="pt-6 mb-5">
        <p class="text-base text-black font-extra py-3">نظر یا سوال خود را ثبت کنید</p>
        <form action="<?php echo home_url(); ?>/wp-comments-post.php" method="post" id="commentform" name="commform">
            <?php if(!is_user_logged_in()){ ?>
            <input name="author" value="<?=(isset($commenter['comment_author']) ? $commenter['comment_author'] : ""); ?>" id="author" placeholder="نام و نام خانوادگی" class="w-full bg-white p-3 rounded-10 border border-gray1 text-secondary text-sm placeholder-gray3 mb-3" />
            <input type="email" name="email" value="<?=(isset($commenter['comment_author_email']) ? $commenter['comment_author_email'] : ""); ?>" id="email" placeholder="پست الکترونیکی" class="w-full bg-white p-3 rounded-10 border border-gray1 text-secondary text-sm placeholder-gray3 mb-3" />
            <?php } ?>
            <textarea name="comment" id="comment" placeholder="نظر شما" class="w-full bg-white p-3 rounded-10 border border-gray1 text-secondary text-sm placeholder-gray3 min-h-[200px] mb-3"></textarea>
            <div class="flex justify-end">
                <button type="submit" class="font-extra text-base text-white bg-green3 rounded-10 w-40 py-3">ارسال نظر</button>
            </div>
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
            <input type="hidden" name="comment_parent" id="cm_parent" value="0" />
            <?php do_action('comment_form', $post->ID); ?>
        </form>
    </div>
<?php } } ?>
<?php if ($comments) { wp_list_comments( 'type=comment&callback=lendo_comments' ); } ?>