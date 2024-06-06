<?php

class Flickify_Shortcodes {

    public static function register() {
        add_shortcode('flickify_form', array(__CLASS__, 'render_form'));
    }

    public static function render_form() {
        ob_start();
        ?>
        <div class="flickify-form">
            <!-- Step 1 Form -->
            <div id="step1">
                <h2>Premium Maintenance Membership</h2>
                <p>Unlock exclusive benefits with our personalized car maintenance services.</p>
                <form id="flickify-step1-form">
                    <label>
                        <input type="radio" name="membership_option" value="1">
                        For Myself
                    </label>
                    <label>
                        <input type="radio" name="membership_option" value="2">
                        For a Friend/Family
                    </label>
                    <button type="submit">Continue</button>
                </form>
            </div>

            <!-- Step 2 Form -->
            <div id="step2" style="display:none;">
                <h2>Please Provide Your Recipient Personal Info</h2>
                <form id="flickify-step2-form">
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <input type="text" name="phone" placeholder="Phone Number" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <button type="submit">Continue</button>
                </form>
            </div>

            <!-- Step 3 Form -->
            <div id="step3" style="display:none;">
                <h2>Select the category that best describes your car</h2>
                <p>Select the option that applies</p>
                <div id="car-categories"></div>
                <button id="previous">Previous</button>
                <button id="continue-step3">Continue</button>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
?>


