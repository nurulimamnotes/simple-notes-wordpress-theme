<?php if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks.'); if (!empty($post->post_password)) { if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {?>
<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
<?php
return;}}
$oddcomment = 'authcomment';
?>
<?php if ( have_comments() ) : ?>
<ol class="commentlist">
<?php wp_list_comments('callback=blank_comments'); ?>
</ol>
<div id="pagcomment">
<?php previous_comments_link( '&larr;', 3 ); ?><?php next_comments_link( '&rarr;', 3 ); ?>
</div>
<div style="clear:both"></div>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p style="text-align:center">Register &amp; Login Now !</p>
<?php else : ?>
<form action="<?php echo home_url()?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( is_user_logged_in() ) : ?>
<p style="margin-top:10px">Hey <?php echo $user_identity; ?> !</p>
<?php else : ?>

<label for="author">Name &nbsp;: </label>
<input type="text" name="author" id="author" autocomplete="off" placeholder="Nurul Imam" required="" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<div style="margin-top:-20px;clear:both"></div>
<label for="email">E-Mail : </label>
<input type="text" name="email" id="email" autocomplete="off" placeholder="example@mail.com" required="" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<div style="margin-top:-20px;clear:both"></div>
<label for="url">Blog &nbsp;&nbsp;&nbsp;: </label>
<input type="text" name="url" id="url" autocomplete="off" placeholder="www.nurulimam.com" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
<div style="margin-top:-20px;clear:both"></div>
<?php endif; ?>
<textarea name="comment" id="comment" cols="58" rows="10" placeholder="Please dont SPAM ! Read first article & comment with your opinion !" tabindex="4"></textarea>
<input name="submit" type="submit" id="submit" tabindex="5" value="Post Comment !" />
<div style="clear:both"></div>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
</div>
<?php endif; ?>