<div class="span3">
    <?php
    wp_nav_menu(array(
            'menu' => 'Main Menu',
            'depth' => 2,
            'container' => false,
            'menu_class' => 'nav nav-list wiki-sidenav ',
            'walker' => new Bootstrap_Walker_Nav_Menu()
        ));

    if (is_user_logged_in()){

        wp_nav_menu(array(
            'menu' => 'Members Menu',
            'depth' => 2,
            'container' => false,
            'menu_class' => 'nav nav-list wiki-sidenav ',
            'walker' => new Bootstrap_Walker_Nav_Menu()
        ));
    }
    ?>
</div><!-- /.span3 -->

