<?php
/**
 * Search Results Template
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
require 'core/init.php';
get_header(); ?>
<div class="container">

	<div class="row content">
        <?php require 'core/includes/navbar.php'; ?>

        <div class="push_down span9">
            <?php if (have_posts()) : ?>
                     <h3 style="padding-bottom: 10px;"><?php printf( __('Search Results for: %s', 'bootstrapwp'),'<span>' . get_search_query() . '</span>'); ?></h3>
                      <?php while (have_posts()) : the_post(); ?>
                        <div <?php post_class(); ?>>
                            <div class="content_feed_well">
                                <div class="well_padding">
                                    <div class="pull-right">
                                        <?php
                                        $link = "<i class='icon-edit'></i>";
                                        edit_post_link( $link, $before, $after, $id );
                                        ?>
                                    </div><!--/.pull-right -->
                                        <a href="<?php the_permalink(); ?>">
                                            <h4><?php the_title();?></h4>
                                        </a>
                                </div><!--/.well_padding -->
                                <hr class="title_hr"/>
                                <div class="individual_feed_item">
                                    <div class="feed_item">
                                        <div class="feed_body">
                                            <div class="row-fluid">
                                                <?php // Post thumbnail conditional display.
                                                if ( has_post_thumbnail( $post->ID ) !== false ) : ?>
                                                <div class="span3">
                                                    <?php $featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image_url [0];?>" class="img-polaroid"></a>
                                                </div>
                                                <div class="span9">
                                                    <?php else : ?>
                                                    <div class="span12">
                                                        <?php endif; ?>
                                                        <?php the_excerpt(); ?>
                                                    </div><!-- /.span12 -->
                                                </div><!-- /.span9 -->
                                            </div><!-- /.row -->
                                        </div><!-- /.feed_body -->
                                    </div><!-- /.feed_item -->
                                </div><!-- /.individual_feed_item -->
                            </div><!-- /.content_feed_well -->
                        <?php endwhile; ?>

                <?php else : ?>
                    <div class="row content">
                        <div class="span9">
                            <header class="post-title">
                                <h3><?php _e('No Results Found', 'bootstrapwp'); ?></h3>
                            </header>
                            <p class="lead">
                            <div class="content_feed_well">
                                <div class="feed_body">
                                    <form class="form-search" method="get" id="searchform" action="<?php bloginfo('home');?>">
                                        <div class="input-append">
                                            <label>It seems we can't find what you're looking for. Try your search again?</label><br><br>
                                            <input class="span3 search-query" type="text" id="typeahead2" data-provide="typeahead" autocomplete="off" placeholder="Search" value="<?php echo  esc_html($s,1);?>" name="s" maxlength="200">
                                            <button class="btn" type="submit" name="sa" value="go" value="<?php echo esc_html($s,1);?>"><i class="icon-search"></i></button>
                                        </div>
                                    </form>
                                </div><!-- /.feed_body -->
                            </div><!--/.content_feed_well -->
                        </div><!--/.span9 -->
                    </div><!-- /.row .content -->
             <?php endif;?>
                </div><!--/.post_class -->
        </div><!-- /.span9 -->
    </div><!-- /.row .content -->
<?php get_footer(); ?>