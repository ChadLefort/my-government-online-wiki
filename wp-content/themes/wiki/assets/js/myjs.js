/* Hide / Show Animations
 ----------------------------------------------------------------------------------------*/
jQuery(document).ready(function(){

    jQuery('#loading').hide();
    jQuery('.step_1').show();

    jQuery('#send, #back, #back_hide').on('click', function(){
        jQuery('.loading').show();
    });

    jQuery('#main-issue, #state').on('change', function(){
        jQuery('.select_loading').show().delay(1000).fadeOut();
        jQuery('.step_2').slideDown();
        jQuery('.back_hide').hide();
    });

    jQuery('.alert').fadeIn(1000);

    jQuery("#main-issue").change(function() {
        if (jQuery(this).val() == 3){
            jQuery('.step_2').hide();
            jQuery('.dont_see_issue').show();
        } else {
            jQuery('.dont_see_issue').hide();
        }
    });

    jQuery('.customer_menu, .jurisdiction_menu').click(function () {
        jQuery(this).nextAll('li').slideToggle();
        jQuery(this).find('.icon-chevron-right').toggleClass('icon-chevron-down')
    });

});

/* Allows drop down menu to switch to specific issue based on main issue and jurisdictions based on state
 ----------------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
    jQuery("#main-issue").change(function() {
        jQuery("#specific-issue").load(
            jQuery(location).attr('protocol')
            + "//"
            + jQuery(location).attr('hostname')
            + "/wiki/core/includes/get_specific_issues.php?issue_id="
            + jQuery("#main-issue").val()
        );
    });

    jQuery("#state").change(function() {
        jQuery("#jurisdiction").load(
            jQuery(location).attr('protocol')
            + "//"
            + jQuery(location).attr('hostname')
            + "/wiki/core/includes/get_jurisdictions.php?state="
            + jQuery("#state").val()
        );
    });
});

/* Scroll Up to Top of Page
 ----------------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
    jQuery(window).scroll(function(){
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.scrollup').fadeIn();
        } else {
            jQuery('.scrollup').fadeOut();
        }
    });

    jQuery('.scrollup').click(function(){
        jQuery("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});

/* Back button
 ----------------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
    jQuery('#back, #back_hide').click(function(){
        parent.history.back();
        return false;
    })
});

/* Characters remaining for contact form message box
 ----------------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
    var message_max = 2000;

    jQuery('#message').keyup(function(){
        var message_length = jQuery('#message').val().length;
        var char_left = message_max - message_length;

        jQuery('#message_feedback').html('You have ' + char_left + ' characters remaining.');
    });
});

/* Tooltips
 ----------------------------------------------------------------------------------------*/
jQuery(function (jQuery) {
    jQuery('a[rel="tooltip"], button[rel="tooltip"], a').tooltip();
    jQuery('input[rel="tooltip"], textarea[rel="tooltip"]').tooltip({
        container: '.controls'
    });
});

/* Typeahead for admin user search.
 ----------------------------------------------------------------------------------------*/
jQuery(function() {
    jQuery("#typeahead, #typeahead2").typeahead({
        source: function(query, process){
            jQuery.ajax({
                url: '/wiki/core/includes/typeahead.php',
                type: 'POST',
                data: 'query=' + query,
                dataType: 'JSON',
                async: true,
                success: function(data){
                    process(data);
                }
            });
        }
    });
});