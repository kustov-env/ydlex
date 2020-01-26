<?php
add_action( 'admin_menu', 'get_option_yd' );
add_action('admin_init','get_all_option_yd');
function get_option_yd(){
    add_submenu_page( 'options-general.php', 'Общая информация о блоге', 'Настройки темы', 'manage_options', 'yd-options','get_yd_options' );
}
function get_yd_options(){
    ?>
    <div class="wrap">
        <h2>Настройки</h2>
        <form action="options.php" method="post" enctype="multipart/form-data">
            <?php settings_fields( 'yd' ); ?>
            <?php do_settings_sections( 'yd-options' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
function get_all_option_yd(){
    register_setting('yd','yd-options');
    //Настроики
    //Общие
    add_settings_section( 'yd-option', 'Общие', '', 'yd-options' );
    //Соцсети и контакты
    add_settings_section( 'yd-social', 'Социальные сети и контакты', '', 'yd-options' );
    //Количество новостей на главной
    add_settings_field( 'count_news', 'Количество записей на главной странице', 'get_count_news', 'yd-options', 'yd-option' , array('label_for' => 'count') );
    //Ссылка facebook
    add_settings_field( 'facebook', 'facebook', 'get_facebook', 'yd-options', 'yd-social' , array('label_for' => 'facebook') );
    //Ссылка vk.com
    add_settings_field( 'vk', 'vk', 'get_vk', 'yd-options', 'yd-social' , array('label_for' => 'vk') );
    //Ссылка instagram
    add_settings_field( 'instagram', 'instagram', 'get_instagram', 'yd-options', 'yd-social' , array('label_for' => 'instagram') );
    //Телефон №1
    add_settings_field( 'phone1', 'Телефон №1', 'get_phone1', 'yd-options', 'yd-social' , array('label_for' => 'phone1') );
    //Телефон №2
    add_settings_field( 'phone2', 'Телефон №2', 'get_phone2', 'yd-options', 'yd-social' , array('label_for' => 'phone2') );
    //E-mail
    add_settings_field( 'email', 'E-mail', 'get_email', 'yd-options', 'yd-social' , array('label_for' => 'email') );
}
function get_count_news(){
    $options = get_option('yd-options');
    ?>
    <input type="text" name="yd-options[count_news]" value="<?php echo $options['count_news']?$options['count_news']:'';?>" class="regular-text">
    <?php
}
function get_email(){
    $options = get_option('yd-options');
    ?>
    <input type="text" name="yd-options[email]" value="<?php echo $options['email']?$options['email']:'';?>" class="regular-text">
    <?php
}
function get_facebook(){
    $options = get_option('yd-options');
    ?>
    <input type="text" name="yd-options[facebook]" value="<?php echo $options['facebook']?$options['facebook']:'';?>" class="regular-text">
    <?php
}
function get_vk(){
    $options = get_option('yd-options');
    ?>
    <input type="text" name="yd-options[vk]" value="<?php echo $options['vk']?$options['vk']:'';?>" class="regular-text">
    <?php
}
function get_instagram(){
    $options = get_option('yd-options');
    ?>
    <input type="text" name="yd-options[instagram]" value="<?php echo $options['instagram']?$options['instagram']:'';?>" class="regular-text">
    <?php
}
function get_phone1(){
    $options = get_option('yd-options');
    ?>
    <input type="text" name="yd-options[phone1]" value="<?php echo $options['phone1']?$options['phone1']:'';?>" class="regular-text">
    <?php
}
function get_phone2(){
    $options = get_option('yd-options');
    ?>
    <input type="text" name="yd-options[phone2]" value="<?php echo $options['phone2']?$options['phone2']:'';?>" class="regular-text">
    <?php
}