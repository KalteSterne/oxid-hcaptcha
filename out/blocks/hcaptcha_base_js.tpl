[{ $smarty.block.parent }]
[{assign var="oConf" value=$oViewConf->getConfig()}]
[{assign var="ac" value=$oViewConf->getTopActiveClassName()}]

[{if $ac == "contact" || $ac == "newsletter" || $ac=="register" || $ac=="suggest"}]
    <script src="[{ $oViewConf->getModuleUrl('tremendo_hcaptcha','out/src/js/hcaptcha_callbacks.js') }]"></script>
    [{capture assign=tremendohcaptchaonload}]
        var tremendoHcaptcha_onload = function () {
            var tremendoHcaptcha_widget = hcaptcha.render('tremendo-hcaptcha', { 
                sitekey: '[{$oConf->getConfigParam('tremendo_hcaptcha_sitekey')}]',
                theme: [{if $oConf->getConfigParam('tremendo_hcaptcha_darktheme')}]'dark'[{else}]'light'[{/if}],
                size: [{if $oConf->getConfigParam('tremendo_hcaptcha_compact')}]'compact'[{else}]'normal'[{/if}],
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
        };
    [{/capture}]
    <script>
        [{$tremendohcaptchaonload}]
    </script>
    <script src="https://js.hcaptcha.com/1/api.js?onload=tremendoHcaptcha_onload&render=explicit" async defer></script>
[{/if}]