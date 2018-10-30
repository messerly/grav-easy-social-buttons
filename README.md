# Easy Social Buttons Plugin 

The **Easy Social Buttons** Plugin is for [Grav CMS](http://github.com/getgrav/grav). 

This plugin allows you to add a string of buttons on the frontend pages.  
 

## Requirements

Not being afraid to add some code here and there.

## Installation

Installing the _Easy Social Buttons_ can be done in different ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred) **

The easiest way to install this plugin is via the [Grav Package Manager (GPM)](https://learn.getgrav.org/advanced/grav-gpm) 
through your system's terminal (also called the command line).  

From the root of your Grav install type:
```
bin/gpm install grav-easy-social-buttons
```

This will install the plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/easy-social-buttons`.

### Git clone ###

In the user/plugins folder of your site:
```
git clone https://github.com/enovision/grav-easy-social-buttons easy-social-buttons
```

### Manual Installation

To install this plugin, download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `grav-frontend-edit-button`. You can find these files on [GitHub](https://github.com/enovision/grav-easy-social-buttons) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

```
/your/site/grav/user/plugins/easy-social-buttons
```
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

After installation you can go to the configuration settings of the plugin to change the
presentation and networks that you want to present.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

##### Load Fontawesome from CDN?

default: No

If you are already have Fontawesome 5+ installed within your theme, then don't change
this option. Otherwise you might let this plugin load Fontawesome for you. It is however
only loading the `brands` and the `regular` css.

See the [Fontawesome](https://fontawesome.com/) website for more information.

##### Size of the button

Possible values:
* (large) Large
* (small) Small

##### Shape of the button

Possible values:
* (circle) Circle, round buttons
* (flat) Flat, square buttons

##### Networks

Default available:

* Facebook
* Twitter
* Google+
* LinkedIn
* Youtube
* Instagram
* Pinterest
* Snapchat Ghost
* Skype
* Android
* Dribble
* Vimeo
* Thumblr
* Vine
* Foursquare
* Mix (was Stumbleupon)'
* Flickr
* Yahoo
* Reddit
* RSS
* Email

## Usage

### How to configure a (new) network?

Networks are placed in the `easy-social-buttons.yaml` and in
the `blueprints.yaml`.

!Important
When adding a new or modifying an existing network after the plugin is already
active and in use, you have 2 options:

1. Delete the `config/plugins/easy-social-buttons.yaml` and 
start all over again with configuring.

2. Modify the `config/plugins/easy-social-buttons.yaml` directly.

Not all networks are configured yet. Let's take a sample of a
configured network:

mix, aka Stumbleupon
```yaml
mix:
  url: https://mix.com/add?url={url}
  label: Mix (was Stumbleupon)
  active: true
  icon: fab fa-mix
```
##### url
The template for the url of the networks share link

The url has some substitute variables:
* {url} - URL of the page
* {title} - Title of the page
* {twittername} - Twittername when Twitter

##### label
Name of the network, used as title when hovering the icon
##### active
Is this network active, as in is it configured.

Sample of a non-configured network:
```yaml
flickr:
  url: #
  label: Flickr
  active: false
```
Non-configured networks are ignored by the loop to present
the network icons.

##### icon

For the icons Fontawesome version 5+ is required. This is not installed 
by the plugin.

When the `icon` attribute is omitted, it will assume the network parent 
tag as value to be formatted to:

```
fab fa-flicker
```

### How to implement it in your theme?

You have to tell where you would like to have the social buttons to appear.

#### Twig

You could put this in the base.html.twig of your theme. You could also have your own
partial to present the social buttons.

```
{% if header.showSocial|defined(true) != false %}
   <div id="social-buttons-wrap">
      {% include 'partials/easy-social-buttons.html.twig' with {'url' : page.url} %}
   </div>
{% endif %}
```

#### Frontmatter

As you can see in the sample above, you could place in your page (admin) a frontmatter
option:

```
showSocial: false
```

In that case the social buttons will not show up on the page.

## Credits

* The amazing GRAV CMS Team for building such an amazing CMS.
