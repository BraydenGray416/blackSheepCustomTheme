module.exports = function(grunt) {
	grunt.initConfig({
		sass: {
			dist: {
				files: {
					'assets/css/style.css': `assets/scss/style.scss`
				}
			}
		},
		cssmin: {
			target: {
				files: [{
					expand: true,
					cwd: `assets/css/`,
					src: [`*.css`, `!*.min.css`],
					dest: `assets/css/`,
					ext: `.min.css`
				}]
			}
		},
		uglify: {
			my_target: {
				files: {
					'assets/js/main.min.js': [`assets/js/main.js`]
				},
				options: {
					esversion: 6
				}
			}
		},
		jshint: {
			files: [`assets/js/*.js`, `!assets/js/*.min.js`],
			options: {
				esversion: 6
			}
		},
		watch: {
			js: {
				files: [`assets/js/*.js`, `!assets/js/*.min.js`],
				tasks: [`jshint`, `uglify`]
			},
			sass: {
				files: [`assets/scss/*.scss`],
				tasks: [`sass`]
			},
			cssmin: {
				files: [`assets/css/*.css`, `!assets/css/*.min.css`],
				tasks: [`cssmin`]
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify-es');

	grunt.registerTask('default', ['watch']);
}
