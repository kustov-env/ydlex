<?php $option=get_option('yd-options');?>
<header>
    <div class="top">
        <div class="container">
            <a href="tel:<?=str_replace(array('+',' ',' ','/',' ','(' ,')','-'), '', $option['phone1'])?>"><?=$option['phone1']?></a> <a href="tel:<?=str_replace(array('+',' ',' ','/',' ','(' ,')','-'), '', $option['phone2'])?>""><?=$option['phone2']?></a>
        </div>
    </div>
    <div class="menu">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                        <i class="yd-icon icon-menu" aria-hidden="true"></i>
                    </button>
                    <a class="navbar-brand" href="<?php bloginfo('url')?>"><img src="<?=bloginfo('template_url')?>/images/logo.png" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                    <?php wp_nav_menu( array('theme_location'=>'top','container'=> 'ul','menu_class'=>'','items_wrap'=>'<ul class="nav navbar-nav navbar-right col-md-10 col-sm-10">%3$s</ul>',));?>
                    <?php wp_nav_menu( array('theme_location'=>'bottom','container'=> 'ul','menu_class'=>'','items_wrap'=>'<ul class="nav navbar-nav navbar-right col-md-10 col-sm-10">%3$s</ul>',));?>
                </div>
            </div>
        </nav>
    </div>
</header>