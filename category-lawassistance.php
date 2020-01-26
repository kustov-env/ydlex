<?php get_header();?>
<body class="dark">
<?php get_template_part('menu');?>
<div class="main">
    <div class="container">
        <div class="row">
            <?php dimox_breadcrumbs();?>
            <h1><?=get_cat_name($cat)?></h1>
            <?php do_action('category',$cat);?>
        </div>
        <div class="row">
            <nav>
                <?php wp_corenavi()?>
            </nav>
        </div>
    </div>
</div>
<?php get_footer();?>
