/* global twentyseventeenScreenReaderText */
(function( $ ) {


  $(document).ready(function(){
    $(".toogleClass a").click(function(){
      $(".toogleClass a").toggleClass("showMore");
    });
  });

	$(document).ready(function(){
		$(".mobileMenu ul").addClass("scrollMenu"); 

		$('.teamSlider > .elementor-widget-wrap').slick({
			slidesToShow: 1,
			infinite: false,
			slidesToScroll: 1,      
			arrows:false,
			centerMode: true,
      responsive: [
        {
          breakpoint: 1279,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1            
          }
        },
        {
          breakpoint: 1023,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1            
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1            
          }
        },
        {
          breakpoint: 735,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1            
          }
        },
        {
          breakpoint: 666,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 639,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]      
		});


		

		/* team accordian */
		jQuery(".teamAccordion .eael-accordion-header").click(function(){

			jQuery(".teamAccordion .eael-accordion-header").removeClass('show');
			jQuery(".teamAccordion .eael-accordion-header").removeClass('active');
			jQuery(".teamAccordion .eael-accordion-content").hide();
		
			jQuery(this).addClass('show');
			jQuery(this).addClass('active');
		
			jQuery(this).parent().find(".eael-accordion-content").show();
	
		})


		jQuery("html body").on( "keyup",".elementor-search-form input.elementor-search-form__input", function() {

			var search_str = jQuery(this).val();

			console.log(search_str);

            if(search_str != "" && !jQuery(".mainSearch form.elementor-search-form .elementor-search-form__container").hasClass("searching") ){

            	jQuery(".mainSearch form.elementor-search-form .elementor-search-form__container").append('<span class="reset-input">X</span>')
            	jQuery(".mainSearch form.elementor-search-form .elementor-search-form__container").addClass('searching');
                
            }

            if(search_str == ""){

				reset_search_form();
				
            }
			
		});

		jQuery("html body").on('click','.reset-input', function(){
			reset_search_form();

			// console.log("reset form");
			//          jQuery(".mainSearch form.elementor-search-form .elementor-search-form__container").removeClass('searching');

			//    jQuery(".mainSearch form.elementor-search-form").trigger("reset");

			//    jQuery(".mainSearch .elementor-search-form__container .reset-input").html( "" );
		
		})



		
	});

//   $(window).scroll(function() {    
//     var scroll = $(window).scrollTop();

//     if (scroll >= 10) {
//         $(".siteHeader").addClass("stickyHeader");
//     } else {
//         $(".siteHeader").removeClass("stickyHeader");
//     }
// });


	function reset_search_form(){
		console.log("reset form");

		jQuery(".mainSearch form.elementor-search-form .elementor-search-form__container").removeClass('searching');

	    jQuery(".mainSearch form.elementor-search-form").trigger("reset");

	    jQuery(".mainSearch .elementor-search-form__container span.reset-input").remove()
	}


$(document).ready(function() {
	$(".imapsMapObject").mouseenter(function() {
			$(this).find("p.imapsMapObjectth, polygon, circle, g").attr("fill", "#ff000");
	 });
	$(".imapsMapObject").mouseleave(function() {
			$(this).find("path, polygon, circle, g").attr("fill", "#ff000");
	 });



	 var lastScrollTop = 0;
		// element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
		window.addEventListener("scroll", function(){ // or window.addEventListener("scroll"....
		var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
	
		if (st > lastScrollTop){
			$(".siteHeader").addClass("stickyHeader");
			$(".siteHeader").removeClass("show");

		}else if(lastScrollTop <= 100){
			$(".siteHeader").removeClass("show");
		} else {
			$(".siteHeader").removeClass("stickyHeader");
			$(".siteHeader").addClass("show");


		}
		lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
}, false);
});



var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.querySelectorAll(".wantToBe span.wpcf7-form-control-wrap");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

jQuery("html body").on('wpcf7invalid','.wpcf7', function(){

setTimeout(() => {
  if(jQuery("select.wpcf7-form-control.wpcf7-select.wpcf7-validates-as-required").hasClass("wpcf7-not-valid")){
    //alert(1);
      jQuery(".select-selected").addClass("wpcf7-not-valid");
   }
  
}, 1000);
})



})( jQuery ); 


			