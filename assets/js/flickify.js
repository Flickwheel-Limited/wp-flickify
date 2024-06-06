jQuery(document).ready(function($) {
    function getQueryParam(param) {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    var slug = getQueryParam('id');

    if (slug) {
        // If slug is present in the URL, load the categories
        loadCarCategories(slug);
        $('#step1').hide();
        $('#step2').hide();
        $('#step3').show();
    }

    $('#flickify-step1-form').on('submit', function(e) {
        e.preventDefault();

        var membership_option = $('input[name="membership_option"]:checked').val();
        if (!membership_option) {
            alert('Please select an option');
            return;
        }

        $('#step1').hide();
        $('#step2').show();
    });

    $('#flickify-step2-form').on('submit', function(e) {
        e.preventDefault();

        var membership_option = $('input[name="membership_option"]:checked').val();
        var formData = {
            action: 'flickify_submit_form',
            security: flickifyAjax.nonce,
            membership_option: membership_option,
            first_name: $('input[name="first_name"]').val(),
            last_name: $('input[name="last_name"]').val(),
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
                    // Update the URL with the slug
                    var newUrl = window.location.pathname + '?id=' + slug;
                    window.history.pushState({ path: newUrl }, '', newUrl);
                    loadCarCategories(slug);
                } else {
                    alert(response.data.message);
                }
            }
        });
    });

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

    $('#previous').on('click', function() {
        $('#step3').hide();
        $('#step2').show();
    });

    $('#continue-step3').on('click', function() {
        var car_category = $('input[name="car_category"]:checked').val();
        if (!car_category) {
            alert('Please select a car category');
            return;
        }

        // Handle the next step submission or navigation
    });
});

const firstButton = document.getElementById('button1')
const secondButton = document.getElementById('button2')
const thirdButton = document.getElementById('button3')
const fourButton = document.getElementById('button4')

const plans = document.getElementsByName("plan")
const cars = document.getElementsByName("cars")
const membership = document.getElementsByName("membership")
const payment = document.getElementsByName("payment")



const plansRadioHanlder = ()=>{
    for(i=0 ; i<plans.length; i++){
        if(plans[i].checked===true){
            firstButton.disabled =false
        }
    }
}

    for(i=0 ;i<plans.length; i++){
        plans[i].addEventListener('click', plansRadioHanlder)

    }

    window.addEventListener('load' , plansRadioHanlder )

    const carsRadioHanlder = ()=>{
        for(i=0 ; i<cars.length; i++){
            if(cars[i].checked===true){
                secondButton.disabled =false
            }
        }
    }
    
        for(i=0 ;i<cars.length; i++){
            cars[i].addEventListener('click', carsRadioHanlder)
    
        }

        window.addEventListener('load' , carsRadioHanlder )


        const membershipHanlder = ()=>{
            for(i=0 ; i<membership.length; i++){
                if(membership[i].checked===true){
                    thirdButton.disabled =false
                }
            }
        }
    
        
        for(i=0 ;i<membership.length; i++){
                membership[i].addEventListener('click', membershipHanlder)
               
        }



        for(i=0 ;i<payment.length; i++){
            payment[i].addEventListener('click', ()=>{
                    fourButton.disabled =false
           
    })}