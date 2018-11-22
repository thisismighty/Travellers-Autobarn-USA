<?php get_header(); ?>
<?php get_sidebar('left'); ?>

<div class="col-xs-7">
	<ol class="breadcrumb">
		<li class="active"><a href="">Home</a></li>
	</ol>
	<?php if (have_posts()): while(have_posts()): the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>

<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
