console.log("running searchfof.js");

function setupFofSearch() {
    console.log("running setupFofSearch");
    $('.control input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();

        // find result div in another way
        resultDropdown = $( "#result");
        console.log(resultDropdown);

        if(term.length){
            $.post("/php/friends/backend-search-fof.php", {query: term}).done(function(data){
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
