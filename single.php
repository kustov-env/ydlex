<?php get_header();?>
<div class="ezfolio-main-wrapper">
    <?php $option=get_option('main-options');?>
    <?php while(have_posts()):?>
    <?php the_post();?>
    <div class="ezfolio-section-left" style="background-image:url(extra-images/left-section-image.jpg);">
        <span class="ezfolio-transparent"></span>
        <?php get_template_part('logo');?>
        <div class="ezfolio-subheader">
            <div class="ezfolio-subheader-heading">
                <h1><?php the_title()?></h1>
                <span><?php the_excerpt()?></span>
            </div>
        </div>
    </div>
    <div class="ezfolio-section-right">
        <div class="ezfolio-main-content">
            <div class="ezfolio-main-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ezfolio-breadcrumb">
                            <ul>
                                <li><a href="/">Главная</a></li>
                                <li><a href="<?php echo get_post_type_archive_link('post'); ?>">Мой блог</a></li>
                                <li><?php the_title();?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <figure class="ezfolio-blog-thumb">
                            <?php the_post_thumbnail('large');?>
                            <figcaption>
                                <h2><?php the_title();?></h2>
                                <ul class="ezfolio-blog-detail-option">
                                    <li><i class="fa fa-calendar-o"></i><?php the_date('j M Y');?></li>
                                    <li><i class="fa fa-user"></i><?php the_author()?></li>
                                </ul>
                            </figcaption>
                        </figure>
                        <div class="ezfolio-rich-editor">
                            <?php the_content();?>
                        </div>
<?php if($option['show_comments']!=false|$option['show_comments']!=''):?>
                        <div class="ezfolio-rich-editor">
                        <?php if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;?>
                            <?php endif;?>
                        </div>
                        <?php if(dynamic_sidebar('blog')):?><?php endif;?>
                        <?php do_action('get_last_posts');?>
                    </div>
                </div>
            </div>
            <?php get_template_part('contacts');?>
        </div>
    </div><?php endwhile?>
    <div class="clearfix"></div>
</div>
<?php get_footer();?>