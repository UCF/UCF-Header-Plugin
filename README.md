# UCF Header Plugin #
Plugin to embed UCF University Header on top of Wordpress pages.


## Description ##
This plugin allow admin to easily add UCF University header to all UCF pages for a particular site.

Details on usage of the header and options available here:
http://universityheader.ucf.edu/

Details for the UCF Header is availble here:
https://github.com/UCF/UCF-Header

## Installation ##

### Manual Installation ###
1. Upload the plugin files (unzipped) to the `/wp-content/plugins` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the "Plugins" screen in WordPress
3. Configure plugin settings from the WordPress admin under "TODO".

### WP CLI Installation ###
1. `$ wp plugin install --activate https://github.com/UCF/WP-Header-Plugin/archive/master.zip` See [WP-CLI Docs](http://wp-cli.org/commands/plugin/install/) for more command options.
2. Configure plugin settings from the WordPress admin under "TODO".

## WP Options ##

Options for UCF Header Plugin is listed under "Settings"

### Responsiveness ###
To utilize a responsive bar, simply make sure your site's <head> includes the following <meta> tag:

`<meta name="viewport" content="width=device-width, initial-scale=1.0">`

### Bootstrap 2.x overrides ###
Due to the way that some older versions of the Bootstrap CSS framework apply left- and right-hand padding to elements at screen sizes less than 768px wide, a style override is necessary for sites using these versions of Bootstrap if they utilize responsive styles.

### For sites with a max-width greater than 1200px ###
A "use-1200-breakpoint" parameter can be added to display a wider version of the header.

## Changelog ##

### 1.0 ###
* Initial release

## Installation Requirements ##

None


## Development & Contributing ##

NOTE: this plugin's readme.md file is automatically generated.  Please only make modifications to the readme.txt file, and make sure the `gulp readme` command has been run before committing readme changes.
