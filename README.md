# **Magento2 Structured Data**
**This module implements a simple version of product strcutured data useful for SEO**

<br>

**Google strcutured data reference documentation:**
https://developers.google.com/search/docs/appearance/structured-data/product?hl=en

<br>

## **Installation**
Clone this repo into your Magento 2 project in `/app/code` folder.

## **After Installation**
Run

    bin/magento setup:upgrade
    bin/magento setup:di:compile
    bin/magento cache: flush


Enable the new module

    bin/magento module:enable Wiktor_StructuredData


Make sure the new module is enabled

    bin/magento module:status


<br>
Compatible with Magento 2.1.x, 2.2.x, 2.3.x and 2.4.x