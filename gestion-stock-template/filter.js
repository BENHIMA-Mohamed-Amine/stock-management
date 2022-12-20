let selectMenu = document.querySelector("#products");
let heading = document.querySelector(".right h2");
let container = document.querySelector("");
selectMenu.addEventListener("change", function () {
  let categoryName = this.value;
  heading.innerHTML = this[this.selectedIndex].text;
  let http = new XMLHttpRequest();
  http.open("POST", "script.php");
  http.setRequestHeader("content-type", "application/-www-form-urlencoded");
  http.send("category=" + categoryName);
});
