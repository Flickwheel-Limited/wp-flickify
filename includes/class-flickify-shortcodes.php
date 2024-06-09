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
                    </div>
                </section>
            </div>

            <div id="step5" style="display: none;">
                <div class="logo-div">
                    <img src="<?php echo $plugin_url; ?>assets/img/logo-t.svg" alt="logo" class="logo"/>
                </div>

                <div class="summary-container">
                    <div class="summary">
                        <h2>Membership Summary</h2>
                        <p>Premium Car Maintenance</p>
                    </div>

                    <div class="selected-section">
                        <h5>Your Plan</h5>

                        <div class="plan-section">
                            <div class="selected-details">
                                <div class="membership">
                                    <h5>ASO ROCK</h5>
                                    <p>starting from <span>₦ 6,200</span></p>

                                    <p>Essential Autocare experience</p>
                                </div>
                                <img src="<?php echo $plugin_url; ?>assets/img/Layer_1.svg"/>
                            </div>

                            <div class="details-table">
                                <h4>Plan Details</h4>
                                <div class="detail">
                                    <p>Car Category</p>
                                    <p class="value">Compact</p>
                                </div>
                                <div class="detail">
                                    <p>Maintenance Plan</p>
                                    <p class="value">Aso Rock</p>
                                </div>
                                <div class="detail">
                                    <p>For</p>
                                    <p class="value">Self</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="payment-section">
                        <h2>Select Payment</h2>

                        <div class="payment">

                            <div class="payment-method">
                                <div class="text-container">
                                    <p>One Month</p>
                                    <h6>9,800 / month</h6>
                                </div>

                                <div class="round">
                                    <input type="radio" id="monthly" name="payment" />
                                    <label for="monthly"></label>
                                </div>

                            </div>

                            <div class="payment-method">
                                <div class="text-container">
                                    <p>3 Months</p>
                                    <h6>9,167 / month</h6>
                                    <p>27,500 billed every 3 months</p>
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
                                    <p>12 Months</p>
                                    <h6>6,708 / month</h6>
                                    <p>80,500 billed every 12 months</p>

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
                    </div>

                    <div class="buttons">
                        <button type="button" class="button" id="previous-button4">
                            Back
                        </button>
                        <button disabled type="button" class="button next-button" id="button4">Make Payment</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
