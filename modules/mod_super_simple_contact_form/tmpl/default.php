<?php
/*
# ------------------------------------------------------------------------
# Extensions for Joomla 3.x
# ------------------------------------------------------------------------
# Copyright (C) 2015 standardcompany.ru. All Rights Reserved.
# @license - PHP files are GNU/GPL V2.
# Author: standardcompany.ru
# Websites:  http://standardcompany.ru
# Date modified: 16/10/2015
# ------------------------------------------------------------------------
*/

defined('_JEXEC') or die;

JHtml::_('jquery.framework');

JHtml::stylesheet(JURI::base() . 'modules/mod_super_simple_contact_form/assets/css/contact-form-style.css');

$idmodule    = $module->id;
$captcha_on  = $params->get('captcha');
$captcha_pub = $params->get('public_captcha_key');
$captcha_pri = $params->get('private_captcha_key');

$myemail       = $params->get('myemail');
$message_theme = $params->get('message_theme');

$pop_up    = $params->get('pop_up');
$use_email = $params->get('use_email');
$reply     = $params->get('reply');

$textreply    = $params->get('textreply');
$subjectreply = $params->get('subjectreply');

$input_email      = $params->get('input_email');
$input_name       = $params->get('input_name');
$input_phone      = $params->get('input_phone');
$input_custom_one = $params->get('input_custom_one');
$input_custom_two = $params->get('input_custom_two');
$input_message    = $params->get('input_message');

$text_after  = $params->get('text_after');
$text_before = $params->get('text_before');

$additional_information = $params->get('additional_information');

if ($captcha_on == 'true') { 
    JHtml::script('https://www.google.com/recaptcha/api.js');
}

$roundedcorners = $params->get('roundedcorners');

if ($roundedcorners == 'true') { 
    $style = '#wrap-contact-form'.$idmodule.' .sscf-popup, #wrap-contact-form'.$idmodule.' .rf_submit {border-radius: 25px;}'; 
    $document->addStyleDeclaration( $style );
}

$style2 = ' #wrap-contact-form'.$idmodule.' .rf_submit { background:' . $params->get('backgroundcolorbutton') . '; }
            #wrap-contact-form'.$idmodule.' .rf_submit:hover { background:' . $params->get('backgroundcolorbuttonhover') . '; }
            #wrap-contact-form'.$idmodule.' .sscf-popup { background:' . $params->get('backgroundcolorbuttonmodal') . '; }
            #wrap-contact-form'.$idmodule.' .sscf-popup:hover { background:' . $params->get('backgroundcolorbuttonmodalhover') . '; }
            #wrap-contact-form'.$idmodule.' .success { color:' . $params->get('textcolorsuccess') . '!important; }
            ';

$document->addStyleDeclaration( $style2 );

?>

<?php
    if(isset($_POST['send' . $idmodule])) {
    //header("Content-type: text/txt; charset=UTF-8");
        if ( $captcha_on == 'true') { 
            $captcha = $_POST['g-recaptcha-response'];
            
            if( !$captcha ) {
                echo '<p class="error">'.$params->get('error_message_captcha').'</p>';
                echo '<a href="" class="sscf-refresh-page" onclick="location.reload()">'.$params->get('error_message_captcha_try').'</a>';
                die;
            }

            $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$captcha_pri."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
            if ( $response.success === false ) {
                die;
            }
        }

$name       = $_POST["name" . $idmodule];
$phone      = $_POST["phone" . $idmodule];
$email      = $_POST["email" . $idmodule];
$custom_one = $_POST["input_custom_one" . $idmodule];
$custom_two = $_POST["input_custom_two" . $idmodule];
$c_message  = $_POST["message" . $idmodule];



$body = '<html><body><table>';

if (!empty($name)) {
    $body .= "<tr><td><strong>" . "$input_name" . "</strong>" . ":</td>";
    $body .= "<td style='padding-left:12px;'>" . "$name " . "</td></tr>";
}

if (!empty($phone)) {
    $body .= "<tr><td><strong>" . "$input_phone" . "</strong>" . ":</td>";
    $body .= "<td style='padding-left:12px;'>" . "$phone " . "</td></tr>";
}

if (!empty($email)) {
    $body .= "<tr><td><strong>" . "$input_email" . "</strong>" . ":</td>";
    $body .= "<td style='padding-left:12px;'>" . "$email " . "</td></tr>";
}

if (!empty($custom_one)) {
    $body .= "<tr><td><strong>" . "$input_custom_one" . "</strong>" . ":</td>";
    $body .= "<td style='padding-left:12px;'>" . "$custom_one " . "</td></tr>";
}

if (!empty($custom_two)) {
    $body .= "<tr><td><strong>" . "$input_custom_two" . "</strong>" . ":</td>";
    $body .= "<td style='padding-left:12px;'>" . "$custom_two " . "</td></tr>";
}

$body .= '</table>'; // end the top table

if (!empty($c_message)) {
    $body .= "<table style='padding-top:12px;'><tr><td>";
    $body .= "<strong>" . "$input_message" . "</strong>" . ": ";
    $body .= "</td></tr>";
    $body .= "<tr><td><p>" . "$c_message " . "</p></td></tr></table>";
}

if ( $additional_information == 'true' ) {
    $body .= "<p style='font-size: 10px; color: #666;'>";
    $body .= "IP: " . $_SERVER['REMOTE_ADDR'] . "<br>";
    $body .= $_SERVER['HTTP_USER_AGENT'] . "<br>";
    $body .= $_SERVER['HTTP_REFERER'];
    $body .= "<p>";
}

$body .= '</body></html>'; // end of body

$config = JFactory::getConfig();
$sender = array( 
    $config->get( 'mailfrom' ),
    $config->get( 'fromname' ) 
);

$mailer = JFactory::getMailer();

$mailer->setSender($sender);
$mailer->addRecipient($myemail);

if (!empty($email)) {
    $mailer->addReplyTo($email);
}

$mailer->setSubject($message_theme);
$mailer->setBody($body);
$mailer->isHTML(true);
$mailer->send();

if ( $reply == 'true' ) {
    $replyBody  = '<html><body>';
    $replyBody .= "$textreply";
    $replyBody .= '</body></html>';

    $replyMailer = JFactory::getMailer();

    $replyMailer->setSender($sender);
    $replyMailer->addRecipient($email);
    $replyMailer->setSubject($subjectreply);
    $replyMailer->setBody($replyBody);
    $replyMailer->isHTML(true);
    $replyMailer->send();
}

echo '<p class="success">' . $params->get('success_message_h') . "</p>";
echo '<span class="success">' . $params->get('success_message_p') . "</span>";

die();
} // end of send

?>

<div id="wrap-contact-form<?php echo $idmodule ?>">

<?php if ($pop_up == 'true') : ?>
    <button class="sscf-popup<?php echo $idmodule ?> sscf-popup"><?php echo $params->get('button_name'); ?></button>
    <div class="mypopup a<?php echo $idmodule ?>">
    <div class="mypopup-overlay"></div>
    <div class="mypopup-wrapper">
    <a class="mypopup-close a<?php echo $idmodule ?>"></a>
    <div class="mypopup-content">
<?php endif; ?>


<div class="sscf-form-container">
    <div class="sscf-success-message"></div>
    <form id="formBody<?php echo $idmodule ?>" class='sscf-form' method="post" action="">

        <?php if ($text_before) : ?>
            <div class='sscf-header'>
                <p><?php echo $text_before; ?></p>
            </div>
        <?php endif; ?>

        <?php if ($params->get('use_name') == 'true') : ?>
                <div class='fl_wrap sscf-valid-<?php echo $params->get('valid_message_name'); ?>'>
                    <span class="sscf-error"><?php echo $params->get('error_message_name'); ?></span>
                    <input class="sscf-input" type="text" id="name<?php echo $idmodule ?>" name="name<?php echo $idmodule ?>" />
                    <label class="fl_label" for="name<?php echo $idmodule ?>"><?php echo $input_name; ?></label>
                </div>
        <?php endif; ?>

        <?php if ($params->get('use_phone') == 'true') : ?>
                <div class='fl_wrap sscf-valid-<?php echo $params->get('valid_message_phone'); ?>'>
                    <span class="sscf-error"><?php echo $params->get('error_message_phone'); ?></span>
                    <input class="sscf-input" type="text" id="phone<?php echo $idmodule ?>" name="phone<?php echo $idmodule ?>" />
                    <label class="fl_label" for="phone<?php echo $idmodule ?>"><?php echo $input_phone; ?></label>
                </div>
        <?php endif; ?>

        <?php if ($use_email == 'true') : ?>
                <div class='fl_wrap sscf-valid-<?php echo $params->get('valid_message_email_req'); ?>'>
                    <span class="sscf-error"><?php echo $params->get('error_message_email'); ?></span>
                    <span class="sscf-error sscf-email-error"><?php echo $params->get('error_valid_message_email'); ?></span>
                    <input class="sscf-input" type="text" id="email<?php echo $idmodule ?>" name="email<?php echo $idmodule ?>" onkeydown="return check(event);"/>
                    <label class="fl_label" for="email<?php echo $idmodule ?>"><?php echo $input_email; ?></label>
                </div>
        <?php endif; ?>

        <?php if (!empty($input_custom_one)) : ?>
                <div class='fl_wrap sscf-valid-<?php echo $params->get('valid_input_custom_one'); ?>'>
                    <span class="sscf-error"><?php echo $params->get('error_message_input_custom_one'); ?></span>
                    <input class="sscf-input" type="text" id="input_custom_one<?php echo $idmodule ?>" name="input_custom_one<?php echo $idmodule ?>"/>
                    <label class="fl_label" for="input_custom_one<?php echo $idmodule ?>"><?php echo $input_custom_one; ?></label>
                </div>
        <?php endif; ?>

        <?php if (!empty($input_custom_two)) : ?>
                <div class='fl_wrap sscf-valid-<?php echo $params->get('valid_input_custom_two'); ?>'>
                    <span class="sscf-error"><?php echo $params->get('error_message_input_custom_two'); ?></span>
                    <input class="sscf-input" type="text" id="input_custom_two<?php echo $idmodule ?>" name="input_custom_two<?php echo $idmodule ?>"/>
                    <label class="fl_label" for="input_custom_two<?php echo $idmodule ?>"><?php echo $input_custom_two; ?></label>
                </div>
        <?php endif; ?>

        <?php if ($params->get('use_message') == 'true') : ?>
                <div class='fl_wrap fl_wrap_textarea sscf-valid-<?php echo $params->get('valid_message_message'); ?>'>
                    <span class="sscf-error"><?php echo $params->get('error_message_message'); ?></span>
                    <textarea class="sscf-input" id="message<?php echo $idmodule ?>" name="message<?php echo $idmodule ?>" rows="5" cols="20" /></textarea>
                    <label class="fl_label" for="message<?php echo $idmodule ?>"><?php echo $input_message; ?></label>
                </div>
        <?php endif; ?>

        <input type="hidden" name="send<?php echo $idmodule ?>" value="true">

        <?php if ($captcha_on == 'true') : ?>
           <div class="g-recaptcha" data-sitekey="<?php echo $captcha_pub; ?>"></div>
            <div class="myrecap"></div>
        <?php endif; ?>

        <input class='uk-button' type="submit" value="<?php echo $params->get('message_button'); ?>" id="send<?php echo $idmodule ?>" name="submitcontactform<?php echo $idmodule ?>" />

        <?php if($text_after) : ?>
            <div class='sscf-footer'>
                <p><?php echo $text_after; ?></p>
            </div>
        <?php endif; ?>
            
    </form>
</div>

<?php if ($pop_up == 'true') : ?>
    </div>
    </div>
    </div>    
<?php endif; ?>

</div>


<?php if ($pop_up == 'true') : ?>
    <script type="text/javascript">
        jQuery(function() {
            var body = jQuery('body'),
                popup = jQuery('.mypopup.a<?php echo $idmodule ?>');

            jQuery('.sscf-popup<?php echo $idmodule ?>').click(function() {
              body.addClass('popup-active');
              popup.fadeIn();
            });

            jQuery('.mypopup-close.a<?php echo $idmodule ?>').add('.mypopup-overlay').click(function() {
              body.removeClass('popup-active');
              popup.fadeOut();
            });
        });
    </script>
<?php endif; ?>

<script>
function check(event) {
    if ( event.keyCode == 32 ) {
        return false;
    }
}

jQuery('document').ready(function() {
    jQuery('.sscf-input').focus(function() {
        jQuery(this).parent().addClass('focused');
        jQuery(this).removeClass('error');
        jQuery(this).parent().removeClass("sscf-valid-error");
        jQuery(this).parent().removeClass("sscf-email-valid-error");
        
        jQuery(this).focusout(function() {
            jQuery(this).parent().removeClass('focused');
            if ( jQuery(this).val() ) {
                jQuery(this).parent().addClass('populated');   
            }
            else {
                jQuery(this).parent().removeClass('populated');   
            }
        }); // end focusout
    }); // end focus

    jQuery('#formBody<?php echo $idmodule; ?>').on('submit', function (event) {
            var sscfForm = jQuery(this);
            var sscfError = false;

        <?php if ( $use_email == 'true' ) : ?>    
            function isValidEmailAddress(emailAddress) {
                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                return pattern.test(emailAddress);
            };

            var email = sscfForm.find('#email<?php echo $idmodule ?>');

            if ( email.val() ) {
                if( isValidEmailAddress(email.val()) ) {
                    sscfError = false;
                    email.parent().removeClass("sscf-email-valid-error");
                }
                else {
                    sscfError = true;
                    email.parent().addClass("sscf-email-valid-error");
                    email.addClass('error');
                }
            }
        <?php endif; ?>

            sscfForm.find('.sscf-input').each(function() {
                if ( !jQuery(this).val() && jQuery(this).parent().hasClass('sscf-valid-true')) {
                    jQuery(this).addClass('error');
                    jQuery(this).parent().addClass("sscf-valid-error");
                    sscfError = true;
                }
            });

            if ( !sscfError ) {
                sscfSend();
            }

            function sscfSend() {
                jQuery.ajax({
                    type: 'POST',
                    url: sscfForm.attr('action'),
                    data: sscfForm.serialize(),
                    cache: false,
                    response: 'text',
                    beforeSend: function() {
                        sscfForm.find('input[type="submit"]').attr('value', '<?php echo $params->get("message_button_sending"); ?>');
                        sscfForm.find('input[type="submit"]').attr('disabled', 'disabled');
                    },
                    success: function (data) {
                            sscfForm.slideUp('fast');
                            sscfForm.parent().find('.sscf-success-message').append(data);
                            sscfForm.parent().find('.sscf-success-message').slideDown("fast");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        event.preventDefault();
    }); // end submit
}); // end document ready

</script>