import Barba from 'barba.js';
//import $ from 'jquery';
import {TweenLite, TimelineMax} from 'gsap';

// class HollisTransition extends BaseTransition {
	
// 	start() {
		
// 		Promise
//       .all([this.newContainerLoading, this.fadeOut()])
//       .then(this.fadeIn.bind(this));
// 	}

// 	fadeOut() {
		
// 		TweenLite.to(this.oldContainer, 1, {autoAlpha: 0});
// 	}

// 	fadeIn() {
		
// 		var _this = this;
// 		TweenLite.set(this.oldContainer, {display: 'none'});
// 		TweenLite.set(this.newContainer, {
// 			visibility: 'visible', 
// 			autoAlpha: 0
// 		});

// 		let tl = new TimelineMax({onComplete: _this.done})
// 			.to(this.newContainer, 1, {
// 				autoAlpha: 1
// 			});

//     return tl;
// 	}
// }

// export default HollisTransition;

export var HollisTransition = Barba.BaseTransition.extend({
   start: function() {
    /**
     * This function is automatically called as soon the Transition starts
     * this.newContainerLoading is a Promise for the loading of the new container
     * (Barba.js also comes with an handy Promise polyfill!)
     */

    // As soon the loading is finished and the old page is faded out, let's fade the new page
    Promise
      .all([this.newContainerLoading, this.fadeOut()])
      .then(this.fadeIn.bind(this));
  },

  fadeOut: function() {
    /**
     * this.oldContainer is the HTMLElement of the old Container
     */

    TweenLite.to(this.oldContainer, 1, {autoAlpha: 0});

    //return $(this.oldContainer).animate({ opacity: 0 }).promise();
    return;
  },

  fadeIn: function() {
    // *
    //  * this.newContainer is the HTMLElement of the new Container
    //  * At this stage newContainer is on the DOM (inside our #barba-container and with visibility: hidden)
    //  * Please note, newContainer is available just after newContainerLoading is resolved!
     

    var _this = this;
    //var $el = $(this.newContainer);

    //$(this.oldContainer).hide();
    TweenLite.set(this.oldContainer, {display: 'none'});
		TweenLite.set(this.newContainer, {
			visibility: 'visible', 
			autoAlpha: 0
		});
    // $el.css({
    //   visibility : 'visible',
    //   opacity : 0
    // });

    // $el.animate({ opacity: 1 }, 400, function() {
    //   *
    //    * Do not forget to call .done() as soon your transition is finished!
    //    * .done() will automatically remove from the DOM the old Container
       

    //   _this.done();
    // });

    let tl = new TimelineMax({onComplete: _this.done})
			.to(this.newContainer, 1, {
				autoAlpha: 1
			});

    return tl;
  }
});

