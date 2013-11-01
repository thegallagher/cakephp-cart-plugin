# CakePHP Cart Plugin #

http://github.com/burzum/cart

A CakePHP shopping cart plugin with an interface for different payment providers

The cart plugin is a stand alone cart only plugin, no payment processors are included you'll have to write them or get them from somewhere else.

The shopping cart part of this plugin is finished but needs to be polished. There callbacks for many things in place that give you customization possibilities.

Consider this as still in development.

## Requirements

 * CakePHP 2.x
 * Payments Plugin https://github.com/burzum/Payments
 * Search Plugin https://github.com/cakedc/search

The cart is using the Payments plugin, or more accurate, payment processors built on top of it.

## Parts of the Plugin explained 

Features done:

 * CartManager - handles the cart, adding and removing items from it
 * Allow/deny anonymous checkouts

### Cart Manager Component

The Cart Manager is a component thought to capture post and get requests to a specified action, by default "buy" and add the result of this to the cart.

The Session, Cookie and Database Storage of the Cart Manager is pretty much decoupled.

### List of Events

List of events that are triggered in this plugin

	Cart.applyDiscounts
	Cart.applyTaxRules
	Cart.afterCalculateCart
	CartManager.beforeAddItem
	CartManager.afterAddItem
	CartManager.beforeRemoveItem
	CartManager.afterRemoveItem
	Order.beforeCreateOrder
	Order.created

### Sample Application

There is a sample application that will demonstrate how to use the cart plugin.

	http://github.com/burzum/CartSampleApp

Check it out, clone the application, run migrations, access the app. It already has a sample user and some sample items. Read the instructions of the plugin.

## Setup

	cd YOUR-APP-FOLDER
	git submodule add git://github.com/burzum/Cart.git Plugin/Cart
	git submodule add git://github.com/cakedc/search.git Plugin/Search
	git submodule update --init

If you do not want to add it as submodule just clone it instead of doing submodule add

	git clone git://github.com/burzum/Cart.git

If you use another user model class in your application other than User you'll need to configure the plugin to use that model:

```php
Configure::write('Cart.models.User', 'AppUser');
```

## How it works

When an user is not logged in the all cart items will be added to the session.

When the user logins in the session gets merged with the users currently active cart. If not cart was present in the database before it is created.

For a logged in user the cart session data is always kept in sync with the database to preserve the items when the user comes back later.

The CartManager will deal with all of this and make sure that items get added to the session and the configured cart model and the associated cart items table.

## How to do I extend or modify the cart?

There two ways to modify the cart, depending on the kind of changes one might be better than the other one for your case.

You can simply do regular OOP an inherit the plugin classes on application level or you fork the plugin on github and do your modifications in your fork.

It is highly recommended that if you fork it you do your changes in a branch and do not work in master or develop so that you can do easy pull request and it is easier for yourself to compare the branches then and to do merges from the original repository.

## Support

For support and feature request, please visit the FileStorage issue page

https://github.com/burzum/Cart/issues

## License

Copyright 2012, Florian Krämer

Licensed under The MIT License
Redistributions of files must retain the above copyright notice.