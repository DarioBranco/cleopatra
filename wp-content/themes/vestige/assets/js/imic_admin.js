/*
 *
 *	Admin jQuery Functions
 *	------------------------------------------------
 *	Imic Framework
 * 	Copyright Imic 2020 - http://imicreation.com
 *
 */
jQuery(window).on('load',function () {
    var mb = jQuery('#vestige-admin-notices'),
        mbl = mb.length;

    mb.hide();
    rand();

    function rand() {
        var r = getRand(0, mbl);

        mb.eq(r).fadeIn('slow', function () {
            jQuery(this).fadeOut('slow', function () {
                setTimeout(rand, 200);
            });
        });
    }


    function getRand(min, max) {
        return Math.floor(Math.random() * (max - min) + min);
    }

    jQuery('#imic_number_of_post_cat').parent().parent().find('.rwmb-clone').each(function () {
        jQuery(this).find('.rwmb-button').hide();
    })
    jQuery('#imic_number_of_post_cat').parent().parent().find('.add-clone').hide();
    jQuery('#wpseo_meta.postbox').show();
});
jQuery(function (jQuery) {

    jQuery('.repeatable-add').on('click',function () {
        var field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
        var fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
        jQuery('input', field).val('').attr('name', function (index, name) {
            return name.replace(/(\d+)/, function (fullMatch, n) {
                return Number(n) + 1;
            });
        })
        field.insertAfter(fieldLocation, jQuery(this).closest('td'))
        return false;
    });
    jQuery('.repeatable-remove').on('click',function () {
        jQuery(this).parent().remove();
        return false;
    });
    //Megamenu
    var megamenu = jQuery('.megamenu');
    megamenu.each(function () {
        checkCheckbox(jQuery(this));
    });
    megamenu.on('click',function () {
        checkCheckbox(jQuery(this));
    })
    function checkCheckbox(mega_check) {
        if (mega_check.is(':checked')) {
            mega_check.parents('.custom_menu_data').find('.enabled_mega_data').show();
        }
        else {
            mega_check.parents('.custom_menu_data').find('.enabled_mega_data').hide();
        }
    }
    var menu_post_type = jQuery('.enabled_mega_data .menu-post-type');
    function show_hide_post() {
        menu_post_type.each(function () {
            if (jQuery(this).val() == '') {
                jQuery(this).parents('.enabled_mega_data').find('.menu-post-id-comma').parent().parent().show();
                jQuery(this).parents('.enabled_mega_data').find('.menu-post').parent().parent().hide();
            }
            else {
                jQuery(this).parents('.enabled_mega_data').find('.menu-post-id-comma').parent().parent().hide();
                jQuery(this).parents('.enabled_mega_data').find('.menu-post').parent().parent().show();
            }
        })
    }
    show_hide_post();
    menu_post_type.on('change', function () {
        show_hide_post();
    });
});
//Load Social Sites list for Staff Members
jQuery("body").on('click','.rwmb-text-list', function () {
    var text_name = jQuery(this).find('input[type=text]').attr('name');
    jQuery("body").data("text_name", text_name);
    jQuery("label#Social input").removeClass("fb");
    jQuery("label#Social").addClass("sfb");
    jQuery('body').attr('data-social', jQuery(this).attr('Name'));
    if (jQuery("#socialicons").length == 0) {
        jQuery("#staff_meta_box").append("<div id=\"socialicons\"><div class=\"inside\"><div class=\"rwmb-meta-box\"><div class=\"rwmb-field rwmb-select-wrapper\"><div class=\"rwmb-label\"><label for=\"select_social_icons\">Select Social Icons</label></div><div class=\"rwmb-input\"><select class=\"rwmb-select\" id=\"social\"><option value\"select\">Select</option><option value=\"behance\">behance</option><option value=\"bitbucket\">bitbucket</option><option value=\"codepen\">codepen</option><option value=\"delicious\">delicious</option><option value=\"digg\">digg</option><option value=\"dribbble\">dribbble</option><option value=\"dropbox\">dropbox</option><option value=\"facebook\">facebook</option><option value=\"flickr\">flickr</option><option value=\"foursquare\">foursquare</option><option value=\"github\">github</option><option value=\"gittip\">gittip</option><option value=\"google-plus\">google-plus</option><option value=\"instagram\">instagram</option><option value=\"linkedin\">linkedin</option><option value=\"pagelines\">pagelines</option><option value=\"pinterest\">pinterest</option><option value=\"skype\">skype</option><option value=\"stumbleupon\">stumbleupon</option><option value=\"tumblr\">tumblr</option><option value=\"twitter\">twitter</option><option value=\"vk\">vk</option><option value=\"vimeo-square\">vimeo-square</option><option value=\"youtube\">youtube</option></select></div></div></div></div></div></div>");
    }
});
jQuery("#staff_meta_box").on('change', 'div#socialicons select#social', function (text_id) {
    jQuery("#socialicons").remove();
    var social_field = jQuery("body").attr('data-social');
    jQuery('input[name="' + social_field + '"]').val(this.value);
    //jQuery( 'input[name$="'+text_name+'"]').val(this.value);
    jQuery("input").removeClass("fb");
});
jQuery(".rwmb-text_list-clone").children("label").last().find("input").on('click',function (e) {
    e.preventDefault();
});
jQuery('.redux-message').hide();