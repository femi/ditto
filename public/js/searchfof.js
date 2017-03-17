console.log("running searchfof.js");

function setupFofSearch() {
    console.log("running setupFofSearch");
    $('#fofsearch').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();

        // find result div in another way
        fofResult = $( "#fofresult");

        //fofResultDropdown = $( "#fofresult");
        console.log(fofResult);

        if(term.length){
            $.post("/php/friends/backend-search-fof.php", {query: term}).done(function(data){
                // Display the returned data in browser
                if(data.length == 0) {
                    data = "No friends of friends found matching <b>" + term + "</b>";
                }

                fofResult.html(data);
                fofResult.show();
            });
        } else{
            fofResult.empty();
            fofResult.hide();
        }
    });

}

//
// function setupUserSearch() {
//     console.log("running setupUserSearch");
//     $('#usersearch').on("keyup input", function(){
//         /* Get input value on change */
//         var term = $(this).val();
//
//         // find result div in another way
//         userResultDropdown = $( "#userresult");
//         console.log(userResultDropdown);
//
//         if(term.length){
//             $.post("/php/friends/backend-search-user.php", {query: term}).done(function(data){
//                 // Display the returned data in browser
//                 if(data.length == 0) {
//                     data = "No users found matching <b>" + term + "</b>";
//                 }
//
//                 userResultDropdown.html(data);
//                 userResultDropdown.show();
//             });
//         } else{
//             userResultDropdown.empty();
//             userResultDropdown.hide();
//         }
//     });
//
//     // Set search input value on click of result item
//     $(document).on("click", "#userresult p", function(){
//         console.log($(this).text());
//         $(this).parents(".control").find('input[type="text"]').val($(this).text());
//         userResultDropdown.empty();
//         userResultDropdown.hide();
//     });
// }
