jQuery(document).ready(function($) {

    // Function to get query parameter value by name
    function getQueryParam(param) {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Get the 'id' query parameter from the URL
    var slug = getQueryParam('id');

    // If 'id' parameter is present in the URL, load categories and adjust steps
    if (slug) {
        loadCarCategories(slug);
        $('#step1').hide();
        $('#step2').hide();
        $('#step3').show();
    }

    // Handle first step form submission
    $('#flickify-step1-form').on('submit', function(e) {
        e.preventDefault();
        $('#step1').hide();
        $('#step2').show();
        updateProgressBar();
    });

    // Handle the 'Previous' button click to go back to step 2
    $('#previous-button1').on('click', function() {
        $('#step2').hide();
        $('#step1').show();
        updateProgressBar();
    });
    
    // Handle second step form submission
    $('#flickify-step2-form').on('submit', function(e) {
        e.preventDefault();
        var formData = {
            action: 'flickify_submit_form',
            security: flickifyAjax.nonce,
            membership_option: $('input[name="plan"]:checked').val(),
            // membership_option: $('input[name="membership_option"]:checked').val(),
            first_name: $('input[name="firstName"]').val(),
            last_name: $('input[name="lastName"]').val(),
            phone: $('input[name="phone"]').val(),
            email: $('input[name="email"]').val()
        };

        $.ajax({
            url: flickifyAjax.ajaxurl,
            method: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                if (response.success) {
                    slug = response.data.data.slug;
                    // Update the URL with the new 'id' parameter
                    var newUrl = window.location.pathname + '?id=' + slug;
                    window.history.pushState({ path: newUrl }, '', newUrl);
                    loadCarCategories(slug);
                } else {
                    alert(response.data.message);
                }
            }
        });

        $('#step2').hide();
        $('#step3').show();
        updateProgressBar();
    });

    // Function to load car categories from the API
    function loadCarCategories(slug) {
        $.ajax({
            url: 'https://gsjkatweqa.sharedwithexpose.com/api/v2/press/flickify/step_two/' + slug,
            method: 'GET',
            success: function(response) {
                if (response.status) {
                    var categories = response.data.categories;
                    var categoriesHtml = '';
                    categories.forEach(function(category) {
                        categoriesHtml += `
                            <div>
                                <img src="${category.data.image}" alt="${category.car_type}">
                                <label>
                                    <input type="radio" name="car_category" value="${category.id}">
                                    ${category.car_type}
                                </label>
                            </div>
                        `;
                    });
                    $('#car-categories').html(categoriesHtml);
                    $('#step2').hide();
                    $('#step3').show();
                } else {
                    alert(response.message);
                }
            }
        });
    }

    // Handle the 'Previous' button click to go back to step 2
    $('#previous-button2').on('click', function() {
        $('#step3').hide();
        $('#step2').show();
        updateProgressBar();
    });

    // Handle the 'Continue' button click in step 3
    $('#flickify-step3-form').on('submit', function(e) {
        e.preventDefault();
        $('#step3').hide();
        $('#step4').show();
        updateProgressBar();
    });

     // Handle the 'Previous' button click to go back to step 3
     $('#previous-button3').on('click', function() {
        $('#step4').hide();
        $('#step3').show();
        updateProgressBar();
    }); 

    // Handle the 'Continue' button click in step 4
     $('#button3').on('click', function() {
        $('#step4').hide();
        $('#step5').show();
        updateProgressBar();
    }); 

     // Handle the 'Previous' button click to go back to step 4
     $('#previous-button4').on('click', function() {
        $('#step5').hide();
        $('#step4').show();
        updateProgressBar();
    }); 

    // Handle the 'Make Payment' button click in step 5
     $('#button4').on('click', function() {
        $('#step5').hide();
        $('#step1').show();
        updateProgressBar();
    }); 

    // Enable buttons based on radio selection
    function enableButtonOnSelection(button, radioGroupName) {
        $(`input[name="${radioGroupName}"]`).on('change', function() {
            button.disabled = !$(this).is(':checked');
        });
    }

    enableButtonOnSelection(document.getElementById('button1'), 'plan');
    enableButtonOnSelection(document.getElementById('button2'), 'cars');
    enableButtonOnSelection(document.getElementById('button3'), 'membership');
    enableButtonOnSelection(document.getElementById('button4'), 'payment');

    const number = $('#number');
    const email = $('#email');
    const firstname = $('#firstName');
    const lastname = $('#lastname');
    
    const inputContainer = $('.input-container');
    const inputButton = $('#input-button');
    
    function validate() {
        if (firstname.val() !== "" && email.val() !== "" && lastname.val() !== "" && number.val() !== "") {
            inputButton.prop('disabled', false);
        } else {
            inputButton.prop('disabled', true);
        }
    }
    inputContainer.on('input', validate);

    // function to update the progress bar
    const maxSteps = 5;
    const greenBar = $('.green');
    
    function updateProgressBar() {
        let currentStep = 0;
        for (let i = 1; i <= maxSteps; i++) {
            if ($('#step' + i).is(':visible')) {
                currentStep = i;
                break;
            }
        }
        var percentage = (currentStep / maxSteps) * 100; // Reaches 100% on the 5th step
        greenBar.css('width', percentage + '%');
    }
    
    // Initialize progress bar
    updateProgressBar();
})
