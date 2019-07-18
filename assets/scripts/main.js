//Import Libraries
//import $ from 'jquery';
import Vue from 'vue';
import { store } from './store';
import domReady from '@wordpress/dom-ready';
import objectFitImages from 'object-fit-images';

// Import polyfills
import './polyfill.js';
require('es6-promise').polyfill();

// Import custom modules
import App from'./modules/app.js';
import Nav from'./modules/nav.js';

// Import custom components
import Posts from './components/Posts.vue';


//Initiate Classes Here
const app = new App();
const nav = new Nav();


// Run Class Based Scripts Here
domReady( function() {
//do something after DOM loads.
  nav.init();

  if (document.querySelector('.js-hamburger')){
    nav.hamburger_animate(".js-hamburger");
  }

  if (document.querySelector('.js-navigation')){
    nav.primary(".js-trigger-navigation",".js-navigation");
  }

  if (document.querySelector('.menu-item-has-children')){
    nav.sub_menu(".menu-item-has-children");
  }

  if (document.querySelector('.js-accordion')){
    app.accordion(".js-accordion",".js-accordion-heading",".js-accordion-content");
  }

  objectFitImages();

  if (IeVersion < 12 ){
    app.smoothScroll();
  }

  if (document.getElementById('appPosts')){
    const appPosts = new Vue({ 
        el: '#appPosts',
        store: store,
        components: {
          Posts
        }
    });
  }

} );