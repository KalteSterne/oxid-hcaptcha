[{assign var="oConf" value=$oViewConf->getConfig()}]
[{if $oConf->getConfigParam('tremendo_hcaptcha_sitekey')}]
    <div class="h-captcha" id="tremendo_hcaptcha"></div>
[{/if}]