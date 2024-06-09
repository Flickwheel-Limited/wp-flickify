jQuery(document).ready(function($) {

    // Function to get query parameter value by name
    function getQueryParam(param) {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Get the 'id', 'category', and 'scheme' query parameters from the URL
    var slug = getQueryParam('id');
    var categoryId = getQueryParam('category');
    var schemeSlug = getQueryParam('scheme');

    // If 'id' parameter is present in the URL, load categories and adjust steps
    if (slug) {
        if (categoryId) {
            loadMembershipPlans(categoryId);
            $('#step1').hide();
            $('#step2').hide();
            $('#step3').hide();
            $('#step4').show();
            if (schemeSlug) {
                // Select the scheme checkbox and load benefits
                $(`input[name="membership"][value="${schemeSlug}"]`).prop('checked', true);
                loadSchemeBenefits(schemeSlug);
            }
        } else {
            loadCarCategories(slug);
            $('#step1').hide();
            $('#step2').hide();
            $('#step3').show();
        }
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
    });

    // Function to load car categories from the API
    function loadCarCategories(slug) {
        $.ajax({
            url: 'https://api.flickauto.com/api/v2/press/flickify/step_two/' + slug,
            method: 'GET',
            success: function(response) {
                if (response.status) {
                    var categories = response.data.categories;
                    var categoriesHtml = '';
                    categories.forEach(function(category) {
                        categoriesHtml += `
                            <div class="car-div">
                                <img src="${category.data.image}" alt="${category.car_type}" />
                                <div class="rounded">
                                    <input type="radio" id="${category.car_type}" name="cars" value="${category.id}" />
                                    <label for="${category.car_type}"></label>
                                </div>
                                <h5>${category.car_type}</h5>
                                <p>${category.data.description}</p>
                                <p>Eg. ${category.data.samples}</p>
                            </div>
                        `;
                    });
                    $('#car-categories').html(categoriesHtml);
                    $('#step2').hide();
                    $('#step3').show();
                    updateProgressBar();

                    // Add event listeners for newly added radio buttons
                    enableButtonOnSelection(document.getElementById('button2'), 'cars');
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
        var selectedCategory = $('input[name="cars"]:checked').val();
        if (!selectedCategory) {
            alert('Please select a car category');
            return;
        }
        // Update the URL with the new 'category' parameter
        var newUrl = window.location.pathname + '?id=' + slug + '&category=' + selectedCategory;
        window.history.pushState({ path: newUrl }, '', newUrl);
        loadMembershipPlans(selectedCategory);
        $('#step3').hide();
        $('#step4').show();
        updateProgressBar();
    });

    // Function to load membership plans from the API
    function loadMembershipPlans(categoryId) {
        $.ajax({
            url: 'https://api.flickauto.com/api/v2/press/flickify/car_type/' + categoryId + '/scheme',
            method: 'GET',
            success: function(response) {
                if (response.data) {
                    var plans = response.data;
                    var plansHtml = '';
                    plans.forEach(function(plan) {
                        plansHtml += `
                            <div class="illustration-div">
                                <div class="membership">
                                    <h5>${plan.plan_name}</h5>
                                    <p>starting from <span> ₦ ${plan.data.amount}</span></p>
                                    <p>${plan.data.description}</p>
                                </div>
                                <img src="${plan.data.image}" alt="${plan.plan_name}" />
                                <div class="rounded">
                                    <input type="radio" id="${plan.slug}" value="${plan.slug}" name="membership" />
                                    <label for="${plan.slug}"></label>
                                </div>
                            </div>
                        `;
                    });
                    $('.select-container').html(plansHtml);

                    // Add event listeners for newly added radio buttons
                    $('input[name="membership"]').on('change', function() {
                        var selectedScheme = $(this).val();
                        // Update the URL with the new 'scheme' parameter
                        var newUrl = window.location.pathname + '?id=' + slug + '&category=' + categoryId + '&scheme=' + selectedScheme;
                        window.history.pushState({ path: newUrl }, '', newUrl);
                        loadSchemeBenefits(selectedScheme);
                        selectSchemeRadioButton(selectedScheme);
                    });

                    // Enable button if schemeSlug exists in the URL
                    if (schemeSlug) {
                        selectSchemeRadioButton(schemeSlug);
                        //enableButtonOnSelection(document.getElementById('button3'), 'membership');
                    }

                    updateProgressBar();

                    // Ensure the selected checkbox is checked after loading the plans
                    if (schemeSlug) {
                        $(`input[name="membership"][value="${schemeSlug}"]`).prop('checked', true);
                        loadSchemeBenefits(schemeSlug);
                    }
                } else {
                    alert('No membership plans found for this category.');
                }
            }
        });
    }

    // Function to select the scheme radio button
    function selectSchemeRadioButton(schemeSlug) {
        $(`input[name="membership"][value="${schemeSlug}"]`).prop('checked', true);
        $(`input[name="membership"][value="${schemeSlug}"]`).parent().addClass('selected');
    }

    // Function to load scheme benefits from the API
    function loadSchemeBenefits(schemeSlug) {
        $.ajax({
            url: 'https://api.flickauto.com/api/v2/press/flickify/scheme/' + schemeSlug + '/benefits',
            method: 'GET',
            success: function(response) {
                if (response) {
                    // Handle loading of scheme benefits
                    console.log(response); // Display benefits for debugging
                    $('#button3').prop('disabled', false); // Enable the continue button

                    // Clear existing benefits
                    $('.plan-details').html('');

                    // Append new benefits
                    for (const level in response) {
                        const levelData = response[level];
                        let benefitsHtml = `
                            <div class="details-heading">
                                <h2>${levelData.category}</h2>
                                <p class="unlock-text">${levelData.unlock_text}</p>
                            </div>
                        `;
                        levelData.benefits.forEach(benefit => {
                            benefitsHtml += `<div class="benefit-month"><h5>Month ${benefit.month}</h5>`;
                            for (const key in benefit.benefit) {
                                benefitsHtml += `<p>${benefit.benefit[key]}</p>`;
                            }
                            benefitsHtml += `</div>`;
                        });
                        $('.plan-details').append(benefitsHtml);
                    }
                } else {
                    alert('No benefits found for this scheme.');
                }
            }
        });
    }

    // Handle the 'Previous' button click to go back to step 3
    $('#previous-button3').on('click', function() {
        $('#step4').hide();
        $('#step3').show();
        updateProgressBar();
    });

    // Handle the 'Continue' button click in step 4
    $('#flickify-step4-form').on('submit', function(e) {
        e.preventDefault();
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
            button.disabled = !$(`input[name="${radioGroupName}"]:checked`).length;
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
});
