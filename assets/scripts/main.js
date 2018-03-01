const $ = jQuery;
import 'bootstrap';

// Import custom modules
import App from'./modules/app.js';
import Hamburgers from'./modules/hamburgers.js';


const app = new App();

const hamburgers = new Hamburgers();
hamburgers.click(".hamburger")