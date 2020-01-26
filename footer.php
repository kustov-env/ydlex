<?php $option=get_option('yd-options');?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-12">
                <article>
                    <a href="<?php bloginfo('url')?>/feedback/" class="link">Обратная связь</a>
                </article>
            </div>
            <div class="col-sm-6 col-xs-12">
                <article class="contact">
                    <a href="tel:<?=str_replace(array('+',' ',' ','/',' ','(' ,')','-'), '', $option['phone1'])?>"><?=$option['phone1']?></a> <a href="tel:<?=str_replace(array('+',' ',' ','/',' ','(' ,')','-'), '', $option['phone2'])?>""><?=$option['phone2']?></a>
                    <a href="mailto:<?=$option['email']?>"><?=$option['email']?></a>
                </article>
            </div>
            <div class="col-sm-3 col-xs-12">
                <article class="social">
                    <ul><li><a href="<?=$option['facebook']?>"><i class="yd-icon icon-facebook" aria-hidden="true"></i></a></li><li><a href="<?=$option['vk']?>"><i class="yd-icon icon-vkontakte" aria-hidden="true"></i></a></li><li><a href="<?=$option['instagram']?>"><i class="yd-icon icon-instagram" aria-hidden="true"></i></a></li></ul>
                </article>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-5">
                    <a href="/map">Карта сайта</a>
                </div>
                <div class="col-sm-9 col-xs-7">
                    <article>
                        <form action="/" method="post" >
                            <input type="search" name="s">
                            <button type="submit">Поиск</button>
                        </form>
                    </article>
                </div>
            </div>
            <div class="row hidden-md hidden-lg hidden-sm"><p class="copyright">&copy;Y&D LEX</p></div>
        </div>
    </div>
</footer>
<?php wp_footer();?>
</body>
</html>