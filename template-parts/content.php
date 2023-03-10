<?php
/**
 * Content template
 *
 * @package aquila
 */

$container_classes = !empty( $args['container_classes'] ) ? $args['container_classes'] : 'mb-5';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $container_classes ); ?>>

	<?php
        get_template_part('template-parts/blog/post-entery-header');
        get_template_part('template-parts/blog/post-entery-content');
        get_template_part('template-parts/blog/post-entery-footer');
        get_template_part('template-parts/blog/post-entery-meta');	
	?>
</article>