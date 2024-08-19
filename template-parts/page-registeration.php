<?php /* 
Template Name: Default Plugin-Compatible Page
Template Post Type: page
*/ ?>
<?php get_header(); ?>


<main>
<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
		</article>
</div>
</main>

<?php get_footer(); ?>