import $ from 'jquery';
import { Controller } from 'scrollmagic';
//import Barba from 'barba.js';

/*   Components    */
import '../navigation';
import Home from '../home';
import Company from '../company';
import StickyNav from '../sticky-nav';
import Parallax from '../parallax';
import Navigation from '../navigation';
import SectionNext from '../section-next';
import Loader from '../loader';
//import { HollisTransition } from './transition';

$(document).ready( () => {

	new Loader();
	//$('.loader').css({display: 'none'});

	new Navigation();

	var pageController = new Controller();
	if( $('.home').length > 0) {
		new Home().init();
	}

	if( $('.company').length > 0) {
		new Company();
	}
	
	if( $('#sticky-nav').length > 0) {
		var stickyNav = new StickyNav(pageController);
		stickyNav.init();
	}

	if( $('.sectionNext').length > 0) {
		new SectionNext();
	}

	new Parallax(pageController);
	//home.hello();



	// Barba.Pjax.start();
	// Barba.Pjax.getTransition = function() {
	// 	return HollisTransition;
	// };
});