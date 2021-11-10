[{$smarty.block.parent}]
[{if $oViewConf->getTopActiveClassName() == "register"}]
    [{include file="tremendohcaptcha/captcha.tpl"}]
[{/if}]