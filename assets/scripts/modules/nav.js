class Nav {

	constructor() {

	}

	init() {
		console.info( 'nav.js initialized' );
	}

	hamburger_animate(element)
	{
		this.element = element
		// Look for .hamburger
	  	let hamburger = document.querySelector(element);
		// On click
	  	hamburger.addEventListener("click", function() {
	    	// Toggle class "is-active"
	    	hamburger.classList.toggle("is-active");
	    	// Do something else, like open/close menu
	  	});
	}
	primary(trigger,element){
		this.trigger = trigger;
		this.element = element;
		let navTrigger = document.querySelectorAll(trigger);
		let nav = document.querySelectorAll(element);
		navTrigger.forEach(function(trigger) {
			trigger.addEventListener("click", function(e){
				e.preventDefault();
				nav.forEach(function(menu) {
					menu.classList.toggle("hidden");
				})
			});
		})
	}
	sub_menu(element){
		this.element = element;
		let navSubMenus = document.querySelectorAll(element);
		navSubMenus.forEach(function(menu) {
			menu.querySelector('a').addEventListener("click", function(e){
				e.preventDefault();
				menu.querySelector(".sub-menu").classList.toggle("hidden");
			});
		})
	}


}

export default Nav;