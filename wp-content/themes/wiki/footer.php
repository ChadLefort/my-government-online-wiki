<?php
/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
?>
<div class="scrollup" href="#">Scroll</div><!-- /.scrollup -->
<div id="push"></div><!-- /.push -->
</div><!-- /.wrap -->
<div id="footer" class="hidden-tablet">
    <div class="container" style="padding-top: 15px;">
        <?php
        if (is_user_logged_in()){
            echo "<a href='" . wp_logout_url(home_url()) . "' role='button' class='btn btn-custom'>Log Out &nbsp;<i class='icon-hand-right icon-white'></i></a>";
        } else {
            echo "<a href='#login' role='button' class='btn btn-custom' data-toggle='modal'>Log In &nbsp;<i class='icon-user icon-white'></i> </a>";
        }
        ?>
        <span class="pull-right" style="color: #eee;">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/logosmall.png" width="220" class="hidden-phone">
        </span>
    </div><!-- /.container -->
</div><!-- /.footer -->

<!-- Start Login Modal -->
<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Wiki Login</h3>
    </div><!-- /.modal-header -->
    <div class="modal-body">
        <?php
        $args = array( 'redirect' => site_url() );

        if (!(current_user_can('level_0'))){

            if(isset($_GET['login']) && $_GET['login'] == 'failed')
            {
                ?>
                <script type='text/javascript'>
                    jQuery(document).ready(function() {
                        jQuery('#login').modal('toggle')
                    });
                </script>
                <div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    <b>Error!</b><br>
                    <p>You have entered an incorrect Username or password, please try again.</p>
                </div><!-- /.alert alert-error -->
            <?php
            }
            ?>
            <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
                <div class="form-horizontal" style="padding-bottom: 20px; padding-top: 20px;">
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="20" placeholder="Username" /></div>
                    <div class="input-prepend"><span class="add-on"><i class="icon-key"></i></span><input type="password" name="pwd" id="pwd" size="20" placeholder="Password" /></div>
                    <button type="submit" name="submit" class="btn btn-custom">Log In</button>
                </div><!-- /.form-horizontal -->
                <label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label>
                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
            </form>
        <?php
        }
        ?>
    </div><!-- /.modal-body -->
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div><!-- /.modal-footer -->
</div><!-- /#login -->
<!-- End Login Modal -->
<?php wp_footer(); ?>
</body>
</html>