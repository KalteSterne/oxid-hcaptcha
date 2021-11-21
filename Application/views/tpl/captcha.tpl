[{assign var="oConf" value=$oViewConf->getConfig()}]
[{if $oConf->getConfigParam('tremendo_hcaptcha_sitekey')}]
    <div class="h-captcha" id="tremendo_hcaptcha"></div>
[{/if}]
[{if $oConf->getConfigParam('tremendo_hcaptcha_size') == 'invisible' && $oConf->getConfigParam('tremendo_hcaptcha_privacy_terms')}]
    <p class="tremendo_hcaptcha_privacy_terms">[{oxmultilang ident="TREMENDO_HCAPTCHA_PRIVACY_TERMS"}]</p>
[{/if}]