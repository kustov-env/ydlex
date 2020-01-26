<?php get_header();?>
<?php while(have_posts()):?>
<body class="<?php echo get_post_meta(get_the_ID(),'class',true);?>">
<?php get_template_part('menu');?>
<div class="main">
    <div class="container">
        <div class="row">
            <?php dimox_breadcrumbs();?>
                <?php the_post();?>
                <?php the_content();?>
        </div>
    </div>
</div>
<?php endwhile;?>
<?php get_footer();?>
