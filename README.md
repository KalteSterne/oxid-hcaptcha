# hCaptcha module for OXID eShop
[![MIT license](https://img.shields.io/badge/License-MIT-blue.svg)](https://lbesson.mit-license.org/) [![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://GitHub.com/Naereen/StrapDown.js/graphs/commit-activity)


Stop more bots. Start protecting user privacy. This module adds [hCaptcha](https://www.hcaptcha.com) to forms in OXID eShop.
#  Requirements
- OXID >= 6
- PHP >= 7.0

# Installation
To install the module run the following command from the root directory of your OXID installation.
```console
composer require tremendo/hcaptcha
```

# Activation
After installing the module, you need to activate it, either via OXID eShop admin or CLI.
```console
./bin/oe-console oe:module:activate tremendo_hcaptcha
```
# Configuration
## Basic settings
### Site key and secret
Visit [hcaptcha.com](https://www.hcaptcha.com) and register for free. You will recieve a site key and a secret. Enter both in the modules's settings page. 
### Language
If you want to use a specific language for the widget, you can enter a [language code](https://docs.hcaptcha.com/languages) here. Leave this field empty to auto dectect the user's language.
### Google reCaptcha compatibility
Whether or not to insert window.grecaptcha compatibility hook.
## Appearance
Choose the widget's theme (light or dark) and display mode (normal, compact or invisible) here.
## Callbacks
If you want to use your own handlers for the events the widgets fires, you can activate them here.

*Before* you do this please make a copy of the file ```src/js/hcaptcha_callbacks.dist.js``` and rename 
it to ```hcaptchta_callbacks.js``` so future updates of this module will not override your changes.
# Content-Security-Policy Settings
If you use CSP add ```https://hcaptcha.com``` and ```https://*.hcaptcha.com``` to ```script-src```, ```frame-src```, ```style-src``` and ```connect-src```.
# License
This module is licensed under the [MIT License](./LICENSE.md).