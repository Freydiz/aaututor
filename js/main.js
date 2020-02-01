// click function to open modals when clicking a row in a table, parses 2 variables through the url: userID and Search values
$(document).ready(function () {

    $('#search tr.hover').click(function () {
        var ID = $(this).attr("id");

        var PageToSendTo = "search.php?";
        var Search = "search=";
        var SearchResults = document.getElementById("searchValue").value;
        var MyVariable = ID;
        var VariablePlaceholder = "&id=";
        var UrlToSend = PageToSendTo + Search + SearchResults + VariablePlaceholder + MyVariable;

        window.location.href = UrlToSend;
    });

});

// click function to open modals when clicking a row in a table, parses 1 variable through the url: session ID 
$(document).ready(function () {

    $('#tutorsess tr.hover').click(function () {
        var sessID = $(this).attr("sid");

        var Page = "home.php?";
        var Variable = "sid=";
        var Url = Page + Variable + sessID;

        window.location.href = Url;
    });

});



