# Mage2 Module ITDN SpecialOffer

    ``itdn/module-specialoffer``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Special Offer module

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/ITDN`
 - Enable the module by running `php bin/magento module:enable ITDN_SpecialOffer`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require itdn/module-specialoffer`
 - enable the module by running `php bin/magento module:enable ITDN_SpecialOffer`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications

 - API Endpoint
	- GET - ITDN\SpecialOffer\Api\SpecialOfferListManagementInterface > ITDN\SpecialOffer\Model\SpecialOfferListManagement

 - API Endpoint
	- POST - ITDN\SpecialOffer\Api\SpecialOfferManagementInterface > ITDN\SpecialOffer\Model\SpecialOfferManagement

 - API Endpoint
	- DELETE - ITDN\SpecialOffer\Api\SpecialOfferManagementInterface > ITDN\SpecialOffer\Model\SpecialOfferManagement

 - Model
	- SpecialOffer

 - Model
	- SpecialOfferGroup


## Attributes



