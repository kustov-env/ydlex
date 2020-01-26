<?php get_header();?>
    <body class="dark">
    <?php get_template_part('menu');?>
    <div class="main">
       <?php if(dynamic_sidebar('slider')):?><?php endif;?>
    </div>
    <div class="news" id="news">
        <div class="container">
            <?php do_action('get_news');?>
            <div class="row">
                <nav>
                    <?php wp_corenavi()?>
                </nav>
            </div>
        </div>
    </div>
    <div class="map">
        <div class="container">
            <object data="<?php bloginfo('template_url')?>/images/map.svg" type="image/svg+xml">
            <img src="<?php bloginfo('template_url')?>/images/map.svg">
            </object>
        </div>
    </div>
<?php if(dynamic_sidebar('about')):?><?php endif;?>
<?php get_footer();?>