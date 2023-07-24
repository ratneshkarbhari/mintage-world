window.onscroll = function () {
  myFunction();
};
var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("fixed-menu");
  } else {
    header.classList.remove("fixed-menu");
  }
}

const button = document.getElementById("search");
const buttonPressed = (e) => {
  e.target.classList.toggle("active");
};
button.addEventListener("click", buttonPressed);

// mobile menu open script start
let MobileMenu = document.getElementById("MobileMenu"),
  MobileMenuButton = document.getElementById("MobileMenuButton"),
  IconClose = document.getElementById("IconClose"),
  CloseBg = document.getElementById("CloseBg");

let MobileMenuToggle = () => {
  if (MobileMenu.className === "active") {
    MobileMenu.className = "";
    let listItems1 = document.querySelectorAll(".dd-toggle");
    listItems1.forEach(function (item) {
      item.parentNode.className = "has-sub";
    });
  } else {
    MobileMenu.className = "active";
  }
};

MobileMenuButton.addEventListener("click", MobileMenuToggle);
IconClose.addEventListener("click", MobileMenuToggle);
CloseBg.addEventListener("click", MobileMenuToggle);

// mobile menu open script end

// mobile menu dropdown open script start

let listItems = document.querySelectorAll(".dd-toggle");
listItems.forEach(function (item) {
  item.onclick = function (e) {
    if (this.parentNode.className === "has-sub active") {
      this.parentNode.className = "has-sub";
    } else {
      this.parentNode.className = "has-sub active";
    }
  };
});

// mobile menu dropdown open script end

// search box start
let searchBox = document.getElementById("searchbox"),
  footerSearch = document.getElementById("footerSearch"),
  searchInput = document.getElementById("search-input"),
  searchClose = document.getElementById("searchbox-close"),
  searchLink = document.getElementById("search"),
  searchCloseP = document.getElementById("searchCloseP");

let searchToggle = () => {
    if (searchBox.className === "show") {
      searchBox.className = "hide";
      searchCloseP.className = "hide";
      searchLink.className = "";
      searchInput.value = "";
      searchInput.blur();
    } else {
      searchBox.className = "show";
      searchCloseP.className = "show";
      searchLink.className = "active";
      searchInput.focus();
    }
  },
  searchEnter = () => {
    if (event.keyCode == 13) {
      searchToggle();
    }
  };

searchLink.addEventListener("click", searchToggle);
footerSearch.addEventListener("click", searchToggle);
searchClose.addEventListener("click", searchToggle);
searchCloseP.addEventListener("click", searchToggle);
searchInput.addEventListener("keyup", searchEnter);

// image zoom js start
let ImgZoom = document.querySelectorAll(".zoom");
ImgZoom.forEach(function (item) {
  item.addEventListener("mousemove", function (e) {    
    var zoomer = e.currentTarget;
    e.offsetX ? (offsetX = e.offsetX) : (offsetX = e.touches[0].pageX);
    e.offsetY ? (offsetY = e.offsetY) : (offsetX = e.touches[0].pageX);
    x = (offsetX / zoomer.offsetWidth) * 100;
    y = (offsetY / zoomer.offsetHeight) * 100;
    zoomer.style.backgroundPosition = x + "% " + y + "%";
  });
});

  // filter js start 
  // let InfoFilter = document.getElementById("InfoFilter");
  // let CategoryMenu = document.getElementById("CategoryMenu");
  // let CatClose = document.getElementById("CatClose");
  // let Filter = () => {  
  //   if (CategoryMenu.className === "category-menu fixed-menu") {
  //     CategoryMenu.className = "category-menu"; 
  //   } 
  //   else {
  //     CategoryMenu.className = "category-menu fixed-menu"; 
  //   }
  // };
  // InfoFilter.addEventListener("click", Filter);
  // CatClose.addEventListener("click", Filter);
 // filter js End 