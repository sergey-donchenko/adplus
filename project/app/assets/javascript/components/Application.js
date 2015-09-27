/**
 * Define the adPlusExchange object to work with dynamic and static data
 * 
 * @project AdPlus
 * 
 */
var adPlusExchange = (function() {
    var instance = null;

    /**
     * Create singleton object 
     */
    function createObject() {
        var config = {
            Lang: {},
            Modules: {},
            App: null, // we set this object dynamically 
            comp_form_login: 'user-login-form'
        };

        return {
            /**
             * Init the CmonExchange with the set of variables
             */
            init: function(object) {
                config = jQuery.extend(config, object);

                // debug information
                console.log(config);
            },

            /**
             * Return config item with key "item"
             * 
             * @param <string> item - string identifier foe the setting property
             * @param <mixed>  defValue - default value for the setting item if it was not found
             *
             * @return < null | mixed >
             */
            get: function(item, defValue) {
                if (config.hasOwnProperty(item)) {
                    return config[item];
                } else
                if (defValue) {
                    return defValue;
                }

                return null;
            },

            /**
             * Set the value for the config item OR create if it was not created previously
             *
             * @param <string> item - string identifier foe the setting property
             * @param <mixed>  value - value for the setting
             *
             * @return < instance object >
             */
            set: function(item, value) {
                config[item] = value;

                return instance;
            },

            /**
             * Wrapper for the object to work with URL
             *
             */
            History: {

                /**
                 * Take a current URL and replace it with a new one
                 *
                 * @param <string> url - part of the string that should be replaced with the current state
                 * @param <string> title - new title
                 *
                 */
                replace: function(url, title) {
                    var state = {
                        "thisIsOnPopState": true
                    };

                    window.history.pushState(state, title, url);
                }
            },

            /**
             * Handle the Modules in the system
             *
             */
            Module: {
                /**
                 * Retrieve the module by its name
                 *
                 * @param <string> module - name of a module for retrieving...
                 *
                 * @return <object>
                 */
                get: function(module) {
                    if (window.hasOwnProperty(module)) {
                        return window[module];
                    }

                    return {
                        init: function() {
                            console.log('ERROR: Module "' + module + '" was not found in the system!');
                        }
                    }
                }
            },

            /**
             * The internal Ajax implementation
             */
            Ajax: {

                get: function(url, params) {
                    return jQuery.ajax({
                        'url': url
                    });
                },

                post: function() {

                }
            },

            /**
             * Form validation
             *
             * @return (true | false) is the form valid?
             */
            validate: function(form) {
                var validationResults = regula.validate(),
                    index = 0,
                    element = null,
                    errors = [];

                for (index in validationResults) {
                    element = validationResults[index];

                    if (element) {
                        if (element.failingElements.length > 0) {
                            this.fieldError(element.failingElements[0], element.message);
                        }
                        errors.push(element);
                    }
                }

                if (errors.length > 0) {
                    return false;
                }

                return true;
            },

            /**
             * Submit form to the Backend 
             *
             * @return @return Promise object
             */
            submit: function(form) {
                var data = jQuery(form).serialize(),
                    url = jQuery(form).attr("action"),
                    posting = jQuery.post(url, {
                        formData: data
                    });

                return posting;
            },

            /**
             * Handle the error for the particular field
             *
             * @param <object> field - handled element
             * @param <string> message  - the text of the error
             * 
             * @return <object> - return the current object
             */
            fieldError: function(field, message) {

                if (field) {
                    jQuery(field)
                        .unbind('keypress')
                        .bind('keypress', function() {
                            jQuery(this).parents('.form-group')
                                .removeClass('error')
                                .find('.error-inline')
                                .html('');
                        }).parents('.form-group')
                        .addClass('error')
                        .find('.error-inline')
                        .html(message);
                }

                return this;
            },

            /**
             * Show notifications in Dialog
             *
             * @param <string> title - dialog title
             * @param <string> message - the dialog body
             * @param <string> type - the dialog type
             *   - success
             *   - error
             *   - info
             *   - warning
             */
            showMessage: function(title, message, type, hideTheRespPopup) {
                var sModalId = 'modalNotification',
                    sClass = '',
                    sIcon = '';

                // Hide all previously opened dialogs
                if (hideTheRespPopup === true) {
                    jQuery('.modal').modal('hide');
                }


                if (title) {
                    jQuery('#' + sModalId).find('.modal-title')
                        .html(title);
                }

                switch (type) {
                    case 'success':
                        sClass = 'alert-success';
                        sIcon = 'glyphicon-ok-sign';
                        break;
                    case 'info':
                        sClass = 'alert-info';
                        sIcon = 'glyphicon-info-sign';
                        break;
                    case 'error':
                        sClass = 'alert-danger';
                        sIcon = 'glyphicon-exclamation-sign';
                        break;
                    default:
                        sClass = 'alert-warning';
                        sIcon = 'glyphicon-warning-sign';

                }

                message = '<div class="alert ' + sClass + '" role="alert">'
                    //+ '<span class="glyphicon ' + sIcon + '" aria-hidden="true"></span>'
                    + message + '</div>';


                if (message) {
                    jQuery('#' + sModalId).find('.modal-body')
                        .html(message);
                }

                jQuery('#' + sModalId).modal();

                return this;
            },

            /**
             * Redirect to the URL
             */
            toUrl: function(url, timeout) {
                if (url) {

                    if (!timeout) {
                        timeout = 0;
                    }

                    setTimeout(function() {
                        window.location.href = url;
                    }, timeout);

                }

                return this;
            },

            /**
             * 
             */
            loadingAffect: function(component) {
                if (jQuery.isEmptyObject(component)) {
                    return false;
                }

                component.css({
                    'display': 'block',
                    'opacity': 0.7,
                    'z-index': 1040,
                    // 'background-color': '#000',
                    'width': jQuery(component).width(),
                    'height': jQuery(component).height()
                });

                jQuery(component).find('.modal-backdrop').each(function() {
                    //
                    jQuery(this).css({
                        'height': jQuery(component).height() - 100
                    });
                });

            }
        }
    }

    return {
        /**
         * Create object instance OR check if it was created previously 
         * and return singleton instance
         *
         * @return <object>
         */
        getInstance: function() {

            if (!instance) {
                instance = new createObject();

                if (instance) {
                    jQuery.get("/app/settings", function(response) {

                        if (response && response.status) {
                            instance.set('App', response.data);
                        }

                    });
                }
            }

            return instance;
        }
    }
})(window);