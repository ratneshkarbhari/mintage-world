
  //  console.log('hi');
   let InfoFilter = document.getElementById("InfoFilter");
   let CategoryMenu = document.getElementById("CategoryMenu");
   let CatClose = document.getElementById("CatClose");
   let Filter = () => { 

     if (CategoryMenu.className === "category-menu fixed-menu") {
       CategoryMenu.className = "category-menu"; 
     } 
     else {
       CategoryMenu.className = "category-menu fixed-menu"; 
     }
   };
   InfoFilter.addEventListener("click", Filter);
   CatClose.addEventListener("click", Filter);
  