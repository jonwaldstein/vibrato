//Import Libraries
import $ from 'jquery';
import Vue from 'vue';
import { store } from './store';

// Import custom modules
import App from'./modules/app.js';

// Import custom components
import Posts from './components/Posts.vue';


//Initiate Classes Here
const app = new App();


// Run Class Based Scripts Here
function run() {

  app.init();
  app.hamburger(".js-hamburger");
  app.navigation(".js-trigger-navigation",".js-navigation");
  app.navigation_sub_menu(".menu-item-has-children");

  if (document.getElementById('#appPosts')){
    const appPosts = new Vue({ 
        el: '#appPosts',
        store: store,
        components: {
          Posts
        }
    });
  }

}


// in case the document is already rendered
if (document.readyState!='loading') run();
// modern browsers
else if (document.addEventListener) document.addEventListener('DOMContentLoaded', run);
// IE <= 8
else document.attachEvent('onreadystatechange', function(){
    if (document.readyState=='complete') run();
});