module.exports = function(grunt) {
	grunt.initConfig({
		sass: {
			dist: {
				files: {
					'assets/css/style.css': `assets/scss/style.scss`
				}
			}
		},
		csslint: {
			strict: {
				options: {
					import: 2,
					ids: false,
					'duplicate-properties': 2,
					'empty-rule': 2,

				},
				src: ['assets/css/style.css', 'assets/scss/style.scss']
			}
		},
		cssmin: {
			target: {
				files: [{
					expand: true,
					cwd: `assets/css/`,
					src: [`style.css`, `!style.min.css`],
					dest: `assets/css/`,
					ext: `.min.css`
				}]
			}
		},
		uglify: {
			my_target: {
				files: {
					'assets/js/script.min.js': [`assets/js/script.js`]
				},
				options: {
					esversion: 6
				}
			}
		},
		jshint: {
			files: [`assets/js/script.js`, `!assets/js/script.min.js`],
			options: {
				esversion: 6
			}
		},
		watch: {
			js: {
				files: [`assets/js/script.js`, `!assets/js/script.min.js`],
				tasks: [`jshint`, `uglify`]
			},
			sass: {
				files: [`assets/scss/*.scss`],
				tasks: [`sass`]
			},
			cssmin: {
				files: [`assets/css/style.css`, `!assets/css/style.min.css`],
				tasks: [`cssmin`, 'csslint']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-csslint');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify-es');

	grunt.registerTask('default', ['watch']);
}
