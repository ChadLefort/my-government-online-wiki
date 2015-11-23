<?php
/**
 * Template Name: (Custom PHP) Select State/Jurisdiction
 * Description: Custom PHP used to select state & jurisdiction from drop down menu.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
require 'core/init.php';
require 'core/includes/contact_information_redirect.php'; // Code used to send the customer to the jurisdiction contact information.
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
                                <?php the_content();?>

                                <img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif" id="loading">

                                <form action="" method="post" class="form-search">
                                    <input name="state-jurisdiction_errors" type="hidden" value="1">

                                    <div class="step_1">
                                        <label><b>Step 3: Please select your state.</b></label><br>
                                        <select name="state" id="state" class="span5">
                                            <option value="" disabled selected>Select Your State</option>
                                            <?php require 'core/includes/get_states.php'; // Loop to get states from the databases. ?>
                                        </select>
                                    </div><!--/.step_1 -->

                                    <div class="step_2" style="padding-top: 20px">
                                        <label><b>Step 4: Please select your jurisdiction.</b></label><br>
                                        <select name="jurisdiction" id="jurisdiction" class="span5">
                                            <option value="" disabled selected>Select Your Jurisdiction</option>
                                            <?php //Use jQuery to generate jurisdictions dropdown. PHP file to get jurisdictions from the database is in ../get_jurisdictions.php ?>
                                        </select>
                                        <span class="select_loading"><img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif"></span>
                                        <br><br>
                                        <div style="display: inline;">
                                            <button type="button" id="back" class="btn btn-custom"><i class="icon-arrow-left icon-white"></i> Back</button>
                                            <button id="send" type="submit" class="btn btn-custom">Next <i class="icon-arrow-right icon-white"></i></button>
                                        </div><!--/.inline -->
                                        <span class="loading"><img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif"></span>
                                    </div><!--/.step_2 -->

                                    <div class="back_hide" style="padding-top: 20px;">
                                        <button type="button" id="back_hide" class="btn btn-custom"><i class="icon-arrow-left icon-white"></i> Back</button>
                                        <span class="loading"><img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif"></span>
                                    </div><!--/.back_hide -->
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
