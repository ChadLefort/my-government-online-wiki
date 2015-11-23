<?php
/**
 * Template Name: (Custom PHP) Displays Jurisdiction Contact Info
 * Description: Custom PHP used to display jurisdiction contact information.
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
                    <h4><?php the_title();?></h4>
                </div><!--/.well_padding -->
                <hr class="title_hr"/>
                <div class="individual_feed_item">
                    <div class="feed_item">
                        <div class="feed_body">
                            <div class="row-fluid">
                                <?php require 'core/includes/get_contact_information.php'; // Code used to get jurisdiction contact information and keywords to help users depending on their issue selection. ?>
                                <div style="padding-top: 20px;">
                                    <button type="button" id="back" class="btn btn-custom"><i class="icon-arrow-left icon-white"></i> Back</button>
                                    <span class="loading"><img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif"></span>
                                </div>
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
