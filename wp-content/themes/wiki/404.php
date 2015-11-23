<?php
/**
 * The template for displaying 404 pages (Not Found).
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
           <div class="content_feed_well">
               <div class="well_padding">
                   <div class="page-header">
                       <h4>Page Not Found <small style="color: #b94a48">Error 404</small></h4>
                   </div>
               </div><!--/.well_padding -->
               <div class="feed_body">
                   <label style="padding-bottom: 20px;">It seems we can’t find what you’re looking for. Perhaps searching for different keywords or one of the links on the left hand side can help you.</label>
                   <form class="form-search" method="get" id="searchform" action="<?php bloginfo('home');?>">
                       <div class="input-append">
                           <input class="span3 search-query" type="text" id="typeahead2" data-provide="typeahead" autocomplete="off" placeholder="Search" value="<?php echo  esc_html($s,1);?>" name="s" maxlength="200">
                           <button class="btn" type="submit" name="sa" value="go" value="<?php echo esc_html($s,1);?>"><i class="icon-search"></i></button>
                       </div><!-- /.input-append -->
                   </form>
                </div><!-- /.feed_body -->
           </div><!--/.content_feed_well -->
        </div><!--/.span9 -->
    </div><!--/.row .content -->
</div><!--/.container -->
<?php get_footer();?>
