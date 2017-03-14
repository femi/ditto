console.log("running comments.js");

function setupSearch() {
    console.log("running setupSearch");
    $('.control input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();

        // find result div in another way
        resultDropdown = $( "#result");
        console.log(resultDropdown);

        if(term.length){
            // $.post("/php/home/backend-search-blog.php", {query: term}).done(function(data){  remove -blog for friend name search
            $.post("/php/home/backend-search-blogs.php", {query: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
                resultDropdown.show();
            });
        } else{
            resultDropdown.empty();
            resultDropdown.hide();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", "#result p", function(){
        console.log($(this).text());
        $(this).parents(".control").find('input[type="text"]').val($(this).text());
        resultDropdown.empty();
        resultDropdown.hide();
    });
}

function retrieveUserBlogs(blogUserId) {
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           document.getElementById("ajaxResult").innerHTML = this.responseText;
         } else if (this.status == 400) {
           document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
         } else {
           document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
         }
       };
     };
     //gets the values from the page
     console.log(blogUserId);
     var querystring = "blogUserId=" + blogUserId;
     xmlhttp.open("POST", "../../php/blogs/userblogs.php", true);
     //xmlhttp.open("POST", "../../php/blogs/echovars.php", true);
     //Send the proper header information along with the request
     // POST DOESN'T WORK WITHOUT THIS
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);
}
function deleteComment(commentId) {
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           // remove the commnet from the
           var elem = document.getElementById(`c_${commentId}`);
           elem.parentNode.removeChild(elem);
         } else if (this.status == 400) {
           document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
         } else {
           document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
         }
       };
     };
     //gets the values from the page
     //console.log(userId);
     var querystring = "commentId=" + commentId;
     xmlhttp.open("POST", "/delete_comment.php", true);
     //xmlhttp.open("POST", "../../php/blogs/echovars.php", true);
     //Send the proper header information along with the request
     // POST DOESN'T WORK WITHOUT THIS
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);
}
function addComment(blogId, userId, message) {
  console.log("addComment has been triggered")
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           document.getElementById("ajaxResult").innerHTML = this.responseText;
         } else if (this.status == 400) {
           document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
         } else {
           document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
         }
       };
     };
     //gets the values from the page
     //console.log(userId);
     var querystring = "blogId=" + blogId + "&userId=" + userId + "&message=" + message;
     xmlhttp.open("POST", "../../php/blogs/add_comment.php", true);
     //Send the proper header information along with the request
     // POST DOESN'T WORK WITHOUT THIS
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);
}

function deleteBlog(blogId) {
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           // remove the commnet from the
           var elem = document.getElementById(`b_${blogId}`);
           elem.parentNode.removeChild(elem);
         } else if (this.status == 400) {
           document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
         } else {
           document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
         }
       };
     };
     //gets the values from the page
     //console.log(userId);
     var querystring = "blogId=" + blogId;
     xmlhttp.open("POST", "/delete_blog.php", true);
     //xmlhttp.open("POST", "../../php/blogs/echovars.php", true);
     //Send the proper header information along with the request
     // POST DOESN'T WORK WITHOUT THIS
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);

}

// setupSearch();

function updatePrivacy() {
   var elem = document.getElementById('privacy');
   var privacy = elem.options[elem.selectedIndex].value
   var xmlhttp = new XMLHttpRequest();
   var querystring = "privacy=" + privacy;
   xmlhttp.open("POST", "/update_privacy.php", true);
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   console.log(querystring);
   xmlhttp.send(querystring);
}

// delete a circle
function deleteCircle(circleId) {
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           // remove the commnet from the
           var elem = document.getElementById(`ci_${circleId}`);
           elem.parentNode.removeChild(elem);
         } else if (this.status == 400) {
           document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
         } else {
           document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
         }
       };
     };

     var querystring = "circleId=" + circleId;
     xmlhttp.open("POST", "circles/deleteCircle", true);
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);
}

// delete a circle user
function deleteCircleUser(userId, circleId) {
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           // remove the commnet from the
           var elem = document.getElementById(`cu_${userId}`);
           elem.parentNode.removeChild(elem);
           console.log(this.responseText);
         }
       };
     };

     var querystring = "userId=" + userId + "&circleId=" + circleId;
     xmlhttp.open("POST", `${circleId}/remove`, true);
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);
}
