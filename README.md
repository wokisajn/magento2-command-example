# Magento 2 - CLI Command example module
 
## Overview
This module show how to simply add custom cli command to magento 2

## Compatibility
- Magento 2.1.x - 2.2.x

## Installation details
1. Run `composer require wokisajn/magento2-command-example`
2. Run `php bin/magento module:enable Training_Activities`
3. Run `bin/magento setup:upgrade`
4. Run `bin/magento clean:cache`

## How to use
1. In root directory type 'php bin/magento training:show_effect'

## Uninstall
1. Run `composer remove wokisajn/magento2-command-example`

## License
[MIT License](LICENSE)
