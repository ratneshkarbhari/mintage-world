window.onscroll = function () {
    myFunction();
  };
  
  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("fixed-menu");
    } else {
      header.classList.remove("fixed-menu");
    }
  }
  

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

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

