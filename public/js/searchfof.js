console.log("running searchfof.js");

function setupFofSearch() {
    console.log("running setupFofSearch");
    $('#fofsearch').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();

        // find result div in another way
        fofResultDropdown = $( "#fofresult");
        console.log(fofResultDropdown);

        if(term.length){
            $.post("/php/friends/backend-search-fof.php", {query: term}).done(function(data){
                // Display the returned data in browser
                fofResultDropdown.html(data);
                fofResultDropdown.show();
            });
        } else{
            fofResultDropdown.empty();
            fofResultDropdown.hide();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", "#fofresult p", function(){
        console.log($(this).text());
        $(this).parents(".control").find('input[type="text"]').val($(this).text());
        fofResultDropdown.empty();
        fofResultDropdown.hide();
    });
}


function setupUserSearch() {
    console.log("running setupUserSearch");
    $('#usersearch').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();

        // find result div in another way
        userResultDropdown = $( "#userresult");
        console.log(userResultDropdown);

        if(term.length){
            $.post("/php/friends/backend-search-user.php", {query: term}).done(function(data){
                // Display the returned data in browser
                userResultDropdown.html(data);
                userResultDropdown.show();
            });
        } else{
            userResultDropdown.empty();
            userResultDropdown.hide();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", "#userresult p", function(){
        console.log($(this).text());
        $(this).parents(".control").find('input[type="text"]').val($(this).text());
        userResultDropdown.empty();
        userResultDropdown.hide();
    });
}
