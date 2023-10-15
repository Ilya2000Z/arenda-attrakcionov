<?php
if ( ! defined( 'WPINC' ) ) {
	die("Fuck u Hacker!");
}

if( current_user_can('eff_pricelist_manage_options') ){

        if ( isset($_POST['action']) && $_POST['action'] === 'update' ) { ?>
                <?php

                    if(is_array($_POST['price-options'])){
                        update_option('price-options', $_POST['price-options']);
                    }


                ?>
                <div class="updated fade"><p><strong>Настройки сохранены</strong></p></div>
        <?php } ?>

        <?php
        if ( isset($_POST['synch']) )
        {

            $linkPrL = run_synch($options);

            if(validate_file(get_home_path().$linkPrL) == 0)
            {
                $options = get_option( 'price-options' );
                $options['pricelink'] = home_url('/').$linkPrL;
                update_option('price-options', $options);
                echo '<div class="updated fade"><p><strong>Прайс лист сформирован</strong></p></div>';
            }


        }
        ?>

        <div class="wrap">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <div id="poststuff">
               <div id="post-body">
                    <div id="post-body-content">
                        <h2>Дополнительные данные (заносятся в прайс лист)</h2>
                        <form name="data" method="POST">
                        <?php
                         settings_fields( 'price-settings' );
                         $options = get_option( 'price-options' );
                        ?>

                        <table class="form-table">
                            <tr valign="top"><td><label for="price-options[phone]">Номер телефона: </label></td><td><input class="regular-text" value="<?php echo $options['phone']; ?>" type="text" name="price-options[phone]"></td></tr>
                            <tr><td><label for="price-options[company]">Название компании: </label></td><td><input class="regular-text" type="text" value="<?php echo $options['company']; ?>" name="price-options[company]"></td></tr>
                            <tr><td><label for="price-options[email]">Электронный адрес: </label></td><td><input class="regular-text" type="email" value="<?php echo $options['email']; ?>" name="price-options[email]"></td></tr>
                            <tr><td><label for="price-options[adress]">Адрес: </label></td><td><input class="regular-text" type="text" value="<?php echo $options['adress']; ?>" name="price-options[adress]"></td></tr>
                            <tr><td><label for="price-options[time]">Режим работы: </label></td><td><input class="regular-text" type="text" value="<?php echo $options['time']; ?>" name="price-options[time]"></td></tr>
                            <tr><td><label for="price-options[desc]">Дополнительная информация: </label></td><td><textarea class="large-text" name="price-options[desc]">
<?php echo $options['desc']; ?>
</textarea></td></tr>
                        </table>
                            <?php submit_button(); ?>
                        </form>
                        <h2>Пробуем собрать прайс</h2>
                        <form name="synch" method="POST">
                            <?php submit_button('Собрать прайс','primary','synch'); ?>
                        </form>
                        <?php if(!empty($options['pricelink'])) { ?>
                        <span>Линк на прайс: [<a href="<?php echo $options['pricelink']; ?>">Скачать прайс</a>]</span>
                        <?php } ?>
                    </div>
               </div>
            </div>
        </div>

<?php } ?>