<h1 align="center">Magento 2 ZipCode check Plugin</h1>
  
Delivery area checking module (Compatible with M2.4.*):

# Requirements
    Minimum PHP 8.1  
    Maximum PHP 8.4  
    Magento minimum version: 2.4.4
    Magento maximum version: 2.4.8  

# Installation
#### Installing

In the command line, navigate to the installation directory of Magento2

Update your root Magento composer.json:
```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/ankushsantra/zipcodecheck.git"
        }
    ]
}
```
Enter the following commands:

```
composer require ankush/zipcodecheck:dev-main
php bin/magento setup:upgrade
php bin/magento cache:clean
```

The plugin is now installed
  

#### Update instructions

In the command line, navigate to the installation directory of Magento2

Enter the following commands:

```
composer update ankush/zipcodecheck -W
php bin/magento setup:upgrade
php bin/magento cache:clean
```

<img width="1454" height="320" alt="ziptest_admin" src="https://github.com/user-attachments/assets/0ab4d72e-6636-48d8-94d8-a3a4e5d58dd9" />
<img width="930" height="524" alt="ziptest_FE" src="https://github.com/user-attachments/assets/2bc07250-2176-4d69-8b69-07562b4672e8" />
