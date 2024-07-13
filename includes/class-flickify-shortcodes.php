<?php

class Flickify_Shortcodes {

    public static function register() {
        add_shortcode('flickify_form', array(__CLASS__, 'render_form'));
    }

    public static function render_form()
    {
        $plugin_url = FLICKIFY_URL;
        ob_start();
        ?>
        <div>
            <div id="step1">
                <div class="logo-div">
                    <img src="<?php echo $plugin_url; ?>assets/img/logo-t.svg" alt="logo" class="logo"/>
                </div>

                <form id="flickify-step1-form">
                    <div class="container">
                        <div class="text-div">
                            <h2 class="premium">Premium Maintenance <span>Membership</span></h2>
                            <p class="exclusive-text">
                                Unlock exclusive benefits with our personalised car maintenance services.
                            </p>
                        </div>

                        <div class="select-div">
                            <h3 class="select-text">Select the option that applies</h3>

                            <div class="images-div">
                                <div class="img-container">
                                    <img src="<?php echo $plugin_url; ?>assets/img/Frame 1000002388 (1).svg" alt="Myself"/>
                                    <div class="text-container">
                                        <h6>For Myself</h6>
                                        <p>A membership plan for my own use</p>
                                    </div>

                                    <div class="round">
                                        <input type="radio" name="plan" id="personal" value="1" />
                                        <label for="personal"></label>
                                    </div>

                                </div>

                                <div class="img-container">
                                    <img src="<?php echo $plugin_url; ?>assets/img/Illustration.svg" alt="Family"/>
                                    <div class="text-container">
                                        <h6>For Friend /Family</h6>
                                        <p>Gift a premium car care membership experience</p>
                                    </div>

                                    <div class="round">
                                        <input type="radio" name="plan" id="friend" value="2"/>
                                        <label for="friend"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="continue-div">
                            <button disabled class="continue-button" id="button1">Continue</button>
                        </div>

                        <div class="progress">
                            <div class="green"></div>
                        </div>

                    </div>
                </form>
            </div>

            <div id="step2" style="display: none;">
                <div class="logo-div">
                    <img src="<?php echo $plugin_url; ?>assets/img/logo-t.svg" alt="logo" class="logo"/>
                </div>

                <div class="container">
                    <div class="text-div">
                        <h3 class="premium">Please Provide Your Recipient Personal Info</h3>
                        <p>Tell us more about your family or friend</p>
                    </div>

                    <form id="flickify-step2-form">
                        <div class="input-container">
                            <div class="input-div">
                                <label for="firstName">First Name</label>
                                <input type="text" value="" placeholder="e.g Henry" name="firstName" id="firstName"/>
                            </div>

                            <div class="input-div">
                                <label for="lastname">Last Name</label>
                                <input id="lastname" name="lastName" type="text" placeholder="e.g Robertson"/>
                            </div>

                            <div class="number-code">
                                <div class="code-container">
                                    <label class="code-title">Code</label>
                                    <div class="code-div">
                                        <img src="<?php echo $plugin_url; ?>assets/img/flag.svg"/>
                                        <p>+234</p>
                                    </div>
                                </div>
                                <div class="input-div" id="number-input">
                                    <label for="phone">Phone Number</label>
                                    <input id="phone" name="phone" type="tel" placeholder="08139236339" />
                                </div>
                            </div>

                            <div class="input-div">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" placeholder="example@gmail.com"/>
                            </div>
                        </div>
                        <h4 style="font-weight: 600" >Car Details</h4>

                        <div class="car-type-container">
                            <div class="input-div">
                                <label for="make">Make</label>
                                <select id="make" name="make" class="">
                                    <option value="" selected>Select You Car Make</option>
                                </select>
                            </div>
                            <div class="input-div">
                                <label for="model">Model</label>
                                <select id="model" name="model" class="">
                                    <option value="" selected>Select You Car Model</option>
                                </select>
                            </div>
                            <div class="input-div">
                                <label for="year">Year</label>
                                <select id="year" name="year" class="">
                                    <option value="" selected>e.g 2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                </select>
                            </div>
                        </div>

                        <div class="buttons">
                            <button type="button" class="button" id="previous-button1">Previous</button>
                            <button type="submit" disabled class="button next-button" id="input-button">Continue</button>
                        </div>
                    </form>
                    <div class="progress">
                        <div class="green"></div>
                    </div>
                </div>
            </div>

            <div id="step3" style="display: none;">
                <div class="logo-div">
                    <img src="<?php echo $plugin_url; ?>assets/img/logo-t.svg" alt="logo" class="logo"/>
                </div>

                <div class="container">
                    <div class="text-div">
                        <h2 class="">Select the <span>category</span> that best describes your car</h2>
                        <p>Select the option that applies</p>
                    </div>
                    <form id="flickify-step3-form">
                        <div id="car-categories" class="select-container">
                            <div id="loading-spinner" style="display: none; width: 100%; height: 100%; padding: 6.9em 0;">
                                <div style="width: 100px; height: 100px; margin: auto;">
                                    <svg width="100" height="100" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                        <circle cx="50" cy="50" fill="none" stroke="#3498db" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                                        </circle>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="buttons">
                            <button type="button" class="button" id="previous-button2">Previous</button>
                            <button disabled type="submit" class="button next-button" id="button2">Continue</button>
                        </div>
                    </form>
                    <div class="progress">
                        <div class="green"></div>
                    </div>
                </div>
            </div>

            <div id="step4" style="display: none;" class="division">
                <section class="section1">
                    <div class="logo-div">
                        <img src="<?php echo $plugin_url; ?>assets/img/logo-t.svg" alt="logo" class="logo" />
                    </div>

                    <div class="plan-container">
                        <div class="plan-div">
                            <h2 class="">Choose a <span>plan</span> that best suits your driving habit</h2>
                            <p>Select Membership</p>
                        </div>

                        <div class="select-container">
                            <div id="loading-spinner2" style="display: none; width: 100%; height: 100%; padding: 4em 0;">
                                <div style="width: 100px; height: 100px; margin: auto;">
                                    <svg width="100" height="100" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                        <circle cx="50" cy="50" fill="none" stroke="#3498db" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                                        </circle>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="buttons">
                            <button type="button" class="button" id="previous-button3">
                                Previous
                            </button>
                            <button disabled type="button" class="button next-button" id="button3">Continue</button>
                        </div>

                        <div class="progress">
                            <div class="green"></div>
                        </div>
                    </div>
                </section>

                <section class="section2">
                    <div class="plan-details">
                        <div id="loading-spinner3" style="display: none; width: 100%; height: 100%; position: absolute; top: 0; left: 0;">
                            <div style="width: 100px; height: 100px; margin: auto; position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
                                <svg width="50" height="50" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" fill="none" stroke="#3498db" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                                    </circle>
                                </svg>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div id="step5" style="display: none;">
                <div class="logo-div">
                    <img src="<?php echo $plugin_url; ?>assets/img/logo-t.svg" alt="logo" class="logo"/>
                </div>

                <div class="summary-container">
                    <div class="summary">
                        <h2>Select Payment</h2>
                        <p class="summaryTypeCategory">{{Type of car (e.g) Toyota Camry 2019}} | {{Category (e.g) Compact car}}</p>
                    </div>

                    <div class="payment-section">
                        <div class="payment-method">
                            <div class="text-container">
                                <p>Monthly</p>
                                <h6>₦ <span class="payment-method-price">9,800</span> / month</h6>
                            </div>

                            <div class="round">
                                <input type="radio" id="monthly" name="payment" />
                                <label for="monthly"></label>
                            </div>

                        </div>

                        <div class="payment-method">
                            <div class="text-container">
                                <p>Quarterly</p>
                                <h6>₦ <span class="payment-method-price">9,167</span> / month</h6>
                                <p>₦ 27,500 billed every 3 months</p>
                            </div>

                            <div class="star-container">
                                <img src="<?php echo $plugin_url; ?>assets/img/magic-star.svg"/>
                                <p>Save 6%</p>
                            </div>

                            <div class="round">
                                <input type="radio" id="quarterly" name="payment" />
                                <label for="quarterly"></label>
                            </div>
                        </div>

                        <div class="payment-method">
                            <div class="text-container">
                                <p>Annually</p>
                                <h6>₦ <span class="payment-method-price">6,708</span> / month</h6>
                                <p>₦ 80,500 billed every 12 months</p>

                                <div class="star-container">
                                    <img src="<?php echo $plugin_url; ?>assets/img/magic-star.svg"/>
                                    <p>Save 12%</p>
                                </div>
                            </div>

                            <div class="round">
                                <input type="radio" id="yearly" name="payment" />
                                <label for="yearly"></label>
                            </div>
                        </div>
                    </div>

                    <div class="buttons">
                        <button type="button" class="button" id="previous-button4">
                            Back
                        </button>
                        <button disabled type="button" class="button next-button" id="button4">Make Payment</button>
                    </div>

                    <div class="progress">
                        <div class="green"></div>
                    </div>
                </div>

            </div>

            <div id="step6" style="display: none;">
                <div class="logo-div">
                    <img src="<?php echo $plugin_url; ?>assets/img/logo-t.svg" alt="logo" class="logo"/>
                </div>

                <div class="summary-container2">
                    <div class="summary">
                        <h2>Membership Summary</h2>
                    </div>

                    <div>
                        <div class="details-table">
                            <h4>Plan Details</h4>
                            <div class="detail">
                                <p>Car Category</p>
                                <p id="category-value" class="value"></p>
                            </div>
                            <div class="detail">
                                <p>Maintenance Plan</p>
                                <p id="plan-value" class="value"></p>
                            </div>
                            <div class="detail">
                                <p>Payment Frequency</p>
                                <p id="frequency-value" class="value"></p>
                            </div>
                            <div class="detail">
                                <p>Car Type</p>
                                <p id="car-value" class="value"></p>
                            </div>
                            <div class="detail">
                                <p>Amount</p>
                                <p id="amount-value" class="value"></p>
                            </div>
                        </div>

                        <div class="details-total-div">
                            <p class="details-total">₦ <span class="total-number"></span></p>
                        </div>
                    </div>

                    <div class="buttons">
                        <button type="button" class="button" id="previous-button5">
                            Back
                        </button>
                        <button type="button" class="button next-button" id="button5">Make Payment</button>
                    </div>
                </div>
            </div>


            <div id="successfully" style="display: none;">
                <div class="logo-div">
                    <img src="<?php echo $plugin_url; ?>assets/img/logo-t.svg" alt="logo" class="logo"/>
                </div>

                <div class="successful-screen">
                    <img src="<?php echo $plugin_url; ?>assets/img/carIllustration.svg" alt="successful"/>

                    <h3>Smooth Rides Awaits</h3>
                    <p>Congratulations! You've successfully secured a car membership maintenance plan to ensure smooth rides ahead</p>
                    <div>
                        <button type="button" class="button home" id="button6">
                            Journey Home
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
?>
