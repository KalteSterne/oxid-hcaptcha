[{ $smarty.block.parent }]
[{assign var="oConf" value=$oViewConf->getConfig()}]
[{assign var="ac" value=$oViewConf->getTopActiveClassName()}]

[{if $ac == "contact" || $ac == "newsletter" || $ac=="register" || $ac=="suggest"}]
    [{oxscript include=$oViewConf->getModuleUrl('tremendo_hcaptcha','out/src/js/hcaptcha_callbacks.js') }]
    [{capture assign=tremendohcaptcha_onload}]
        var tremendoHcaptchaonload = function () {
            var tremendoHcaptchawidget = hcaptcha.render('tremendo_hcaptcha', { 
                sitekey: '[{$oConf->getConfigParam('tremendo_hcaptcha_sitekey')}]',
                theme: '[{$oConf->getConfigParam('tremendo_hcaptcha_theme')|default:'light'}]',
                size: '[{$oConf->getConfigParam('tremendo_hcaptcha_size')|default:'normal'}]',
                [{if $oConf->getConfigParam('tremendo_hcaptcha_callback_success')}]
                    'callback': function() {tremendoHcaptcha.onSuccess()}
                [{/if}]
                [{if $oConf->getConfigParam('tremendo_hcaptcha_callback_error')}]
                    'error-callback': function() {tremendoHcaptcha.onError()}
                [{/if}]
                [{if $oConf->getConfigParam('tremendo_hcaptcha_callback_open')}]
                    'open-callback': function() {tremendoHcaptcha.onOpen()}
                [{/if}]
                [{if $oConf->getConfigParam('tremendo_hcaptcha_callback_close')}]
                    'close-callback': function() {tremendoHcaptcha.onClose()}
                [{/if}]
                [{if $oConf->getConfigParam('tremendo_hcaptcha_callback_responseexpired')}]
                    'expired-callback': function() {tremendoHcaptcha.onResponseExpired()}
                [{/if}]
                [{if $oConf->getConfigParam('tremendo_hcaptcha_callback_challengeexpired')}]
                    'chalexpired-callback': function() {tremendoHcaptcha.onChallengeExpired()}
                [{/if}]
            });

            [{if $oConf->getConfigParam('tremendo_hcaptcha_size') == 'invisible'}]
                var submit = $('#tremendo_hcaptcha').closest('form').find('button');

                submit.on('click', function(event) {
                    event.preventDefault();
                    hcaptcha.execute(tremendo_hcaptcha);
                });
            [{/if}]
           
        };
    [{/capture}]
    <script>
        [{$tremendohcaptcha_onload}]
    </script>
    [{if $oConf->getConfigParam('tremendo_hcaptcha_locale')}]
        [{assign var="tremendohcaptcha_langcode" value=$oConf->getConfigParam('tremendo_hcaptcha_locale')}]
        [{assign var="tremendohcaptcha_locale" value="&hl=`$tremendohcaptcha_langcode`"}] 
    [{/if}]
    [{if !$oConf->getConfigParam('tremendo_hcaptcha_recaptchacompat')}]
        [{assign var="tremendohcaptcha_grccompat" value="&recaptchacompat=off"}]
    [{/if}]
    <script src="https://js.hcaptcha.com/1/api.js?onload=tremendoHcaptchaonload&render=explicit[{$tremendohcaptcha_locale|default:''}][{$tremendohcaptcha_grccompat|default:''}]" async defer></script>
[{/if}]