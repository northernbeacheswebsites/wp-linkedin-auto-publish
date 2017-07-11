jQuery(document).ready(function ($) {

    //make help area content into an accordion
    $("#accordion").accordion({
        collapsible: true,
        autoHeight: false,
        heightStyle: "content",
        speed: "fast"
    });
    
    //make tabs tabs
    $("#tabs").tabs();

    //make links go to particular tabs
    $('.wrap').on("click", ".open-tab", function () {
        var tab = $(this).attr('href');
        var index = $(tab).index() - 1;
        $('#tabs').tabs({
            active: index
        });
    });


    //hides and then shows on click help tooltips
    $(".hidden").hide();
    $(".information-icon").click(function (event) {
        event.preventDefault();
        $(this).next(".hidden").slideToggle();
    });


    
    //runs get access token ajax
    //get current page
    var currentPage = window.location.href;
    //this is what to look for in the URL to run the javascript on
    var pageCheck = "code";
    var code = $('#wp_linkedin_autopublish_authorisation_code').val();
    //the following 3 variables are used to create the redirect URL
    var pluginName = "wp_linkedin_auto_publish";
    var findWhereParamatersStart = currentPage.indexOf(pluginName);
    var redirect = encodeURIComponent(currentPage.substr(0,findWhereParamatersStart+pluginName.length));
        
    if (currentPage.indexOf(pageCheck) !== -1) {
                
        //do request    
        var data = {
            'action': 'get_access_token',
            'code': code,
            'redirect': redirect,
        };


        jQuery.post(ajaxurl, data, function (response) {
            
            if(response.length > 1){
            $('#wp_linkedin_autopublish_access_token').val(response);
            
            
            var currentDate = new Date();
            currentDate.setDate(currentDate.getDate()+60);

            var d = currentDate.getDate();
            var m = currentDate.getMonth() + 1;
            var yyyy = currentDate.getFullYear();
            
            if(d<10){
                var dd = '0' + d;  
            } else {
                var dd = d;   
            }
            
            if(m<10){
                var mm = '0' + m;  
            } else {
                var mm = m;   
            }

            var expiryDate = dd + '/' + mm + '/' + yyyy;
            $('#wp_linkedin_autopublish_access_token_validity').val(expiryDate);

            $('<div class="notice notice-info is-dismissible"><p>Please press the Save All Settings button.</p></div>').insertAfter('#wp_linkedin_autopublish_access_token');
            }    
        });

    }
    
    
    
    
    
    
    //show authorisation fields if client id and secret are filled in
    
    var clientId = $('#wp_linkedin_autopublish_client_id').val();
    var clientSecret = $('#wp_linkedin_autopublish_client_secret').val();
    
    if(clientId.length > 1 && clientSecret.length >1){
        $('.hidden-authorisation').show();    
    }




    
    //hide company select based on whether the user is using a company or profile

    $('#wp_linkedin_autopublish_profile_company :selected').each(function () {
        if ($(this).val() == "profile") {
            $(".company-option").hide();
        } else {
            $(".company-option").show();
        }
    });
    $('#wp_linkedin_autopublish_profile_company').change(function () {
        if ($(this).val() == "profile") {
            $(".company-option").hide();
        } else {
            $(".company-option").show();
        }
    });


    //adds button text to text area
    $('.linkedin_autopublish_append_buttons').click(function () {
        $(this).parent().next().children().val($(this).parent().next().children().val() + $(this).attr("value"));
        $(this).parent().next().children().focus();
    });



    
    
    //code to manage dont share categories

    var selectedDontShareCategories = $('#wp_linkedin_autopublish_dont_share_categories').val();

    if (selectedDontShareCategories != null) {
        var selectedDontShareCategoriesArray = selectedDontShareCategories.split(',');
    }

    $(".dont-share-checkbox").each(function () {

        if ($.inArray($(this).attr('id'), selectedDontShareCategoriesArray) != -1) {
            $(this).prop('checked', true);
        }

        $(this).change(function () {

            if ($(this).is(":checked")) {

                selectedDontShareCategoriesArray.push($(this).attr('id'));

                $('#wp_linkedin_autopublish_dont_share_categories').val(selectedDontShareCategoriesArray.join());

            } else {
                selectedDontShareCategoriesArray.splice($.inArray($(this).attr('id'), selectedDontShareCategoriesArray), 1);
                $('#wp_linkedin_autopublish_dont_share_categories').val(selectedDontShareCategoriesArray.join());
            }

        }); //end change function

    }); //end each function
    
    
    
    
    
    
    
    
    //code to manage share the following post types and pages

    var selectedPostTypesPages = $('#wp_linkedin_autopublish_share_post_types').val();

    if (selectedPostTypesPages != null) {
        var selectedPostTypesPagesArray = selectedPostTypesPages.split(',');
    }

    $(".post-type-checkbox").each(function () {

        if ($.inArray($(this).attr('id'), selectedPostTypesPagesArray) != -1) {
            $(this).prop('checked', true);
        }

        $(this).change(function () {

            if ($(this).is(":checked")) {

                selectedPostTypesPagesArray.push($(this).attr('id'));

                $('#wp_linkedin_autopublish_share_post_types').val(selectedPostTypesPagesArray.join());

            } else {
                selectedPostTypesPagesArray.splice($.inArray($(this).attr('id'), selectedPostTypesPagesArray), 1);
                $('#wp_linkedin_autopublish_share_post_types').val(selectedPostTypesPagesArray.join());
            }

        }); //end change function

    }); //end each function
    
    
    
    
    
    
    


    //clipboard function
    new Clipboard('.clipboard');
    
    $('.clipboard').click(function(event){
        event.preventDefault(); 
        
        $(this).text("Copied!");
        
        setTimeout(function() { $('.clipboard').text("Copy"); }, 2000);
    });
    
});