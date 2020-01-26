<?php get_header();?>
<body class="dark">
<?php get_template_part('menu');?>
<div class="main">
    <div class="container">
        <div class="row">
            <?php dimox_breadcrumbs();?>
            <h1><?=get_cat_name($cat)?></h1>
        </div>
        <div class="row grid">
            <?php do_action('infographics',$cat)?>
        </div>
        <div class="row">
            <nav>
                <?php wp_corenavi()?>
            </nav>
        </div>
        </div>
    </div>
</div>
</body>
<?php get_footer();?>
