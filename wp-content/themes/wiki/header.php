<?php
/**
 * Default Page Header
 *
 * @package WP-Bootstrap
 * @subpackage WP-Bootstrap
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body <?php body_class(); ?>  data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="10">
<div id="wrap">
    <div class="navbar navbar-static-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand hidden-phone" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png"></a>

                <ul class="nav pull-right" style="padding-top: 3px">
                    <form class="form-search pull-right" method="get" id="searchform" action="<?php bloginfo('home');?>">
                        <div class="input-append" style="padding-top: 3px">
                            <input class="span3 search-query" type="text" id="typeahead" data-provide="typeahead" autocomplete="off" placeholder="Search" value="<?php echo  esc_html($s,1);?>" name="s" maxlength="200">
                            <button class="btn btn-custom" type="submit" name="sa" value="go" value="<?php echo esc_html($s,1);?>"><i class="icon-search icon-white"></i></button>
                        </div><!-- /.input-append -->
                    </form>
                </ul>
            </div><!-- /.container -->
        </div><!-- /.navbar-inner -->
    </div><!-- /.navbar-fixed-top -->
    <!-- End Header. Begin Template Content -->
