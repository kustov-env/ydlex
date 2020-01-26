<?php get_header();?>
<body class="dark">
<?php get_template_part('menu');?>
<div class="main">
    <div class="container">
        <div class="row">
            <?php dimox_breadcrumbs();?>
            <h1><?=get_cat_name($cat)?></h1>
                <?php while(have_posts()):?>
                   <?php the_post();?>
                    <div class="col-sm-6 box-infographics">
                        <a href="<?=get_post_meta(get_the_ID(),'file',true);?>" download="<?=get_post_meta(get_the_ID(),'file',true);?>"><?=the_title()?></a>
                    </div>
                <?php endwhile;?>
        </div>
        <div class="row">
            <nav>
                <?php wp_corenavi()?>
            </nav>
        </div>
    </div>
</div>
<?php get_footer();?>
