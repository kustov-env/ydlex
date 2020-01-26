<?php get_header();?>
    <body class="dark">
<?php get_template_part('menu');?>
    <div class="main">
        <div class="container">
            <div class="row">
                <?php dimox_breadcrumbs();?>
                <?php while(have_posts()):?>
                    <?php the_post();?>
                    <?php the_content();?>
                <?php endwhile;?>
            </div>
        </div>
    </div>
<?php get_footer();?>