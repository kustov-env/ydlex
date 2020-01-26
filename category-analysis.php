<?php get_header();?>
<body class="light">
<?php get_template_part('menu');?>
<div class="main">
    <div class="container">
        <div class="row">
            <?php dimox_breadcrumbs();?>
            <h1><?=get_cat_name($cat)?></h1>
            <div class="row">
            <?php while(have_posts()):?>
                <?php the_post();?>

                <div class="col-sm-6 col-xs-12">
                    <div class="box-infographics-analitics">
                    <h2><?=the_title()?></h2>
                    <a href="<?=get_post_meta(get_the_ID(),'file',true);?>" download="<?=get_post_meta(get_the_ID(),'file',true);?>"><?=get_post_meta(get_the_ID(),'subtitle',true)?></a>
                </div>
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
</div>
<?php get_footer();?>
