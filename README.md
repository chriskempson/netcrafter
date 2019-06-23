# ![Netcrafter](public/netcrafter.gif)
Fire up your single-core 500Mhz CPU, double-click on your entirely legal copy of Frontpage/Dreamweaver and lovingly craft your small part of the Internet with finger generated HTML!

Netcrafter is a ~~way of life~~ way of building websites that unashamedly slaps you in the face with HTML. Netcrafter is made possible by a scripting language quickly gaining traction on the World Wide Web known as PHP. With Netcrafter you'll be churning out radical websites before the dot-com bubble has even burst!

**Scientific Fact:** Netcrafter is lighter than air and fits inside a [single PHP file](https://github.com/chriskempson/netcrafter/blob/master/netcrafter.php) measuring just a few KBs ~~heavy~~ light!

## Up and running before your dial-up has time to sync!
Shove this up in your CLI

    git clone git@github.com:chriskempson/netcrafter.git my-new-website
    ./serve-website.sh

Point a modern browser (e.g. Netscape Navigator, IE) at http://localhost:8000

## The lowdown
A ultra minimalist way of creating simple websites by hand. Essentially the core philosophy of Netcrafter boils down to this:

- Partials - Reusable small HTML snippets (a la SSI)
- Meta Data - Describe attributes of your HTML pages
- Plugins - Power up your HTML
- Directories - Uses real directories!
- Static HTML - Generate purity

### Partials
Partials are little snippets of HTML you can reuse across multiple pages just like your friend SSI.

```html
    <?= partial('navigation') ?> 
```
### Meta
You can add meta data to your HTML pages with... meta tags.

```html
    <meta name="date" content="2015-10-21">
```

You can get meta data for the current html page anywhere in your site with:

```html
    <?= meta('date') ?>
```

Or grab all available meta data as an array with:

```html
    <?= meta() ?>
```

You might also want to grab meta data for another file:

```html
    <?= meta_from_file('about.php', 'date') ?>
```

Or grab all available meta as an array with:

```html
    <?= meta_from_file('about.php') ?>
```

### Plugins
Plugins are simple to use in any of your HTML pages:
```html
   <?= years_since('1985') >
```

### Directories
Want to add a new page? Just add a new directory with an index.php inside it.

An example directory structure might look like:

    website
    | partials/
      | - html.php
      | - footer.php
      | - header.php
      | - navigation.php
    | plugins/
      | years-since/
        | - plugin.php
    | publc/
      | about/
        | - index.php
      | - index.php
      | - styles.css
    ! - webcrafter.php

An example HTML page might look like:
```html
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

    <title>Netcrafter</title>
    
    <?php partial('header') ?>
    
    <h1>Welcome</h1>
    
    <p>You are surfing the information highway!</p>
    
    <?php partial('footer') ?>
```

### Static HTML
Generate static html and check for broken internal links with:

    ./generate_static.sh

This will export a static version of your website to a `static` directory. You can now ssh, rsync, ftp, telnet your site up your server.

Why not get a huge 1GB of ad-free hosting by grabbing a free account at [Neocities](https://neocities.org) and adding the following to the `./generate_static.sh` script

    neocities push $STATIC_DIR

## Writing Plugins
To create a new plugin, just add a new directory with a name of your choosing to the plugins directory and create a new `plugin.php` file within. All you need to add now is some lovely code to your shiney new plugin. e.g. `plugins/years_since/plugin.php`.

```php
<?php 
/**
* Returns a string containing the number of years since a given date
* e.g. <?= years_since('1985') ?>
*
* @param string $string Text to be converted to a date
*
* @return string 
*/
function years_since($date) {
    $date = date('Ymd', strtotime($date));
    $diff = date('Ymd') - $date;
    return substr($diff, 0, -4);
}
```

## What the Netcrafter?
I used a few static content generators but I was always forgetting the commands required to do simple things like add a new page. I just wanted to author an HTML website and didn't care for learning about the nuances of a static content generator. So I built a very simple consisting of a single PHP file and a couple of scripts weighing in at a few KBs.

Initially I set about trying to make a website with HTML/CSS alone like I used to back in the 90's but it wasn't long before the need to include a scripting language arose (PHP - since it runs on most toasters). However, I tried to use as little PHP as possible in order to build my website [chriskempson.com](http://chriskempson.com).

Get crafting!
