jQuery(function($) {

    /**
     @TODO: the Attachment section
    */

    "use strict";

    if (Phoenix.useAttachment && Phoenix.useAttachment === 'on') {
       Phoenix.useAttachment = true;
    } else {
        Phoenix.useAttachment = false;
    }

    var Forms = {
        selector: $('[data-form = "contactForm"]'),
        cssClass: {'warning' : 'warning','error' : 'error', 'success' : 'success'},
        status: {'error' : 'contact-form-fail', 'success': 'contact-form-success'},

        hideBox: function(el) {
            if (el && typeof el !== 'undefined')
                $(el).slideUp('slow');
        },

        showBox: function(el) {
            el.slideDown('slow');
        }
    };

    var submitterText = Forms.selector.find('.contact-form-send').val();

    Forms.selector.each(function()
    {
        var that = $(this);
        
        that.submit(function(e) {

            var selector = e.target;

            e.preventDefault();

            // hide all boxes if some exists
            Forms.hideBox( $(selector).find('.' + Forms.cssClass['error']) );
            Forms.hideBox( $(selector).find('.' + Forms.cssClass['success']) );

            var fieldZZ = {},
                submitter = that.find('.contact-form-send');

            fieldZZ.name = that.find('[name = "name"]').val();
            fieldZZ.email = that.find('[name = "email"]').val();
            fieldZZ.subject = that.find('[name = "subject"]').val();
            fieldZZ.message = that.find('[name = "message"]').val();

            // Error Counter
            var errCount = 0;

            // Inform user about required fields (function)
            function informUserAboutFields () {
                submitter.val(Phoenix.fillAllFields).prop("disabled", true);
                setTimeout(function() {
                    submitter.val(submitterText).prop("disabled", false);
                }, 1500);
            }

            // Cansel AJAX request & temporary disable submit button, change the button text
            if (!fieldZZ.name && !fieldZZ.email && !fieldZZ.subject && !fieldZZ.message) {
                // Inform user about required fields
                informUserAboutFields();
                // prevent empty Ajax request
                return false;
            }

            // Make sure that all fields are not empty
            for (var property in fieldZZ) {
                if (fieldZZ.hasOwnProperty(property)) {
                    if (fieldZZ[property] == '') {
                        Forms.showBox(that.find('.'+ property +'Error'));
                        errCount++;
                    }
                }
            }

            // Validation of the attachment
            if (Phoenix.useAttachment) {
                var ATM = that.find('[name="attachment"]');
                fieldZZ.attachment = ATM.prop('files');

                // Presence
                if (fieldZZ.attachment.length == 0) {
                    Forms.showBox(that.find('.attachmentError-not-set'));
                        // attachmentError-wrong-size
                    return false;
                }

                // Type
                if (fieldZZ.attachment[0].type == "image/jpeg" || fieldZZ.attachment[0].type == "image/png") {

                } else {
                    Forms.showBox(that.find('.attachmentError-wrong-type'));
                    return false;
                }

                // Allowed Size
            }

            // if any field isn't valid - prevent AJAX request
            if (errCount > 0) {return false;}
            // only for debugging
            // else {console.log('Everything is valid!');}

            var serialiZZer = that.serialize();

            submitter.val(Phoenix.Sending).prop("disabled", true);

            // Ajax request
            var xhr = new XMLHttpRequest(),
                actionStr = that.attr('action') + "?action=" + Phoenix.THEME_SLUG +"_contact_form_ajax_handler&submitted=true&security="+ Phoenix.nonce + "&" + serialiZZer;

            if (Phoenix.useAttachment) {
                if (xhr.upload) {
                    actionStr += "&attachment=" + fieldZZ.attachment[0].name;
                } else {
                    console.log('Your browser is to old to send files via Ajax.');
                    return false;
                }
            }

            xhr.open("POST", actionStr, true);

            if (Phoenix.useAttachment) {
                xhr.setRequestHeader("X_FILENAME", fieldZZ.attachment[0].name);
            }

            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4) return false;

                var $return = this.responseText;

                    $return = JSON.parse($return);

                if (typeof $return.emailSent != 'undefined' && $return.emailSent === true) {
                    var box = that.find('.' + Forms.status['success']);
                    Forms.showBox( box );
                    submitter.slideUp().remove();
                } else if (typeof $return.emailSent != 'undefined' && $return.emailSent === false) {
                    var box = that.find('.' + Forms.status['error']);
                    Forms.showBox( box );
                    submitter.slideUp().remove();
                } else {
                    for (var i in $return) {
                        var box = $(selector).find('.' + $return[i]);
                        Forms.showBox( box );
                    }
                    submitter.prop("disabled", true);
                    setTimeout(function() {
                        submitter.val(submitterText).prop("disabled", false);
                    }, 1500);
                    return false;
                }
            }

            if (Phoenix.useAttachment) {
                xhr.send(fieldZZ.attachment);
            } else {
                xhr.send('');
            }

        });
    });

})
