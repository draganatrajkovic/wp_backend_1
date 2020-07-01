<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header(); //u headeru uvezemo ajax
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {
		// var_dump(get_the_ID());
		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>

	<div class="edit-form-wrap">
		<h2 class="edit-form-title">Edit Current Real Estate</h2>
		<input id="id" type="hidden" value="<?php echo get_the_ID(); ?>">
		<input id="title" type="text" name="title" placeholder="Title" />
		<input id="sub_title" type="text" name="sub_title" placeholder="Sub Title" />
		<button onclick="handleEditPost()">Submit Edit</button>
		<button onclick="handleDeletePost()">Delete Current Post</button>
	</div>

	<div class="edit-form-wrap">
		<h2 class="edit-form-title">Add New Real Estate</h2>
		<input type="hidden" name="user_id" id="user_id" value="<?php echo get_current_user_id(); ?>" />
		<input id="new-title" type="text" name="new-title" placeholder="Title" />
		<input id="new-sub_title" type="text" name="new-sub_title" placeholder="Sub Title" />
		<input id="new-content" type="text" name="new-content" placeholder="Content" />
		<button onclick="handleAddPost()">Submit New Post</button>
	</div>

</main><!-- #site-content -->


<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>

