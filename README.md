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

	Configure::write('Cart.models.User', 'AppUser');

## Support

For support and feature request, please visit the FileStorage issue page

https://github.com/burzum/Cart/issues

## License

Copyright 2012, Florian Krämer

Licensed under The MIT License
Redistributions of files must retain the above copyright notice.