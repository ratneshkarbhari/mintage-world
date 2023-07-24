(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').css('top', '0px');
            $('.search-box-wrap').addClass('FixedSearchBox');
            $('#searchCloseP').addClass('fixed-search');           
            $('.header-wrap').addClass('fixed-menu');
        } else {
            $('.sticky-top').css('top', '48px');
            $('.search-box-wrap').removeClass('FixedSearchBox');
            $('#searchCloseP').removeClass('fixed-search');            
            $('.header-wrap').removeClass('fixed-menu');
        }
    });
    
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    }); 
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });

    // product carousel
    $(".product-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500, 
        margin:25,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive:{
            0:{
                items:2                
            },
            600:{
                items:3 
            },
            1024:{
                items:4
            },
            1200:{ 
                items:5 
            },
            1920:{ 
                items:7 
            }
        }
    });
    
})(jQuery);



// search box 
let searchBox = document.getElementById('searchbox'),
    footerSearch = document.getElementById('footerSearch'),
    searchInput = document.getElementById('search-input'),
    searchClose = document.getElementById('searchbox-close'),
    searchLink = document.getElementById('search'),
    searchCloseP = document.getElementById('searchCloseP');

let searchToggle = () => {
  if (searchBox.className === 'show') {
    searchBox.className = 'hide';
    searchCloseP.className = 'hide';
    searchLink.className = '';
    searchInput.value = '';
    searchInput.blur();
  } else {
    searchBox.className = 'show';
    searchCloseP.className = 'show';
    searchLink.className = 'active';
    searchInput.focus();
  }
}, searchEnter = () => {
    if (event.keyCode == 13) {
      searchToggle();
    }
};

searchLink.addEventListener('click', searchToggle);
footerSearch.addEventListener('click', searchToggle);
searchClose.addEventListener('click', searchToggle);
searchCloseP.addEventListener('click', searchToggle);
searchInput.addEventListener('keyup', searchEnter);

//searchToggle end();
   


// counter value

var counted = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (counted == 0 && $(window).scrollTop() > oTop) {
    $('.count').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    counted = 1;
  }

});
// counter value end

  //  filter js start
  if(document.getElementById("InfoFilter")){

    let InfoFilter = document.getElementById("InfoFilter");
    let CategoryMenu = document.getElementById("CategoryMenu");
    let CatClose = document.getElementById("CatClose");
    let Filter = () => { 
 
      if (CategoryMenu.className === "category-menu fixed-filter") {
        CategoryMenu.className = "category-menu"; 
      } 
      else {
        CategoryMenu.className = "category-menu fixed-filter"; 
      }
    };
    InfoFilter.addEventListener("click", Filter);
    CatClose.addEventListener("click", Filter);
   //  filter js End

  } 
