<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
This post is password protected. Enter the password to view comments.
<?php
return;
}
?>

<?php if ( have_comments() ) : ?>


<div class="comments" class="clearfix">
	<div class="head">
		<div class="pad_20 clearfix">
			<h4 id="comments">Comments</h4>
			<h5><?php comments_number('No Responses', 'One Response', '% Responses' );?></h5>
		</div>
	</div>
	
	<div class="pad_3 clearfix"></div>
	
	<div class="clearfix">	
			<div class="navigation">
				<div class="next-posts"><?php previous_comments_link() ?></div>
				<div class="prev-posts"><?php next_comments_link() ?></div>
			</div>

			<ol class="commentlist">
				<?php wp_list_comments('avatar_size=80'); ?>
			</ol>
    		
			<div class="navigation">
				<div class="next-posts"><?php previous_comments_link() ?></div>
				<div class="prev-posts"><?php next_comments_link() ?></div>
			</div>
	</div>
</div>

<div class="pad_3 clearfix"></div>
	
<?php else : // this is displayed if there are no comments so far ?>

<?php if ( comments_open() ) : ?>
<!-- If comments are open, but there are no comments. -->
<?php else : // comments are closed ?>
<!--<p>Comments are closed.</p>-->
<?php endif; ?>
	
<?php endif; ?>




<!-- RESPOND -->
<?php if ( comments_open() ) : ?>
<div id="respond" class="clearfix">
	
<?php if ( is_user_logged_in() ) : ?>
		
	<div class="head">
		<div class="pad_20 clearfix">
			<h4><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h4>
			<h5>
				Logged in as
				<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>
			</h5>
		</div>
	</div>
	<div class="pad_3 clearfix"></div>
	<div class="clearfix formarea">	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<div class="cancel-comment-reply">
				<?php cancel_comment_reply_link(); ?>
			</div>
			<textarea name="comment" id="comment" tabindex="4"></textarea>
        	<div class="clear"></div>
			<div>
				<div class="btn">
					<div class="shape"></div>
					<input name="submit" type="submit" id="submit" tabindex="5" value="SEND"  />
				</div>
				<?php comment_id_fields(); ?>
			</div>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	</div>

<?php else : ?>
		
	<div class="head">
		<div class="pad_20 clearfix">
			<h4><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h4>
		</div>
	</div>
	<div class="pad_3 clearfix"></div>
	<div class="clearfix formarea">
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<div class="cancel-comment-reply">
				<?php cancel_comment_reply_link(); ?>
			</div>
   			<input class="corner3" type="text" name="author" id="author" value="Enter Name <?php if ($req) echo '(required)'; ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />     	
			<input class="corner3" type="text" name="email" id="email" value="Enter Email <?php if ($req) echo '(required)'; ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			<textarea name="comment" id="comment" tabindex="4"></textarea>			       	
			<div class="clear"></div>
			<div>
				<div class="btn">
					<div class="shape"></div>
					<input name="submit" type="submit" id="submit" tabindex="5" value="SEND"  />
				</div>
				<?php comment_id_fields(); ?>
			</div>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	</div>

<?php endif; ?>
		
</div>
<?php endif; ?>
