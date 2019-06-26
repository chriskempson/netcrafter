# ![Netcrafter](public/netcrafter.gif)
Fire up your single-core 500Mhz CPU, double-click on your entirely legal copy of Frontpage/Dreamweaver, ready your GIFs, and lovingly craft your small part of the Internet with finger generated HTML and your new best friend Netcrafter.

Netcrafter is a ~~religious cult~~, ~~life-philosophy~~, way of building websites that unashamedly slaps you in the face with [HTML - the future of the Internet](https://blog.neocities.org/blog/2015/02/27/we-are-the-future.html). The magic of Netcrafter is made possible by a scripting language that has started to gain traction in today's World Wide Web known as [PHP](https://web.archive.org/web/20000301133004/http://php.net/) (Personal Home Page) language. With Netcrafter you'll be churning out cool websites before the dot-com bubble has even burst!

**Scientific Facts:** 
* Netcrafter is lighter than air and fits inside a [single PHP file](https://github.com/chriskempson/netcrafter/blob/master/netcrafter.php) less than 100 SLOC's long and takes up just a few KBs on your floppy disk!
* Depending of the nature of your ~~adult website~~ life modelling appreciation website, you'll hopefully have no need for PHP on your server of the webs. Just [generate static HTML](#generate-static-html) and be on your merry way to _server-side scripting-less nirvana&trade;_.
* Recent entirely-fabricated studies show, users of Netcrafter may have lower stress levels and may experience a boost in the production of endorphins. [<sup>1</sup>](#addendum)

## Up and running before your dial-up has time to sync!
Shove this in your post-PHP-CLI-installed terminal:

    git clone git@github.com:chriskempson/netcrafter.git my-first-website
    cd my-first-website
    ./serve-website.sh

Next, point a modern browser (e.g. Netscape Navigator, Internet Explorer) at http://localhost:8000. Now, marvel (in awestruck silence) at the breathtakingly stunning welcome page.

## The lowdown
A ultra minimalist way of creating the next generation of HTML/CSS/JS websites by hand. 
Essentially the core philosophy of Netcrafter boils down to this:

- Partials - Reusable, small HTML snippets (a la your old friend SSI)
- Meta Data - Attach and retrieve information to your HTML pages using \<meta\> tags!
- Plugins - Power up your HTML with quick and dirty PHP hacks
- Directories - Simply use real directories to structure your website
- Static HTML - Blazingly fast, next-gen static content generator called WGET

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

### Generate Static HTML
Generate static html and check for broken internal links with:

    ./generate_static.sh

Provided your box has wget installed (slap your wrist if it doesn't), this will export a static version of your website to a `static` directory. You can now ssh, rsync, ftp, telnet your site up your server.

Why not get a huge 1GB of ad-free hosting by grabbing a free account at [Neocities](https://neocities.org) and adding the following to the `./generate_static.sh` script

    neocities push $STATIC_DIR

## Writing Plugins
To create a new ~~quick and dirty PHP hack~~ beautifully authored plugin, just add a new directory with a name of your very own choosing to the plugins directory and create a new `plugin.php` file within. All you need to do now is add some lovely code to your shiny new plugin. e.g. a file called `plugins/years_since/plugin.php` might contain the following:

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
I used a few static content generators before but I was always forgetting the [tens](https://learn.cloudcannon.com/jekyll-cheat-sheet/) and [hundreds](https://gohugo.io/documentation/) of features, variables and commands and soon became tired of having to search through documentation. I just wanted to build an HTML website, I didn't care for learning about the varied nuances of a static content generator! So I ended up building my own consisting of a single PHP file and a couple of scripts weighing in at a few KBs. 

Initially I set about trying to make a website with HTML/CSS alone like I used to back in the 90's, even saying hello again to that old shady customer Mr. SSI. However, it wasn't long before I saw sense and decided to include a scripting language choosing PHP since it runs on all of my toasters (and my neighbours fridge, (and her neighbours kettle or so I'm told)). However, as HTML is the focus here and since I firmly believe that perfection is achieved not when there is nothing left to add, but when there is nothing left to take away, I tried to use as little PHP as  possible when building the thing that now powers my website [chriskempson.com](http://chriskempson.com).

For the past year or so I've been enjoying using what is now Netcrafter, or rather, I've been enjoying working on my HTML websites and not having to even think about the fact that I'm using Netcrafter. Now is perhaps the time to share my little creation in the hopes that other HTML lovers will find a place in their heart and their servers for Netcrafter.

Get Netcrafting! /end cheesy sign-off

---

### Addendum
<sup>1</sup> Although trends may have suggested that Netcrafter use may be addictive, it is important to gain a sense of perspective regarding this matter, therefore I would like to draw your attention to the fact that, as of yet, there have been no cases in which Netcrafter was proven to be a contributing factor to the death of an individual.