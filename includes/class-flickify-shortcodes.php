<?php

class Flickify_Shortcodes {

    public static function register() {
        add_shortcode('flickify_form', array(__CLASS__, 'render_form'));
    }

    public static function render_form() {
        $plugin_url = FLICKIFY_URL;
        ob_start();
        ?>
        <div>
            <div id="step1">
                <div class="logo-div">
                    <img src="<?php echo $plugin_url; ?>assets/img/logo-t.svg" alt="logo" class="logo"/>
                </div>

                <form id="flickify-step1-form">
                    <div  class="container">
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
                                        <input type="radio" name="plan"  id="personal" value="personal" />
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
                                        <input type="radio" name="plan" id="friend"  value="friend"/>
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

                            <div class="number-code" >
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
                                <div class="select-container">
                                    <div class="car-div">
                                        <img src="<?php echo $plugin_url; ?>assets/img/car1.jpg"/>
                                        <div class="rounded">
                                            <input type="radio" id="compact" name="cars" value="compact" />
                                            <label for="compact"></label>
                                        </div>
                                        <h5>Compact</h5>
                                        <p>Small, easy-to-park, and fuel-efficient. Ideal for city driving and tight spaces.</p>
                                        <p>Eg.Toyota Corolla, Honda Civic</p>

                                    </div>

                                    <div class="car-div">
                                        <img src="<?php echo $plugin_url; ?>assets/img/car2.jpg"/>
                                        <div class="rounded">
                                            <input type="radio" id="midsize" name="cars" value="midsize" />
                                            <label for="midsize"></label>
                                        </div>
                                        <h5>Mid-size</h5>
                                        <p>A bit larger with a good balance of space and efficiency, great for both city and highway driving.</p>
                                        <p>Eg.Toyota Camry, Honda Accord</p>
                                    </div>

                                    <div class="car-div">
                                        <img src="<?php echo $plugin_url; ?>assets/img/car3.jpg"/>
                                        <div class="rounded">
                                            <input type="radio" id="suv" value="suv" name="cars"/>
                                            <label for="suv"></label>
                                        </div>
                                        <h5>SUVs and Crossover</h5>
                                        <p>Bigger, robust vehicles providing additional space and increased comfort for families.</p>
                                        <p>Eg. Toyota RAV4, Honda CR-V</p>
                                    </div>
                                </div>
                                
                                <div class="buttons">
                                    <button type="button" class=" button" id="previous-button2">Previous</button>
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
                            <div class="illustration-div">
                                <div class="membership">
                                    <h5>ODOGWU</h5>
                                    <p>starting from <span> ₦ 9,800</span></p>

                                    <p>Elite Autocare Membership</p>
                                </div>
                                <img src="<?php echo $plugin_url; ?>assets/img/Layer 2.svg" />

                                <div class="rounded">
                                    <input type="radio" id="Odogwu" value="Odogwu" name="membership" />
                                    <label for="Odogwu"></label>
                                </div>
                            </div>

                            <div class="illustration-div">
                                <div class="Popular-div">
                                    <img src="<?php echo $plugin_url; ?>assets/img/medal-star.png" alt="star-img" />
                                    <h5>Most Popular</h5>
                                </div>
                                <div class="membership">
                                    <h5>EKO</h5>
                                    <p>starting from <span>₦ 8,800</span></p>

                                    <p>Redefined Autocare Peace</p>
                                </div>
                                <img src="<?php echo $plugin_url; ?>assets/img/woman.svg" />

                                <div class="rounded">
                                    <input type="radio" id="Eko" value="Eko" name="membership" />
                                    <label for="Eko"></label>
                                </div>
                            </div>

                            <div class="illustration-div">
                                <div class="membership">
                                    <h5>ASO ROCK</h5>
                                    <p>starting from <span>₦ 6,200</span></p>

                                    <p>Essential Autocare experience</p>
                                </div>
                                <img src="<?php echo $plugin_url; ?>assets/img/Layer_1.svg" />
                                <div class="rounded">
                                    <input type="radio" id="Aso" value="Aso" name="membership" />
                                    <label for="Aso"></label>
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
                        <div class="details-heading">
                            <h2>Eko</h2>
                            <p class="price">₦9,172/mo</p>
                            <p class="Redefined">Redefined Car Care Peace</p>
                        </div>

                        <div class="primary-benefits">
                            <h5>Primary Benefits</h5>
                            <p>Vehicle maintenance coverage up to
                                #300,000 thousand per year
                            </p>
                            <p>2 Semi-synthetic or 2 Synthetic oil & filter
                                changes per year
                            </p>
                            <p>1 Premium wiper blade replacement per year</p>
                            <p>Spark plugs servicing/replacement
                                once a year
                            </p>
                            <p>1 Brake light bulbs replacement per year</p>
                            <p>Air filter servicing/replacement</p>
                            <p>Cabin filter servicing/replacement</p>
                        </div>

                        <div class="secondary">
                            <h5>Secondary Benefits</h5>
                            <p>1 Wheel alignment, tyre pressure setting, gauge
                                and rotation per year*
                            </p>
                            <p>Premium roadside assistance (local towing)
                                once a year
                            </p>
                        </div>

                        <div class="soft">
                            <h5>Soft Benefits</h5>
                            <p>Access to 35 workshops conveniently
                                located near you
                            </p>
                            <p>Monthly maintenance routine Information for your car
                            </p>
                            <p>5% discount on car repair loan Offers</p>
                            <p>2 cooling system inspection per year</p>
                            <p>Smog checks during car servicing</p>
                            <p>2% discount on VIN purchase</p>
                            <p>Brake system inspection</p>
                        </div>

                        <div class="document">
                            <h5>Car Document Manager</h5>
                            <p>Vehicle licence renewal </p>
                            <p>Third-party Insurance renewal</p>
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
                                    <input type="radio"  id="monthly" name="payment" />
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
                        <button disabled type="button" class="button next-button"  id="button4">Make Payment</button>
                        <!-- class="payment-button" -->
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
