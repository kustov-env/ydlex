<?php /*
Template Name: Шаблон для страницы семинаров
*/?>
<?php get_header();?>
<?php while(have_posts()):?>
<body class="<?php echo get_post_meta(get_the_ID(),'class',true);?>">
<?php get_template_part('menu');?>
<div class="main">
    <div class="container">
        <div class="row">
            <?php dimox_breadcrumbs();?>
            <?php the_post();?>
            <h1><?=the_title()?></h1>
            <?php the_content();?>
        </div>
        <?php endwhile;?>
        <div class="news row">
            <div class="col-sm-6 col-xs-12">
                <?php do_action('get_page_content','seminar');?>
            </div>
            <div class="col-sm-6 col-xs-12">
                <?php do_action('get_page_content','webinar');?>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="forma-course" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Записаться на курс</h4>
            </div>
            <div class="modal-body">
               <?php if(dynamic_sidebar('forma')):?><?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
