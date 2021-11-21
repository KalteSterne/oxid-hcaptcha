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
    'version'      => '0.2',
    'author'       => 'Jan Loeper',
    'email'        => 'kalte_sterne@arcor.de',
    'url'          => 'https://github.com/KalteSterne/oxid-hcaptcha',
    'blocks' => [
        [
            'template' => 'layout/base.tpl',
            'block' => 'base_js', 
            'file' => 'Application/views/blocks/hcaptcha_base_js.tpl', 
            'position' => '7'
        ],
        [
            'template' => 'form/contact.tpl',
            'block' => 'captcha_form',
            'file' => 'Application/views/blocks/contact_form_captcha.tpl'
        ],
        [
            'template' => 'form/newsletter.tpl',
            'block' => 'newsletter_form_button',
            'file' => 'Application/views/blocks/newsletter_form_captcha.tpl'
        ],
        [
            'template' => 'form/fieldset/user_billing.tpl',
            'block' => 'form_user_billing_country',
            'file' => 'Application/views/blocks/register_form_captcha.tpl'
        ],
        [
            'template' => 'form/suggest.tpl',
            'block' => 'captcha_form',
            'file' => 'Application/views/blocks/suggest_form_captcha.tpl'
        ]
    ],
    'templates' => [
        'tremendohcaptcha/captcha.tpl' => 'tremendo/hcaptcha/Application/views/tpl/captcha.tpl' 
    ],
    'extend' => [
        \OxidEsales\Eshop\Application\Controller\ContactController::class => \Tremendo\Hcaptcha\Controller\ContactController::class,
        \OxidEsales\Eshop\Application\Controller\NewsletterController::class => \Tremendo\Hcaptcha\Controller\NewsletterController::class,
        \OxidEsales\Eshop\Application\Component\UserComponent::class => \Tremendo\Hcaptcha\Component\UserComponent::class,
        \OxidEsales\Eshop\Application\Controller\SuggestController::class => \Tremendo\Hcaptcha\Controller\SuggestController::class
    ],
    'settings' => [
        [
            'group' => 'tremendo_hcaptcha_main',
            'name' => 'tremendo_hcaptcha_sitekey',
            'type' => 'str',
            'value' => ''
        ],
        [
            'group' => 'tremendo_hcaptcha_main',
            'name' => 'tremendo_hcaptcha_secret',
            'type' => 'str',
            'value' => ''
        ],
        [
            'group' => 'tremendo_hcaptcha_main',
            'name' => 'tremendo_hcaptcha_locale',
            'type' => 'str',
            'value' => ''
        ],
        [
            'group' => 'tremendo_hcaptcha_main',
            'name' => 'tremendo_hcaptcha_recaptchacompat',
            'type' => 'bool',
            'value' => 'true'
        ],
        [
            'group' => 'tremendo_hcaptcha_appearance',
            'name' => 'tremendo_hcaptcha_theme',
            'type' => 'select',
            'value' => 'light',
            'constraints' => 'light|dark'
        ],
        [
            'group' => 'tremendo_hcaptcha_appearance',
            'name' => 'tremendo_hcaptcha_size',
            'type' => 'select',
            'value' => 'normal',
            'constraints' => 'normal|compact|invisible'
        ],
        [
            'group' => 'tremendo_hcaptcha_appearance',
            'name' => 'tremendo_hcaptcha_privacy_terms',
            'type' => 'bool',
            'value' => 'true'
        ],
        [
            'group' => 'tremendo_hcaptcha_callbacks',
            'name' => 'tremendo_hcaptcha_callback_success',
            'type' => 'bool',
            'value' => 'false'
        ],
        [
            'group' => 'tremendo_hcaptcha_callbacks',
            'name' => 'tremendo_hcaptcha_callback_error',
            'type' => 'bool',
            'value' => 'false'
        ],
        [
            'group' => 'tremendo_hcaptcha_callbacks',
            'name' => 'tremendo_hcaptcha_callback_open',
            'type' => 'bool',
            'value' => 'false'
        ],
        [
            'group' => 'tremendo_hcaptcha_callbacks',
            'name' => 'tremendo_hcaptcha_callback_close',
            'type' => 'bool',
            'value' => 'false'
        ],
        [
            'group' => 'tremendo_hcaptcha_callbacks',
            'name' => 'tremendo_hcaptcha_callback_responseexpired',
            'type' => 'bool',
            'value' => 'false'
        ],
        [
            'group' => 'tremendo_hcaptcha_callbacks',
            'name' => 'tremendo_hcaptcha_callback_challengeexpired',
            'type' => 'bool',
            'value' => 'false'
        ],
    ],
    'events' => [
        'onActivate' => '\Tremendo\Hcaptcha\Core\Events::onActivate()',
        'onDeactivate' => '\Tremendo\Hcaptcha\Core\Events::onDeactivate()' 
    ],
    'controllers'  => [

    ]
];
