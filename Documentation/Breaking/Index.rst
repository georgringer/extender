.. include:: ../Includes.txt

.. _breaking-change:

===============
Breaking change
===============


Change of extending configuration in 10.0.0
-------------------------------------------

Description
___________

Since version 10.0.0 the registration happens in services.yaml


Impact
______

All class extending in ext_localconf.php needs to be replaced and converted


Migration
_________

Migrate configuration from array to yaml.

:: before ext_localconf.php

    $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['base_extension']['extender'][
        \Fixture\BaseExtension\Domain\Model\Blob::class
    ]['extending_extension'] = 'EXT:extending_extension/Classes/Domain/Model/BlobExtend.php';


:: after Services.yaml

  Fixture\ExtendingExtension\Domain\Model\BlobExtend:
    tags:
      -
        name: 'extender.extends'
        class: Fixture\BaseExtension\Domain\Model\Blob


Change of extending configuration in 7.0.0
------------------------------------------

Description
___________

Since version 7.0.0 all usage of EXTCONF is replaced with EXTENSIONS.


Impact
______

All class extending still using EXTCONF to not work anymore. So the code still
fills the array but this array is not used anymore.


Affected Installations
______________________

All extensions that use EXTCONF in registration of class extending like.

::

	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['store_finder']['extender'][
		\Evoweb\StoreFinder\Domain\Model\Location::class
	]['sitepackage'] = 'EXT:sitepackage/Classes/Domain/Model/Location.php';


Migration
_________

Replace the usage of EXTCONF with EXTENSIONS to have the class extended again.
