<?php
//SHORTCODES
//[title]YOUR_CONTENT[/title]
add_shortcode('title','get_title_information');
function get_title_information($atts,$content){$html='<div class=container-fluid><div class="row"><div class="col-sm-6 col-sm-offset-3 col-xs-12"><h1 class="title">'.trim($content).'</h1></div></div></div>';return $html;}
//[contacts city="YOUR_CITY" location="YOUR_LOCATION" PHONE="YOUR_PHONE"]YOUR_IFRAME_OR_MAP[/contacts]
add_shortcode('contacts','get_contacts_information');
function get_contacts_information($atts,$content){$html='<div class="container-fluid"><div class="map-body row"><div id="map">'.$content.'</div><div class="contact-information" style="background-image: url('.$atts["image"].')"><div class="info"><span class="city">'.trim($atts['city']).'</span><span class="location">'.trim($atts['location']).'</span><span class="phone">'.trim($atts['phone']).'</span></div></div></div></div>';return $html;}
//[introduction image="YOUR_IMAGE" introduction="YOUR_CONTENT_WITH_INTRODUCTION" philosophy="YOUR_CONTENT_WITH_PHILOSOPHY"]
add_shortcode('introduction','get_inroduction_information');
function get_inroduction_information($atts){$html='<section class="about"><div class="container"><div class="row"><article class="image-left col-md-3 col-sm-4 col-xs-4 col-smx"><img src="'.$atts["image"].'" alt="'.get_bloginfo("name").'"></article><article class="content-right col-md-9 col-sm-8 col-xs-8 col-smx"><h2>КТО МЫ</h2><span>Вступление.</span>'.$atts["introduction"].'<span>Философия</span>'.$atts["philosophy"].'</article></article></div></div></section>';return $html;}
//[blockquote]YOUR_CONTENT[/blockquote]
add_shortcode('blockquote','get_blockquote');
function get_blockquote($atts,$content){$html='<div class="row"><div class="col-xs-12"><article class="blockquote"><div class="content-blockquote col-lg-offset-1 col-lg-9 col-md-offset-1 col-md-9 col-sm-9 col-xs-9 col-smx">'.$content.'</div><div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 hidden-smx"><img src="'.get_bloginfo('template_url').'/images/logo_small.svg" alt="'.get_bloginfo('name').'"></div></article></div></div>';return $html;}
//[slider slide="THERE_YOUR_URL_IMAGES_SEPARATED_BY_COMMAS" file="THERE_YOUR_URL_FILES_SEPARATED_BY_COMMAS"]
add_shortcode('slider','get_slider');
function get_slider($atts){$html='<div class="container"><h2>Инфографические материалы</h2><div class="row"><div class="owl-carousel slider">';$slide=explode(',',$atts['slide']);$file=explode(',',$atts['file']);$i=0;foreach ($slide as $image){$html.='<div class="item"><img src="'.$slide[$i].'" alt="Инфографические материалы"><div class="col-sm-12"><article><a href="'.$file[$i].'" target="_blank">Развернуть</a> <a href="'.$file[$i].'" download="'.$file[$i].'">скачать</a></article></div></div>';$i++;}$html.='</div></div></div>';return $html;}
//[introduction image="YOUR_IMAGE" about="YOUR_CONTENT_ABOUT" content="TITLE/CONTENT-TITLE|TITLE/CONTENT-TITLE"]
add_shortcode('about','get_about_information');
function get_about_information($atts,$content){$html='';$html.='<div class="col-md-3 col-md-offset-3 col-sm-6 col-xs-5 col-smx"><img src="'.$atts["image"].'" alt="'.$atts["name"].'"></div>';$html.='<div class="col-sm-6 col-xs-7 col-smx about-page"><h2>'.$atts["name"].'</h2><p>'.$atts["about"].'</p><span>Сферой особого внимания являются категории судебных споров (дел):</span>';if($content){$html.='<div class="content-body">';$contents=explode('_|_',$content);foreach ($contents as $item){$article=explode('***',$item);$html.='<h3>'.trim($article[0]).'</h3><p>'.trim($article[1]).'</p>';}$html.='</div>';}$html.='</div>';return $html;}
//CUSTOM ACTION
//FOR PAGE ORDER SEMINAR
add_action('get_page_content','get_page_content',1);
function get_page_content($alias){
    $html='';
    $content=new WP_Query(array('show_posts'=>5,'category_name'=>$alias,'order'=>'DESC','orderby'=>'date'));
    if($content->have_posts()){$category=get_category_by_slug( $alias );
    $html.='<div class="box-title"><h2>'.$category->cat_name.'</h2></div>';

    while($content->have_posts()){
        $time=''.get_post_meta(get_the_ID(),"date",true).'';
        $date=explode(' ',$time);
    print_r($time);
    $content->the_post();$html.='<div class="box-subtitle-seminar new"><div class="date"><span>'.get_post_meta(get_the_ID(),"day",true).'</span>'.get_post_meta(get_the_ID(),"month",true).'</div><div class="wrap-title"><h3 id="title-'.get_the_ID().'">'.get_the_title().'</h3>';
    if(get_post_meta(get_the_ID(),'subtitle',true)){
        $html.='<a href="'.get_post_meta(get_the_ID(),'file',true).'" download="'.get_post_meta(get_the_ID(),'file',true).'"><span>'.get_post_meta(get_the_ID(),'subtitle',true).'</span></a>';
    }
    $html.='</div></div><div class="content-seminar">'.get_the_content().'</div>';
    if(get_post_meta(get_the_ID(),'competention',true)){
        $html.='<span class="seminar-subtitle">Приобретаемые компетенции</span><div class="content-seminar">'.get_post_meta(get_the_ID(),'competention',true).'</div>';
        }
    if(get_post_meta(get_the_ID(),'sertificat',true)){
           $html.='<span class="seminar-subtitle">Сертификат</span><div class="content-seminar">'.get_post_meta(get_the_ID(),'sertificat',true).'</div>';
        }
    $html.='<button data-course="'.get_the_ID().'" class="link course">Записаться</button>';
    }
    wp_reset_postdata();
    }echo $html;}

//FOR CATEGORY LIST ITEM
add_action('category','get_catefory_list_for_page_lay_assistant',1);
function get_catefory_list_for_page_lay_assistant($id){$html='';$category=get_categories(array('parent'=>$id,'hide_empty' => 0));$i=0;foreach ($category as $item){$i++;if($i%4==1){$html.='<div class="item-subcategory">';}$html.='<div class="box-subtitle col-sm-3 col-xs-6"><a href="'.get_category_link( $item->term_id ).'">'.$item->name.'</a></div>';if($i%4==0){$html.='</div>';}}if($i%4!=0){$html.='</div>';}echo $html;}
//FOR CATEGORY INFOGRAPHICS
add_action('infographics','get_infographics',1);
function get_infographics($id){$html='';$category=get_categories( array( 'parent' => $id, 'hide_empty' => 0 ) );foreach($category as $item) {$posts=new WP_Query(array('cat'=>$item->term_id));if($posts->have_posts()) {$html.='<div class="box-infographic col-sm-6 col-xs-12"><div class="box-title-infographics"><h2>'.$item->name.'</h2></div>';$i=0;while($posts->have_posts()) {$posts->the_post();$i++;$html.='<div class="box-content-infographics"><span>'.$i.'</span><div class="link-infographics"><a href="'.get_post_meta(get_the_ID(),'file',true).'" download="'.get_post_meta(get_the_ID(),'file',true).'">'.get_the_title().'</a></div></div>';}$html.='</div>';}}echo $html;}
//FOR NEWS ON HOME PAGE
add_action('get_news','get_news_content_on_index_page');
function get_news_content_on_index_page(){$option=get_option('yd-options');$paged = get_query_var('paged') ? get_query_var('paged') : 1;$news=new WP_Query(array('category_name'=>'news','posts_per_page'=>$option['count_news'],'order'=>'date','orderby'=>'DESC','paged'=>$paged));if($news->have_posts()) {$data=date('Y');$archives=wp_get_archives(array('type'=>'yearly','limit'=> 10,'format'=> 'html','show_post_count' => false,'echo'=> false,));$html='<div class="form"><div class="row"><div class="col-sm-3 hidden-xs"><article><div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$data.' год <i class="yd-icon icon-down-arrow"></i></a><ul class="dropdown-menu">'.$archives.'</ul></div></article></div><div class="col-sm-9"><article class="detail"><h2>Новости</h2></article></div></div></div>';while ($news->have_posts()){$news->the_post();$html.='<div class="row new"><div class="col-sm-3 col-xs-2 col-smx"><div class="date"><span>'.get_the_time('j',get_the_ID()).'</span>'.get_the_time('F',get_the_ID()).'</div></div><div class="col-sm-9 col-xs-10  col-smx"><article><h3>'.get_the_title().'</h3><p>'.get_the_excerpt().'</p><div class="button-wrap"><a class="more link-'.get_the_ID().'" role="button" data-toggle="collapse" href="#news-'.get_the_ID().'" >Развернуть</a></div><div class="collapse" id="news-'.get_the_ID().'" data-id="'.get_the_ID().'"><div class="content">'.get_the_content().'</div></div></article></div></div>';}}echo $html;}
//FOR COUNT NEWS ON SEARCH
add_action('count','get_count',1);
function get_count($count){$result=(int)$count;if($result==1|$result%10==1){$html='По вашему запросу найдено '.$count.' запись';}elseif ($result>=5||$result%10>=5||$result%10==0||$result>10&&$result<20){$html='По вашему запросу найдено '.$count.' записей';}else{$html='По вашему запросу найдено '.$count.' записи';}echo $html;}
//SUPPORT WORK SHORTCODES ON TEXT/HTML WIDJETS
add_filter('widget_text','do_shortcode');