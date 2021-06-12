 <header>
     <nav x-data="{ mobileMenuOpen: false }" @keydown.window.escape="open = false" class="bg-gray-800">
         <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
             <div class="flex items-center justify-between h-16">
                 <!-- Logo -->
                 <div class="flex items-center">
                     <div class="flex-shrink-0">
                         <?php Vibrato\Theme::display_logo(); ?>
                     </div>
                 </div>

                 <!-- Desktop Navigation -->
                 <div class="hidden md:block">
                     <div class="ml-10 flex items-baseline space-x-4">
                         <?php Vibrato\Theme::display_navigation(Vibrato\ValueObjects\Menu::primary()->value, 'ml-10 flex items-baseline space-x-4'); ?>
                     </div>
                 </div>

                 <!-- Mobile Navigation Button -->
                 <div class="-mr-2 flex md:hidden">
                     <!-- Mobile menu button -->
                     <button @click="mobileMenuOpen = !mobileMenuOpen" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" x-bind:aria-expanded="open">
                         <span class="sr-only">Open main menu</span>
                         <svg :class="{ 'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" class="h-6 w-6 block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                         </svg>
                         <svg :class="{ 'hidden': !mobileMenuOpen, 'block': mobileMenuOpen }" class="h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                         </svg>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Mobile menu, toggle classes based on menu state. Open: "block", closed: "hidden" -->
         <div :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" class="md:hidden block">
             <?php Vibrato\Theme::display_navigation(Vibrato\ValueObjects\Menu::primary()->value, 'px-2 pt-2 pb-3 space-y-1 sm:px-3'); ?>
         </div>
     </nav>
 </header>
