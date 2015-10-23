module.exports = function(grunt) {
    'use strict';

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        /**
         * Project banner
         */
        tag: {
            banner: '/*!\n' +
                ' * <%= pkg.name %>\n' +
                ' * <%= pkg.title %>\n' +
                ' * <%= pkg.url %>\n' +
                ' * @author <%= pkg.author %>\n' +
                ' * @version <%= pkg.version %>\n' +
                ' * Copyright <%= pkg.copyright %>. <%= pkg.license %> licensed.\n' +
                ' */\n'
        },

        browserify: {
            dist: {
                files: [{
                    './app/assets/build/app.js': ['./app/assets/javascripts/*.js']
                }],
                options: {
                    transform: ['coffeeify']
                }
            }
        },

        transpile: {
            main: {
                type: 'cjs', // or "amd" or "yui"
                files: [{
                    expand: true,
                    cwd: './app/assets/build/',
                    src: ['app.js'],
                    dest: './app/assets/build/es5/'
                }]
            }
        },

        concat: {
            options: {
                separator: ';',
            },

            dev: {
                src: ['./app/assets/javascript/frontend.js'],
                dest: './public/js/frontend.js',
            },

            dist: {
                src: [
                    // './bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
                    // './app/assets/javascript/components/Application.js', // Init the application
                    // './app/assets/javascript/components/**/*.js',
                    './app/assets/javascript/frontend.js'
                ],
                dest: './public/js/frontend.js',
            },
        },

        copy: {

        	dev: {
        		files: [
        			{
				    	expand: true,
				    	cwd: './app/assets/javascript/modules/',
				    	src: ['**'],
				    	dest: './public/js/modules'
				    }, {
				    	expand: true,
				    	cwd: './app/assets/javascript/',
				    	src: ['dev-main.js'],
				    	dest: './public/js/'				    	
				    }
        		]
        	},

            dist: {
                files: [{
                    expand: true,
                    cwd: './bower_components/fontawesome/fonts',
                    src: ['**'],
                    dest: './public/fonts/'
                }, {
                    expand: true,
                    cwd: './bower_components/bootstrap-sass-official/assets/fonts/bootstrap/',
                    src: ['**'],
                    dest: './public/fonts/bootstrap/'
                }, {
                    expand: true,
                    cwd: './bower_components/bootstrap-sass-official/assets/images/',
                    src: ['**'],
                    dest: './public/images/'
                }, {
                    expand: true,
                    cwd: './bower_components/flot/',
                    src: ['jquery.flot.js'],
                    dest: './public/js/jquery'
			    }, 

                {
                    expand: true,
                    cwd: './bower_components/bootstrap/dist/js/',
                    src: ['bootstrap-min.js'],
                    dest: './public/js/vendors'
                }, {
			        expand: true,
			        cwd: './node_modules/backbone/',
			        src: ['backbone-min.js'],
			        dest: './public/js/vendors'
                }, {
                    expand: true,
			        cwd: './node_modules/backbone/',
			        src: ['backbone-min.map'],
			        dest: './public/js/vendors'
			    },

			    {
			        expand: true,
			        cwd: './node_modules/backbone/node_modules/underscore/',
			        src: ['underscore-min.js'],
			        dest: './public/js/vendors'
			    }, {
			        expand: true,
			        cwd: './node_modules/backbone/node_modules/underscore/',
			        src: ['underscore-min.map'],
			        dest: './public/js/vendors'
			    },

			    {
			        expand: true,
                    cwd: './bower_components/jquery/dist/',
                    src: ['jquery.min.js'],
                    dest: './public/js/jquery'
                }, {
                    expand: true,
                    cwd: './bower_components/jquery/dist/',
                    src: ['jquery.min.map'],
                    dest: './public/js/jquery'
                }, {
                    expand: true,
                    cwd: './bower_components/regula/dist/',
                    src: ['regula-1.3.4.min.js'],
                    dest: './public/js/',
                    rename: function(dest, src) {
				        return dest + src.replace('-1.3.4', '');
				    }
			    },

			    // ================= // 
			    // END of require JS
			    // ================= //

			     {
                    expand: true,
                    cwd: './bower_components/dropzone/downloads/',
                    src: ['dropzone.min.js'],
                    dest: './public/js/'
                }, {
                    expand: true,
                    cwd: './bower_components/dropzone/downloads/css/',
                    src: ['dropzone.css'],
                    dest: './public/css/'
                }, {
                    expand: true,
                    cwd: './app/assets/javascript/',
                    src: ['easyTree.js'],
                    dest: './public/js/'
                }, {
                    expand: true,
                    cwd: './app/assets/javascript/',
                    src: ['admin.js'],
                    dest: './public/js/'
                }, {
                    expand: true,
                    cwd: './app/assets/stylesheets/',
                    src: ['ui.easytree.css'],
                    dest: './public/css/',
                    rename: function(dest) {
                        return dest + 'ui-easytree.css';
                    }
                }, {
                    expand: true,
                    cwd: './app/assets/stylesheets/skin-win8/',
                    src: ['**'],
                    dest: './public/images/tree-icons/'
                }]
            }
        },

        sass: {
            dev: {
                options: {
                    style: 'expanded',
                    banner: '<%= tag.banner %>',
                    compass: true
                },
                files: {
                    './public/css/styles.css': './app/assets/stylesheets/frontend.scss',
                }
            },

            dist: {
                options: {
                    style: 'compressed',
                    compass: true
                },
                files: {
                    './public/css/styles.css': './app/assets/stylesheets/frontend.scss',
                }
            }
        },

        requirejs: {
		    compile: {
			    options: {
			      mainConfigFile: './app/assets/javascript/build.js',
			      baseUrl: './app/assets/javascript',
			      name: "main",
			      include: ['build'],
			      out: './public/js/main.min.js'
			    }
		    }
		},

        uglify: {
            dist: {
                files: {
                    './public/js/frontend.js': [
                        './public/js/frontend.js',
                        //'./public/js/easyTree.js',
                        //'./public/js/admin.js',
                        './app/assets/javascript/build/es5/app.js'
                    ]
                }
            }
        },

        cssmin: {
            target: {
                options: {
                    sourceMap: true
                },
                files: [{
                    expand: true,
                    cwd: './public/css',
                    src: ['*.css', '!*.min.css'],
                    dest: './public/css',
                    ext: '.min.css'
                }]
            }
        },

        phpunit: {
            classes: {
                dir: 'app/tests/' //location of the tests
            },
            options: {
                bin: 'vendor/bin/phpunit',
                colors: true
            }
        },

        watch: {
            frontend: {
                files: [
                    //watched files
                    './bower_components/jquery/dist/jquery.js',
                    './bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
                    './app/assets/javascript/components/*.js',
                    './app/assets/javascript/frontend.js',
                    './app/assets/javascript/admin.js',
                ],
                tasks: ['concat:dist', 'copy', 'uglify:dist'], //tasks to run
                options: {
                    livereload: true //reloads the browser
                }
            },

            sass: {
                files: ['./app/assets/stylesheets/*.scss'], //watched files
                tasks: ['sass:dev', 'cssmin'], //tasks to run
                options: {
                    livereload: true //reloads the browser
                }
            },

            js: {
                files: './app/assets/javascript/modules/*.js',
                tasks: ['browserify', 'transpile', 'uglify'],
        		options: {
		            livereload: true                        //reloads the browser
		        }
            },

      //   	react: {
		    //     files: './app/assets/javascript/react_components/*.jsx',
		    //     tasks: ['browserify']
		    // },


            tests: {
                files: ['app/controllers/*.php', 'app/models/*.php'], //the task will run only when you save files in this location
                tasks: ['phpunit']
            }
        },

        // REMOVE FILES
        clean: {
            css: ['./public/css/*.css', '!./public/css/*.min.css'],
        	js: ['./public/js/modules/*.js']
        }       	
	});

    // Plugin loading 	
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    // Task definition
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['copy', 'sass:dist', 'concat:dist', 'browserify', 'transpile', 'uglify:dist', 'cssmin', 'clean', 'phpunit']);
};