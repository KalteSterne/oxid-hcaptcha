[{$smarty.block.parent}]
[{assign var="oConf" value=$oViewConf->getConfig()}]
[{if $oConf->getConfigParam('tremendo_hcaptcha_sitekey')}]
    <div class="h-captcha" data-sitekey="[{$oConf->getConfigParam('tremendo_hcaptcha_sitekey')}]"></div>
[{/if}]
