<?php
/**
 * Template Name: (Custom PHP) My Government Online Contact Form
 * Description: Custom PHP used to display a contact form.
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
require 'core/init.php';
require 'core/includes/send_email.php'; // Code used for error checking before we send the email on the contact form.
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
                                <?php the_content() ?>
                                <form action=" " method="post">
                                    <input name="contact_errors" type="hidden" value="1">
                                        <div class="controls controls-row">
                                            <input id="your_name" name="your_name" class="span4" type="text" placeholder="Full Name" maxlength="50" value="<?php echo $general->echo_back($_POST['your_name'], $errors); ?>" rel="tooltip" data-placement="top" title="Provide us your name. This is a required field.">
                                            <input id="phone" name="phone" class="span2"  type="text" placeholder="Phone Number"  maxlength="10" data-mask="(999) 999-9999" value="<?php echo $general->echo_back($_POST['phone'], $errors); ?>" rel="tooltip" data-placement="top" title="Provide us with a phone number so we can contact you back. This is a required field.">
                                            <input id="permit_number" name="permit_number" class="span2"  type="text" placeholder="Permit Number" maxlength="50" value="<?php echo $general->echo_back($_POST['permit_number'], $errors); ?>" rel="tooltip" data-placement="top" title="If you have a permit number you can provide it.">
                                            <input id="email" name="email" type="email"  class="span4" placeholder="Email Address" maxlength="50" value="<?php echo $general->echo_back($_POST['email'], $errors); ?>" rel="tooltip" data-placement="top" title="Provide us with a email so we can contact you back. This is a required field.">
                                        </div><!-- /.row-fluid -->
                                        <div class="controls">
                                            <input id="subject" name="subject" type="text" class="span12" placeholder="Subject" maxlength="100" value="<?php echo $general->echo_back($_POST['subject'], $errors); ?>" rel="tooltip" data-placement="left" title="Enter in a subject to your issue(s).">
                                            <textarea id="message" name="message" class="span12" placeholder="Details of Your Issue(s)" rows="10" maxlength="2000" rel="tooltip" data-placement="left" title="Try to describe your issue(s) in as much detail as you can. This is a required field."><?php echo $general->echo_back($_POST['message'], $errors); ?></textarea>
                                            <div id="message_feedback" class="pull-right"></div>
                                        </div><!-- /.controls -->
                                        <div class="controls">
                                            <button id="send" type="submit" class="btn btn-custom">Send</button>
                                            <span class="loading"><img src="<?php echo get_template_directory_uri();?>/assets/img/loading.gif"></span>
                                        </div><!-- /.controls -->
                                </form>
                                <?php require 'core/includes/alerts.php'; // Displays alert messages such as errors or success alerts. ?>
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
