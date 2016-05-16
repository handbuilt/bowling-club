module.exports = function( grunt ) {

	'use strict';

	grunt.initConfig({

		pkg:    grunt.file.readJSON( 'package.json' ),

		grunticon: {
			retinaImg: {
					files: [{
						expand: true,
						cwd: 'assets/images/svg',
						src: ['*.svg'],
						dest: "assets/images/svg-fallback"
					}],
				options: {
					loadersnippet: "grunticon.loader.js",
					colors: {
						white: "#ffffff",
						black: "#000000",
					},
					cssprefix: "."
				}
			}
		},

		sass: {
			options: {
				sourceComments: false
			},
			compile: {
				files: {
					'themes/main-theme/assets/css/style.css' : 'themes/main-theme/assets/css/scss/style.scss'
				}
			}
		},

		postcss: {
			options: {
				processors: [
					require('autoprefixer')(),
				]
			},
			dist: {
				src: [
					'themes/main-theme/assets/css/*.css'
				]
			}
		}

	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-postcss');

	grunt.registerTask( 'default', [ 'styles' ] );
	grunt.registerTask( 'styles', [ 'sass', 'postcss' ] );

	grunt.util.linefeed = '\n';

}
