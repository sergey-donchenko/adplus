define([
	'jquery',
	'backbone'	
], function ($, Backbone) {
	'use strict';

	var categoryRouter = Backbone.Router.extend({
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

	return categoryRouter;
});