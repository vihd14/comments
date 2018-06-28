Anax comments
==================================

[![Build Status](https://travis-ci.org/vihd14/comments.svg?branch=master)](https://travis-ci.org/vihd14/comments)
[![Maintainability](https://api.codeclimate.com/v1/badges/4aa5ab01372d158d090f/maintainability)](https://codeclimate.com/github/vihd14/comments/maintainability)

Anax comments module.



Usage
------------------

Short examples on how to use the module `comments`.

* Install by running `composer require vihd14/comments`.
* Copy the files in `config/route` to your own route folder.
* Copy the content from `di.php` and `route.php` to add in your existing corresponding folders.
* Copy `database.php`, if you don't already have it.
* Copy `data/db.sqlite` for the database.
* Copy the `view` folder to get all views.

Lastly, add `"Vihd14\\": "src/"` to your composer.json under `autoload`.  
It should look something like this:

```
"autoload": {
    "psr-4": {
        "Anax\\": "src/",
        "Vihd14\\": "src/"
    }
}
```


License
------------------

This software carries a MIT license.



```
 .  
..:  Copyright (c) 2018 Viktoria Haapaoja (viktoria.haa@hotmail.com)
```
