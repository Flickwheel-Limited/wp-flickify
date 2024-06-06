<?php

class Flickify_Shortcodes {

    public static function register() {
        add_shortcode('flickify_form', array(__CLASS__, 'render_form'));
    }

    public static function render_form() {
        ob_start();
        ?>
        <div style="">
        <div class="logo-div">
            <img src="/assets/img/logo-t.svg" alt="logo" class="logo"/>
        </div>

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
                        <img src="/assets/img/Frame 1000002388 (1).svg"/>
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
                        <img src="/assets/img/Illustration.svg"/>
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
                <a href="./page2.html">
                    <button disabled class="continue-button" id="button1">Continue</button>
                </a>
            </div>
           

            <div class="progress">
                <div class="green"></div>
            </div>
            
        </div>

    </div>
        <?php
        return ob_get_clean();
    }
}
?>


