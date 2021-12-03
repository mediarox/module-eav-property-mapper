### Description

Magento unfortunately **does not use a uniform name for the attribute properties**.
In some cases you have to use the short form and in others the long form.
As a result, **we have decided** to uniformly push **the long form**.

This finally led to this module, which makes it possible to use the long form for attribute properties when creating attributes.

### Installation
```bash
composer require mediarox/module-eav-property-mapper
bin/magento setup:upgrade
```