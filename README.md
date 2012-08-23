# CakePHP Cart Plugin #

http://github.com/burzum/cart

A CakePHP shopping cart plugin with an interface for different payment providers

The cart plugin is a stand alone cart only plugin, no payment processors are included you'll have to write them or get them from somewhere else.

The shopping cart part of this plugin is finished but needs to be polished. There callbacks for many things in place that give you customization possibilities.

I'm looking for help to complete this plugin. If you're interested please send me a message on github and fork it.

## Requirements

 * CakePHP 2.x

Optional for some report / search features in the admin backend:

 * CakeDC Search Plugin for CakePHP https://github.com/cakedc/search

## Parts of the Plugin explained 

Features done:

 * CartManager - handles the cart, adding and removing items from it
 * Allow/deny anonymous checkouts

Work in progress:

 * The checkout process is functional but is a topic of change until I'm happy with it. Actually I've got checkout with Paypal working.

Planed features:

 * Tax Rules
 * Discount Rules

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

This plugin is still in early development, feel free to help fixing and contributing to it, there is no form of bug or feature support yet.