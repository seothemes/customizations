# Customizations

Contains site specific custom code.

## Description

The purpose of this plugin is to enable users to safely update child themes without losing customizations made to the child theme. Since WordPress doesn\'t support grandchild themes (for good reason), this is one way to allow users to add custom PHP, CSS and JavaScript that won\'t be overwritten if a child theme is updated.

## Installation

1. Go to Plugins > Add New.
2. Type in the name of the WordPress Plugin or descriptive keyword, author, or tag in Search Plugins box or click a tag link below the screen.
3. Find the WordPress Plugin you wish to install.
4. Click Details for more information about the Plugin and instructions you may wish to print or save to help setup the Plugin.
5. Click Install Now to install the WordPress Plugin.
6. The resulting installation screen will list the installation as successful or note any problems during the install.
7. If successful, click Activate Plugin to activate it, or Return to Plugin Installer for further actions.

## Custom Functions

Place any custom PHP in the `custom-functions.php` file.

This file is loaded on the `after_setup_theme` hook so most theme functions will work.

To load more custom PHP files, add the file path and name to the `customizations_add_functions` function list in customization.php, e.g:

```php
$files = array(
	'custom-functions',
	'more-custom-functions',
);
``` 

This will automatically load all files in the array.

## Custom Templates

Custom templates should be added to the **templates** directory as well as the
list of templates inside the `customizations_add_templates` function, e.g:

```php
$custom_templates = array(
	'custom-template.php'         => 'Custom Template',
	'another-custom-template.php' => 'Another Custom Template',
);
```

## Custom Scripts

Custom JavaScript should be placed in the **custom-scripts.css** file. There is an example function provided in this file.

## Custom Styles

Any custom CSS should be placed in **custom-styles.css**.
