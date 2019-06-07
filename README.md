# Koishi
Koishi is my attempt at building the least complicated method I could think of for manually building small websites by hand.

## What is it?
A ultra minimalist way of creating simple (mostly HTML) websites by hand and a few files to guide you.

## What can it do?
Out of the box not a lot but with a little love in the form of plugins it can perform a few new tricks. To create a new plugin, just add a new directory with a name of your choosing to the plugins directory and create a new `plugin.php` file within. All you need to add now is some lovely code to that your new plugin. e.g. `plugins/years_since/plugin.php`

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
    
## Why?
As much as I enjoyed using static content generators such as Jekyll I was always forgetting how to use them as I update my sites infrequently. One thing I never forget how to use however, is HTML/CSS. I'm weird and I enjoy authoring HTML by hand so I set about trying to make a website with HTML/CSS alone like I used to back in the 90's! It wasn't long before the need to include a scripting language arose (PHP - since it runs on most servers) but I used as little of it as possible. Only the bare minimum required for me to build my HTML website [chriskempson.com](http://chriskempson.com).

## Get up and running
You can preview your site with PHP-CLI's inbuilt webserver by running `php -S 0.0.0.0:8000 -t public` or run the included file `./serve.sh`. Next point your browser at http://127.0.0.1:8000. Now you are free to create whatever you like, however you see fit. Koishi is more of a way of doing something rather then a predefined structure.
