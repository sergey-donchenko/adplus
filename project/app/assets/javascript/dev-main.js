/*global require*/
'use strict';

// Require.js allows us to configure shortcut alias
require.config({
	
	shim: {
		underscore: {
			exports: '_'
		},

		backbone: {
			deps: [
				'underscore',
				'jquery'
			],
			exports: 'Backbone'
		},

		bootstrap: {
			deps: [
				'jquery',
				'regula'
			]
		}

		// backboneLocalstorage: {
		// 	deps: ['backbone'],
		// 	exports: 'Store'
		// }
	},

	paths: {
		jquery: 'vendors/jquery.min',
		//bootstrap: 'vendors/bootstrap.min',
		underscore: 'vendors/underscore-min',
		backbone: 'vendors/backbone-min',
		regula: 'vendors/regula-min',
		frontend: 'frontend'
		// backboneLocalstorage: '../node_modules/backbone.localstorage/backbone.localStorage',
		// text: '../node_modules/requirejs-text/text'
	}

});

require([
	'jquery',
	'frontend',
	'underscore',
	'backbone',	
	'modules/app.router'	
], function ( $, frontend, _, Backbone, AppRoute) {
	
	new AppRoute();

	Backbone.history.start();

	$('.dynamic-component').each(function(){
		var component = $(this).val();
	});

	console.log('Just for testing...!!!', $);

});