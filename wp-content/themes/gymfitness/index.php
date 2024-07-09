<!-- Head -->
<?php 
    get_header();
?>

<main>
<!-- WordPress Loop -->
<?php
while (have_posts()) : the_post();

    the_title();

    the_content();

endwhile;
?>

</main>

<?php 
    get_footer();
?>