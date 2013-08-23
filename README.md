# Multi-Page Post Next and Numbers

WordPress plugin to display both Previous & Next links and numbers for multi-page post navigation.

## Description

The WP function `wp_link_pages()` allows an argument passed in of `next_or_number`. This sets whether the navigation for multi-page posts or other entries are displayed as _Previous page_ and _Next Page_ or as numbered pagination.

This plugin filters the output of that plugin and re-builds the output so that it displays both. If viewing page 1, the Previous link isn't shown. If viewing the last page, the Next link isn't shown. If the post is not a multi-page post (doesn't use `<!--nextpage-->`), then this plugin returns the default output (which is an empty string).

## Screenshots

![Screenshot of multi page post navigation showing named and numbered links](https://raw.github.com/GaryJones/multi-page-post-next-and-numbers/master/assets/screenshot-1.png)  
_Named and numbered links._

## Requirements
 * WordPress 3.1.0

## Installation

### Upload

1. Download the latest tagged archive (choose the "zip" option).
2. Go to the __Plugins -> Add New__ screen and click the __Upload__ tab.
3. Upload the zipped archive directly.
4. Go to the Plugins screen and click __Activate__.

### Manual

1. Download the latest tagged archive (choose the "zip" option).
2. Unzip the archive.
3. Copy the folder to your `/wp-content/plugins/` directory.
4. Go to the Plugins screen and click __Activate__.

Check out the Codex for more information about [installing plugins manually](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

### Git

Using git, browse to your `/wp-content/plugins/` directory and clone this repository:

`git clone git@github.com:GaryJones/multi-page-post-next-and-numbers.git`

Then go to your Plugins screen and click __Activate__.

## Usage

Just activate the plugin.

## Credits

Built by [Gary Jones](https://twitter.com/GaryJ)
Copyright 2013 [Gamajo Tech](http://gamajo.com/)
