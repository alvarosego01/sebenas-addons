

<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<?php
function sbn_footer_general1( $parameters ){

    $footer_id = $parameters['sbn_footer_postType'];

?>

<footer id="sbn_footer" class="content-info custom_footer sbn_footer principal_footer1">

    <div class="section-row">

        <div class="columns row">

            <div class="columnItem c1">

            <?php
                    $sbn_footer_logo_1c_4c = sbn_getField('sbn_footer_logo_1c_4c', $footer_id);
                    if(isset($sbn_footer_logo_1c_4c) && $sbn_footer_logo_1c_4c != null){
                    ?>
                        <div class="containerImage logoPiePagina">
                            <?php
                                $i = $sbn_footer_logo_1c_4c;
                                $i = $i['url'];
                            ?>

                            <img alt="Sebenasmart logo mark" src="<?php echo $i; ?>">

                        </div>
                    <?php } ?>


                <?php
                    $sbn_footer_texto_1c_4c = sbn_getField('sbn_footer_texto_1c_4c', $footer_id);
                    if(isset($sbn_footer_texto_1c_4c) && $sbn_footer_texto_1c_4c != null){
                    ?>
                        <p class="text">
                            <?php echo $sbn_footer_texto_1c_4c; ?>
                        </p>
                    <?php } ?>

                <?php
                    $enable_menu_1c_4c = sbn_getField('enable_menu_1c_4c', $footer_id);
                    if(isset($enable_menu_1c_4c) && $enable_menu_1c_4c == 1){
                ?>
                    <div class="menuContainer menu-b-social-networks-container">

                        <?php
                            $title_menu_1c_4c = sbn_getField('title_menu_1c_4c', $footer_id);
                            if(isset($title_menu_1c_4c) && $title_menu_1c_4c != null){
                        ?>
                            <h3 class="titleMenu">
                                <?php echo $title_menu_1c_4c; ?>
                            </h3>

                        <?php } ?>


                        <?php
                            $menu_1c_4c = sbn_getField('menu_1c_4c', $footer_id);
                            if(isset($menu_1c_4c) && $menu_1c_4c != null){
                            ?>
                            <?php  wp_nav_menu([
                                'menu' => $menu_1c_4c,
                                'container' => false,
                                'menu_class' => 'menu',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul id="%1$s" class="navbar-nav  mb-2 mb-md-0 %2$s">%3$s</ul>',
                                'depth' => 3,
                                // 'walker' => new \App\wp_bootstrap5_navwalker(),
                            ]) ?>
                        <?php } ?>

                    </div>

                    <?php } ?>

            </div>

            <div class="columnItem c2">

<?php
$enable_menu_2c_4c = sbn_getField('enable_menu_2c_4c', $footer_id);
if(isset($enable_menu_2c_4c) && $enable_menu_2c_4c == 1){
?>

<div class="menuContainer">

    <?php
        $title_menu_2c_4c = sbn_getField('title_menu_2c_4c', $footer_id);
        if(isset($title_menu_2c_4c) && $title_menu_2c_4c != null){
        ?>
        <h3 class="titleMenu">
            <?php echo $title_menu_2c_4c;  ?>
        </h3>
    <?php } ?>


    <?php
        $menu_2c_4c = sbn_getField('menu_2c_4c', $footer_id);
        if(isset($menu_2c_4c) && $menu_2c_4c != null){
    ?>
        <?php  wp_nav_menu([
            'menu' => $menu_2c_4c,
            'container' => false,
            'menu_class' => 'menu',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul id="%1$s" class="navbar-nav  mb-2 mb-md-0 %2$s">%3$s</ul>',
            'depth' => 3,
            // 'walker' => new \App\wp_bootstrap5_navwalker(),
            ])  ?>
    <?php } ?>

</div>
<?php } ?>

</div>

<div class="columnItem c3">

<?php
$enable_menu_3c_4c = sbn_getField('enable_menu_3c_4c', $footer_id);
if(isset($enable_menu_3c_4c) && $enable_menu_3c_4c == 1){
?>
<div class="menuContainer">

    <?php
        $title_menu_3c_4c = sbn_getField('title_menu_3c_4c', $footer_id);
    if(isset($title_menu_3c_4c) && $title_menu_3c_4c != null){
    ?>
        <h3 class="titleMenu">
            <?php echo $title_menu_3c_4c;  ?>
        </h3>
    <?php } ?>


    <?php
        $menu_3c_4c = sbn_getField('menu_3c_4c', $footer_id);
        if(isset($menu_3c_4c) && $menu_3c_4c != null){
    ?>
        <?php  wp_nav_menu([
            'menu' => $menu_3c_4c,
            'container' => false,
            'menu_class' => 'menu',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul id="%1$s" class="navbar-nav  mb-2 mb-md-0 %2$s">%3$s</ul>',
            'depth' => 3,
            // 'walker' => new \App\wp_bootstrap5_navwalker(),
            ])  ?>
    <?php } ?>

</div>
<?php } ?>



</div>

<div class="columnItem c4">

<?php
$enable_menu_4c_4c = sbn_getField('enable_menu_4c_4c', $footer_id);
if(isset($enable_menu_4c_4c) && $enable_menu_4c_4c == 1){
?>
<div class="menuContainer">

    <?php
        $title_menu_4c_4c = sbn_getField('title_menu_4c_4c', $footer_id);
    if(isset($title_menu_4c_4c) && $title_menu_4c_4c != null){
    ?>
        <h3 class="titleMenu">
            <?php echo $title_menu_4c_4c;  ?>
        </h3>
    <?php } ?>


    <?php
        $menu_4c_4c = sbn_getField('menu_4c_4c', $footer_id);
        if(isset($menu_4c_4c) && $menu_4c_4c != null){
    ?>
        <?php  wp_nav_menu([
            'menu' => $menu_4c_4c,
            'container' => false,
            'menu_class' => 'menu',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul id="%1$s" class="navbar-nav  mb-2 mb-md-0 %2$s">%3$s</ul>',
            'depth' => 3,
            // 'walker' => new \App\wp_bootstrap5_navwalker(),
            ])  ?>
    <?php } ?>

</div>
<?php } ?>



</div>

        </div>



    <?php
            $sbn_footer_texto_base_4c = sbn_getField('sbn_footer_texto_base_4c', $footer_id);
        if (isset($sbn_footer_texto_base_4c) && $sbn_footer_texto_base_4c != null){
    ?>
            <div class="bottom_footer">

                <p class="text">

                    <?php
                    echo $sbn_footer_texto_base_4c;
                     ?>

                </p>

                <div class="menuContainer paymentMethods">

<?php
    $title_menu_1c_4c = sbn_getField('title_menu_base_4c', $footer_id);
    if(isset($title_menu_1c_4c) && $title_menu_1c_4c != null){
?>
    <h3 class="titleMenu">
        <?php echo $title_menu_1c_4c; ?>
    </h3>

<?php } ?>


<?php
    $menu_1c_4c = sbn_getField('menu_base_4c', $footer_id);
    if(isset($menu_1c_4c) && $menu_1c_4c != null){
    ?>
    <?php  wp_nav_menu([
        'menu' => $menu_1c_4c,
        'container' => false,
        'menu_class' => 'menu',
        'fallback_cb' => '__return_false',
        'items_wrap' => '<ul id="%1$s" class="navbar-nav  mb-2 mb-md-0 %2$s">%3$s</ul>',
        'depth' => 3,
        // 'walker' => new \App\wp_bootstrap5_navwalker(),
    ]) ?>
<?php } ?>

</div>


            </div>
            <?php } ?>


    </div>

</footer>

<?php } ?>