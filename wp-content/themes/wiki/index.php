<?php
/**
 * Description: Default Index template to display content
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
require 'core/init.php';
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="container">
    <div class="row-fluid">
        <?php require 'core/includes/navbar.php'; ?>
        <div class="push_down span9">
            <div class="content_feed_well">
                <div class="well_padding">
                    <div class="pull-right">
                        <?php
                        $link = "<i class='icon-edit'></i>";
                        edit_post_link( $link, $before, $after, $id );
                        ?>
                    </div><!--/.pull-right -->
                    <h4><?php the_title();?></h4>
                </div><!--/.well_padding -->
                <hr class="title_hr"/>
                <div class="individual_feed_item">
                    <div class="feed_item">
                        <div class="feed_body">
                            <div class="row-fluid">
                                <?php the_content(); ?>
                            </div><!-- /.row -->
                        </div><!-- /.feed_body -->
                    </div><!-- /.feed_item -->
                </div><!-- /.individual_feed_item -->
            </div><!-- /.content_feed_well -->
        </div><!-- /.span9 -->
    </div><!-- /.row-fluid -->
    <?php endwhile; // end of the loop. ?>
</div><!-- /.container -->
<?php get_footer(); ?>

