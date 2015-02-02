module.exports = function(grunt) {
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

        concat: {
        	options: {
		        separator: ';',
		    },  

		    dev : {
		    	src: ['./app/assets/javascript/frontend.js'],
		    	dest: './public/js/frontend.js',
		    },

		    dist: {
		        src: [		            		            
		            './bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
		            './app/assets/javascript/frontend.js'
		        ],
		        dest: './public/js/frontend.js',
		    },
        },

        copy: {
        	dist : {
        		files: [{
			        expand: true,
			        cwd: './bower_components/fontawesome/fonts',
			        src: ['**'],
			        dest: './public/fonts/'
			    }, {
			        expand: true,
			        cwd: './bower_components/bootstrap-sass-official/assets/fonts/bootstrap/',
			        src: ['**'],
			        dest: './public/fonts/'
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
			    }, {
			        expand: true,
			        cwd: './bower_components/jquery/dist/',
			        src: ['jquery.min.js'],
			        dest: './public/js/jquery'
			    }, {
			        expand: true,
			        cwd: './bower_components/dropzone/downloads/',
			        src: ['dropzone.min.js'],
			        dest: './public/js/'
			    }, {
			    	expand: true,
			        cwd: './bower_components/dropzone/downloads/css/',
			        src: ['dropzone.css'],
			        dest: './public/css/'
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
                    './public/css/styles.min.css': './app/assets/stylesheets/frontend.scss',
                }
            }
        },

 		uglify: {
        	dist: {
		        files: {
		          './public/js/frontend.js': './public/js/frontend.js',
		        }
		    }
        },

        phpunit: {
        	classes: {
        		dir: 'app/tests/'   //location of the tests
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
		            './app/assets/javascript/frontend.js'
		            ],   
		        tasks: ['concat:dist','uglify:dist'],     //tasks to run
		        options: {
		            livereload: true                      //reloads the browser
		        }
		    },

        	sass : {
        		files: ['./app/assets/stylesheets/*.scss'],  //watched files
		        tasks: ['sass:dev'],                          //tasks to run
		        options: {
		            livereload: true                        //reloads the browser
		        }
        	},

        	tests: {
		        files: ['app/controllers/*.php', 'app/models/*.php'],  //the task will run only when you save files in this location
		        tasks: ['phpunit']
		    }  
        }

    });
 	
 	// Plugin loading 	
 	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

 	// Task definition
 	grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['copy', 'sass:dist', 'concat:dist', 'uglify:dist', 'phpunit']);
};        