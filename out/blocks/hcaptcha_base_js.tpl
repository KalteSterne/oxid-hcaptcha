[{ $smarty.block.parent }]
[{assign var="oConf" value=$oView->getConfig()}]
[{assign var="ac" value=$oViewConf->getTopActiveClassName()}]

[{if $ac == "contact" || $ac == "newsletter" || $ac=="register" || $ac=="suggest"}]
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
[{/if}]