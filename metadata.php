<?php
/**
 * Metadata version
 */
$sMetadataVersion = '2.1';
/**
 * Module information
 */
$aModule = [
    'id'           => 'tremendo_hcaptcha',
    'title'        => 'hCaptcha Modul',
    'description'  => [
        'de' => 'Bots raus. Datenschutz rein. Ein datenschutzfreundlicher Ersatz für reCAPTCHA.',
        'en' => 'Stop more bots. Start protecting user privacy. A replacment for reCAPTCHA.'
    ],
    'thumbnail'    => 'logo.png',
    'version'      => '0.1',
    'author'       => 'Jan Loeper',
    'email'        => 'kalte_sterne@arcor.de',
    'url'          => 'https://github.com/KalteSterne/oxid-hcaptcha',
    'controllers'  => [

    ],
    'templates' => [
        
    ],
    'blocks' => [
        [
            'template' => 'layout/base.tpl',
            'block' => 'base_js', 
            'file' => 'hcaptcha_base_js.tpl', 
            'position' => '7'
        ],
        [
            'template' => 'form/contact.tpl',
            'block' => 'captcha_form',
            'file' => 'contact_form_captcha.tpl'
        ],
        [
            'template' => 'form/newsletter.tpl',
            'block' => 'newsletter_form_button',
            'file' => 'newsletter_form_captcha.tpl'
        ],
        [
            'template' => 'form/fieldset/user_billing.tpl',
            'block' => 'form_user_billing_country',
            'file' => 'register_form_captcha.tpl'
        ],
        [
            'template' => 'form/suggest.tpl',
            'block' => 'captcha_form',
            'file' => 'suggest_form_captcha.tpl'
        ]
    ],
    'extend' => [
        \OxidEsales\Eshop\Application\Controller\ContactController::class => \Tremendo\Hcaptcha\Controller\ContactController::class,
        \OxidEsales\Eshop\Application\Controller\NewsletterController::class => \Tremendo\Hcaptcha\Controller\NewsletterController::class,
        \OxidEsales\Eshop\Application\Component\UserComponent::class => \Tremendo\Hcaptcha\Component\UserComponent::class,
        \OxidEsales\Eshop\Application\Controller\SuggestController::class => \Tremendo\Hcaptcha\Controller\SuggestController::class,

    ],
    'smartyPluginDirectories' => [
        
    ],
    'settings' => [
        [
            'group' => 'tremendo_hcaptcha_main',
            'name' => 'tremendo_hcaptcha_sitekey',
            'type' => 'str',
            'value' => 'c493f8b2-0e19-4e14-a3d3-c4da0c44af3c'
        ],
        [
            'group' => 'tremendo_hcaptcha_main',
            'name' => 'tremendo_hcaptcha_secret',
            'type' => 'str',
            'value' => '0x3135eEb7E987610441C36c8a5Ff858247A85b9f0'
        ],
        [
            'group' => 'tremendo_hcaptcha_main',
            'name' => 'tremendo_hcaptcha_darktheme',
            'type' => 'bool',
            'value' => 'false'
        ],
        [
            'group' => 'tremendo_hcaptcha_main',
            'name' => 'tremendo_hcaptcha_compact',
            'type' => 'bool',
            'value' => 'false'
        ],
    ],
    'events' => [
        'onActivate' => '\Tremendo\Hcaptcha\Core\Events::onActivate()',
        'onDeactivate' => '\Tremendo\Hcaptcha\Core\Events::onDeactivate()' 
    ]
];
