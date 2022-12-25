// let selectBrand = document.querySelector("#brand");
// let selectCat = document.querySelector("#cat");
// // let heading = document.querySelector(".right h2");
// // let container = document.querySelector("");
// // selectBrand.addEventListener("change", test);

// function changeBrand() {
//   // if (selectBrand.value !== "" && selectCat.value !== "") {
//   //   document.cookie = "id_cat=" + selectCat.value;
//   //   document.cookie = "id_bran=" + selectBrand.value;
//   //   // for (var i = 0; i < allCookies.length; i++) {
//   //   //   document.cookie =
//   //   //     allCookies[i] + "=;expires=" + new Date(0).toUTCString();
//   //   // }
//   // }
//   // if (selectBrand !== "" && selectCat !== "") {
//   // }
//   // let categoryName = this.value;
//   // heading.innerHTML = this[this.selectedIndex].text;
//   // let http = new XMLHttpRequest();
//   // http.open("POST", "script.php");
//   // http.setRequestHeader("content-type", "application/-www-form-urlencoded");
//   // http.send("category=" + categoryName);
// }

// $(document).ready(function () {
//   $("#brand").change(function () {
//     // var brandVal = $("#brand").val();
//     // $.post("createsalesreturns.php", {
//     //   id_brand: brandVal,
//     // });
//     console.log("tessssssssssssssssssssssssssst");
//   });
// });
function select() {
  // const xhr = new XMLHttpRequest();
  // // Initialize the request
  // xhr.open("POST", "createsalesreturns.php", true);
  // // Set content type
  // xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
  // // Send the request with data to post
  // xhr.send(
  //   JSON.stringify({
  //     name: "Jon Doe",
  //     username: "jon-doe",
  //     email: "jon-doe@unknown.com",
  //   })
  // );
  // console.log("response");
  // Fired once the request completes successfully
  // xhr.onload = function (e) {
  //   // Check if the request was a success
  //   if (this.readyState === XMLHttpRequest.DONE && this.status === 201) {
  //     // Get and convert the responseText into JSON
  //     var response = JSON.parse(xhr.responseText);
  //     console.log(response);
  //     console.log("response");
  //   }
  // };

  // Create and Send the request
  // var fetch_status;
  // fetch("createsalesreturns.php", {
  //   method: "GET",
  //   headers: {
  //     "Content-type": "application/json;charset=UTF-8",
  //   },
  // })
  //   .then(function (response) {
  //     // Save the response status in a variable to use later.
  //     fetch_status = response.status;
  //     // Handle success
  //     // eg. Convert the response to JSON and return
  //     return response.json();
  //   })
  //   .then(function (json) {
  //     // Check if the response were success
  //     if (fetch_status == 200) {
  //       // Use the converted JSON
  //       console.log(json);
  //     }
  //   })
  //   .catch(function (error) {
  //     // Catch errors
  //     console.log(error);
  //   });
  // var fetch_status;
  // fetch("https://jsonplaceholder.typicode.com/users", {
  //   method: "POST",
  //   // Set the headers
  //   headers: {
  //     Accept: "application/json",
  //     "Content-Type": "application/json",
  //   },
  //   // Set the post data
  //   body: JSON.stringify({
  //     name: "Jon Doe",
  //     username: "jon-doe",
  //     email: "jon-doe@unknown.com",
  //   }),
  // })
  //   .then(function (response) {
  //     // Save the response status in a variable to use later.
  //     fetch_status = response.status;
  //     // Handle success
  //     // eg. Convert the response to JSON and return
  //     return response.json();
  //   })
  //   .then(function (json) {
  //     // Check if the response were success
  //     if (fetch_status == 201) {
  //       // Use the converted JSON
  //       console.log(json);
  //     }
  //   })
  //   .catch(function (error) {
  //     // Catch errors
  //     console.log(error);
  //   });
  // jQuery:
  // $.ajax({
  //   method: "POST",
  //   dataType: "JSON",
  //   url: "https://jsonplaceholder.typicode.com/posts",
  //   data: { uploadData: "my jQuery payload" },
  //   success: function (data) {
  //     console.log(data);
  //   },
  // });

  // Vanilla:
  // fetch("https://jsonplaceholder.typicode.com/posts", {
  //   method: "POST",
  //   body: JSON.stringify({
  //     uploadData: "my Vanilla-JS payload",
  //   }),
  //   headers: { "Content-type": "application/json; charset=UTF-8" },
  // })
  //   .then((r) => r.json())
  //   .then((j) => console.log(j));

  // var x = document.getElementById(id).value;
  //alert(x);
  // $.ajax({
  //   type: "POST",
  //   url: "createsalesreturns.php",
  //   data: { name: "test" },
  //   success: function (data) {
  //     alert("success! X:" + data);
  //   },
  // });
  var http = new XMLHttpRequest();

  var data = "test";

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.body.innerHTML = this.response;
      // console.log(this.readyState, this.status);
    }
  };

  http.open("POST", "createsalesreturns.php", true);
  http.setRequestHeader("Content-Type", "application/json");
  http.send(JSON.stringify(data));

  // var variable = "value";

  // // Create an XMLHttpRequest object
  // var xhr = new XMLHttpRequest();

  // // Set the request method, URL, and asynchronous flag
  // xhr.open("POST", "createsalesreturns.php", true);

  // // Set the request header
  // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // // Send the request with the variable as a parameter
  // xhr.send("variable=" + variable);

  // // Wait for the response from the server
  // xhr.onload = function () {
  //   if (xhr.status === 200) {
  //     // Do something with the response from the server
  //     console.log("success");
  //   }
  // };
  // fetch("createsalesreturns.php", {
  //   method: "POST",
  //   headers: {
  //     "Content-Type": "application/x-www-form-urlencoded",
  //   },
  //   body: "data=Hello+World",
  // })
  //   .then((response) => response.text())
  //   .then((data) => {
  //     // This is the callback function. When the server responds, this function will be called.
  //     // You can do something with the response here, like display it on the page.
  //     console.log("success");
  //   });

  // var xhttp = new XMLHttpRequest();

  // // Set the callback function that will be called when the server responds
  // xhttp.onreadystatechange = function () {
  //   if (this.readyState == 4 && this.status == 200) {
  //     // This is the callback function. When the server responds, this function will be called.
  //     // You can do something with the response here, like display it on the page.
  //     console.log("success");
  //   }
  // };

  // // Send the request to the server
  // xhttp.open("POST", "createsalesreturns.php", true);
  // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // xhttp.send("data=Hello+World");
}
