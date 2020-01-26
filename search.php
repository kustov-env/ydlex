<?php get_header();?>
<body class="dark">
<?php get_template_part('menu');?>
<div class="news">
    <div class="container">
        <div class="row">
            <?php dimox_breadcrumbs();?>
            <h1>Результаты поиска</h1>
            <span class="result"><?php if(count($posts)>0){do_action('count',count($posts));}else{echo 'По вашему запросу ничего не найдено...';}?></span>
        </div>
            <?php while(have_posts()):?>
                <?php the_post();?>
                <?php $category = get_the_category(get_the_ID());
                $link='';
                $title='';
                foreach ($category as $cat){$title=$cat->name;$link=get_category_link($cat->term_id);}?>
                <div class="row new">
                    <div class="col-sm-3 col-xs-2 col-smx">
                        <div class="date">
                            <span class="section">Раздел</span>
                            <a href="<?=$link?>"><?=$title;?></a>
                        </div>
                    </div>
                    <div class="col-sm-9 col-xs-10  col-smx">
                        <article>
                            <h3><?php the_title()?></h3>
                            <p><?php the_excerpt()?></p>
                            <div class="button-wrap">
                                <a class="more link-<?php the_ID()?>" role="button" data-toggle="collapse" href="#news-<?php the_ID()?>" >Развернуть</a>
                            </div>
                            <div class="collapse" id="news-<?php the_ID()?>" data-id="<?php the_ID()?>">
                                <div class="content"><?php the_content()?></div>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endwhile;?>
        <div class="row">
            <nav>
                <?php wp_corenavi();?>
            </nav>
        </div>
    </div>
</div>
<?php get_footer();?>
