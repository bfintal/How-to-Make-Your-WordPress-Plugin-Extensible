# How-to-Make-Your-WordPress-Plugin-Extensible
Example code from the "How to Make Your WordPress Plugin Extensible" article in Smashing Magazine

## Usage

Download the 3 plugin files into your `wp-content/plugins` folder (not in a live website, do this in a sandbox site).

## The Code / Example Plugins

#### [non-extensible-example.php](https://github.com/bfintal/How-to-Make-Your-WordPress-Plugin-Extensible/blob/master/non-extensible-example.php)

A typical example of a non-extensible plugin. Activate this to get an "Example Widget" in your list of widgets. Add that in a sidebar and it will show a list of 3 blog titles.

#### [extensible-example.php](https://github.com/bfintal/How-to-Make-Your-WordPress-Plugin-Extensible/blob/master/extensible-example.php)

The example plugin modified to become extensible. Same as above, provides the example widget.

#### [usage-example.php](https://github.com/bfintal/How-to-Make-Your-WordPress-Plugin-Extensible/blob/master/usage-example.php)

An example of a third-party plugin that uses the hooks defined in our `extensible-example.php`.

If you have this activated with `extensible-example.php`, then the plugin will be modified, and the widget will display 3 WooCommerce products instead of the 3 blog post titles.

If you have this activated with `non-extensible-example.php`, then this plugin won't do anything.
