module.exports = function(grunt) {

    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    // Project configuration.
    grunt.initConfig({

        // JSON Grunt Package
        pkg: grunt.file.readJSON('package.json'),

        // SASS config
        sass: {
            options: {
                loadPath: ['foundation/bower_components/foundation/scss/'],
                banner: '<%= tag.banner %>'
            },
            dev:{
                options: {
                    style: 'expanded'
                },
                files: {
                    'style.unprefixed.css': 'scss/app.scss'
                }  
            },
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'style.unprefixed.css': 'scss/app.scss'
                }        
            }
        },

        // What to watch, and what tasks to run
        watch: {
            options: {
                livereload: true,
            },
            grunt: { files: ['Gruntfile.js'] },

            sass: {
                files: 'scss/**/*.scss',
                tasks: ['sass:dist']
            },
            prefix:{
                files: 'style.unprefixed.css',
                tasks: ['autoprefixer']
            },
            livereload: {
                files: ['**/*.html', '**/*.php', 'img/**/*.{png,jpg,jpeg,gif,webp,svg}']
            },
            jshint: {
                files: 'js/scripts.js',
                tasks: ['jshint']
            }
        },

        // JS concatenation    
        concat: {   
            dist: {
               files:{
                'js/min/plugins.js' : ['js/plugins/jquery-1.11.0.js', 'js/plugins/foundation.js'],
                'js/min/main.js' : ['js/scripts.js','js/jquery.nivo.slider.js','js/jquery.fancybox.pack.js','js/jquery.fancybox.pack.js','js/jquery.carouFredSel.js']
               }
            }           
        },

        // JS uglification
        uglify: {
            dist:{
                files:{
                    'js/min/plugins.js' : 'js/min/plugins.js',
                    'js/min/main.js' : 'js/min/main.js'
                }
            }
        },

        // Tag to be used on css
        tag: {          
            banner: '/* \n' +
                'Theme Name: <%= pkg.title %>\n' + 
                'Theme URI: <%= pkg.url %>\n' +
                'Author: <%= pkg.author %>\n' +
                'Author URI: <%= pkg.url %>\n' +
                'Description: <%= pkg.description %>\n' +     
                '*/\n'       
        },     

        // Autoprefixer settings
        autoprefixer: {
            options:{
                browsers: ['last 10 version', 'ie 8', 'ie 9']
            },
            build:{
                src: 'style.unprefixed.css',
                dest: 'style.css'
            }
        },

        //  JS linting options
        jshint: {
            options: {
                curly: true,
                eqeqeq: true,
                eqnull: true,
                browser: true,
                globals: {
                    jQuery: true
                },
            },
            build: {
                options:{
                     curly: true,
                    eqeqeq: true,
                    eqnull: true,
                    browser: true,
                    globals: {
                        jQuery: true
                    },
                    reporter: require('jshint-junit-reporter'),
                    reporterOutput: "junit-output.xml"
                },
                src: [
                    'Gruntfile.js',
                    'js/scripts.js'
                ]
            },
            dev: [
                'Gruntfile.js',
                'js/scripts.js'
            ]
        },        

        // Grunt dev update
        devUpdate: {
            main: {
                options: {
                    // Report updated dependencies? 'false' | 'true'
                    reportUpdated: false,
                    // 'force'|'report'|'prompt'
                    updateType   : "force"
                }
            }
        },         
    });    
    
    // Workaround for force
    var previous_force_state = grunt.option("force");

    grunt.registerTask("force",function(set){
        if (set === "on") {
            grunt.option("force",true);
        }
        else if (set === "off") {
            grunt.option("force",false);
        }
        else if (set === "restore") {
            grunt.option("force",previous_force_state);
        }
    });

grunt.registerTask('default', ['sass:dist', 'autoprefixer', 'concat', 'uglify', 'watch']);

};