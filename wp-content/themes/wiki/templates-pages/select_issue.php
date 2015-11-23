<?php
/**
 * Template Name: (Custom PHP) Select Issue
 * Description: Custom PHP used to select issues.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
require 'core/init.php';
require 'core/includes/issue_redirect.php'; // Code used to redirect the customer depending on their submitted issue.
get_header();
while (have_posts()) : the_post();
?>
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
                                <?php the_content(); ?>

                                <img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif" id="loading">

                                <form action="" method="post" class="form-search">
                                    <input name="issue_errors" type="hidden" value="1">

                                    <div class="step_1">
                                        <label><b>Step 1: Please select your main issue.</b></label><br>
                                        <select name="main-issue" id="main-issue" class="span5">
                                            <option value="" disabled selected>Select Main Your Issue</option>
                                            <?php require 'core/includes/get_main_issues.php'; // Loop to get main issues from the databases. ?>
                                        </select>
                                    </div><!--/.step_1 -->

                                    <div class="dont_see_issue" style="padding-top: 20px">
                                        <button id="send" type="submit" class="btn btn-custom">Next <i class="icon-arrow-right icon-white"></i></button>
                                        <span class="loading"><img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif"></span>
                                    </div>

                                    <div class="step_2" style="padding-top: 20px">
                                        <label><b>Step 2: Please select your specific issue.</b></label><br>
                                        <select name="specific-issue" id="specific-issue" class="span5">
                                            <option value="" disabled selected>Select Specific Issue</option>
                                            <?php // Use jQuery to generate specific issues dropdown. PHP file to get specific issues from the database is in ../get_specific_issues.php ?>
                                        </select>

                                        <span class="select_loading"><img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif"></span>
                                        <br><br>
                                        <button id="send" type="submit" class="btn btn-custom">Next <i class="icon-arrow-right icon-white"></i></button>
                                        <span class="loading"><img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif"></span>
                                    </div><!--/.step_2 -->
                                </form>
                                <?php require 'core/includes/alerts.php'; // Displays an error if user doesn't select anything ?>
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