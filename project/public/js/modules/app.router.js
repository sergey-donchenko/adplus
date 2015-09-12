define([
	'jquery',
	'backbone'	
], function ($, Backbone) {
	'use strict';

	var AppRouter = Backbone.Router.extend({
		routes: {
			'': 'getDefaultPage'			
		},

		/**
		 * Get default page
		*/
		getDefaultPage: function (param) {
			console.log('Handle the default PAge!!!!');
		}
	});

	return AppRouter;
});