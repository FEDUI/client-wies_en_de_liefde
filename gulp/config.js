'use strict';

var gulp = require('gulp');
var $ = require('gulp-load-plugins')();

var config = {

    build: './src/',
    dist: './dist/',
    base: './dist/',
    taskPath: './gulp/tasks/',

    sass: {
        watch: ['src/sass/**/*.scss'],
        src: ['./src/sass/main.scss'],
        folder: 'css/',
        destFile: 'style.min.css'
    },

    img: {
        src: ['./src/img/**/*'],
        folder: 'img/'
    },

    js: {
        watch: ['src/js/**/*.js'],
        src: ['./src/js/main.js'],
        folder: 'js/',
        destFile: 'main.min.js'
    },

    error: function(error) {

        $.notify.onError({
            title: 'Gulp',
            message: 'Error: <%= error.message %>'
        })(error);
        this.emit('end');

    }
};

module.exports = config;
