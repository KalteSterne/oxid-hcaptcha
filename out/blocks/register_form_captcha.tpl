[{$smarty.block.parent}]
[{if $oViewConf->getTopActiveClassName() == "register"}]
    [{assign var="oConf" value=$oViewConf->getConfig()}]
    [{if $oConf->getConfigParam('tremendo_hcaptcha_sitekey')}]
        <div class="h-captcha" 
            data-sitekey="[{$oConf->getConfigParam('tremendo_hcaptcha_sitekey')}]"
            [{if $oConf->getConfigParam('tremendo_hcaptcha_darktheme')}] data-theme="dark"[{/if}]
            [{if $oConf->getConfigParam('tremendo_hcaptcha_compact')}] data-size="compact"[{/if}]>
        </div>
    [{/if}]
[{/if}]