import SmoothScroll from 'smooth-scroll';

class App {

	constructor() {

	}

	init() {
		console.info( 'app.js initialized' );
	}

	detectIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
      // IE 10 or older => return version number
      return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
      // IE 11 => return version number
      var rv = ua.indexOf('rv:');
      return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
      // Edge (IE 12+) => return version number
      return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    // other browser
    return false;
  }

	smoothScroll(){
		let allLinks = document.querySelectorAll('a');
			let allLinksArray = Array.from(allLinks, (item) => {
			item.addEventListener('click',function(){
				let scroll = new SmoothScroll('a[href*="#"]',{
						// History
    				updateURL: true, // Update the URL on scroll
    				popstate: true, // Animate scrolling with the forward/backward browser buttons (requires updateURL to be true)
				});
			});
		});
	}

	accordion(container,heading,content)
  {
    this.container = container;
    this.heading = heading;
    this.content = content;
    // Look for .hamburger
    let accordions = document.querySelectorAll(container);
    // On click
    accordions.forEach(function(accordion){
      accordion.querySelector(heading).addEventListener("click", function() {
        // Toggle class "is-active"
        let accordionHeading = accordion.querySelector(heading);
        let accordionContent = accordion.querySelector(content);
        accordion.classList.toggle("is-active");
        accordionHeading.classList.toggle("is-active");
        accordionContent.classList.toggle("is-active");

        if (accordionContent.style.maxHeight){
          accordionContent.style.maxHeight = null;
        } else {
          accordionContent.style.maxHeight = `${accordionContent.scrollHeight}px`;
        } 
      });
    })
  }


}

export default App;