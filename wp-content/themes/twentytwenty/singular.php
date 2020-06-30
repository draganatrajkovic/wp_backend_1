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

get_header();
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
		<h2 class="edit-form-title">Edit Real Estate</h2>
		<input id="id" type="hidden" value="<?php echo get_the_ID(); ?>">
		<input id="title" type="text" name="title" placeholder="Title" />
		<input id="sub_title" type="text" name="sub_title" placeholder="Sub Title" />
		<button onclick="handleEditPost()">Submit</button>
	</div>

</main><!-- #site-content -->

<script>
	function handleEditPost() {
		let id = document.getElementById('id').value;
		let title = document.getElementById('title').value;
		let sub_title = document.getElementById('sub_title').value;
		
		const obj = {
			'id': id,
			'title' : title,
			'sub_title': sub_title
		}

		$.ajax({
			url: '',
			type: 'POST',
			data: obj,
			success: function(respond){
				console.log('Respond: ' +  respond)
			}, 
			error: function(error) {
				console.log(error)
			}
		})
		// console.log(id,title,sub_title)
		console.log(obj)

	}

</script>


<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>

<style>
.edit-form-wrap {
	width: 100%;
	display:flex;
	justify-content: center;
}
.edit-form {
	width: 50%;
}
.edit-form-title {
	text-align: center;
}
</style>