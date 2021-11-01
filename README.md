# hCaptcha module for OXID eShop
[![MIT license](https://img.shields.io/badge/License-MIT-blue.svg)](https://lbesson.mit-license.org/) [![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://GitHub.com/Naereen/StrapDown.js/graphs/commit-activity)


Stop more bots. Start protecting user privacy. This module adds [hCaptcha](https://www.hcaptcha.com) to forms in OXID eShop.
##  Requirements
- OXID >= 6
- PHP >= 7.1

## Installation
To install the module run the following command from the root directory of your OXID installation.
```bash
composer require tremendo/hcaptcha
```

## Activation
After installing the module, you need to activate it, either via OXID eShop admin or CLI.
```bash
./bin/oe-console oe:module:activate tremendo_hcaptcha
```
## Configuration
Visit [hcaptcha.com](https://www.hcaptcha.com) and register for free. You will recieve a site key and a secret. Enter both in the modules's settings page. 

## License
This module is licensed under the [MIT License](./LICENSE).