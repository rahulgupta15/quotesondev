<?php get_header(); ?>

<?php if( have_posts() ) :?>

<section id='quotes-content'>

<!-- The WordPress Loop: loads post content  -->
   <?php while( have_posts() ) :
        the_post(); ?>
    
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>

    <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>
    <?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>
    
    <!-- Loop ends -->
    <?php endwhile;?>

    </section>

    <button id='quote-button'>Generate New Quote</button>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

    
<?php get_footer();?>