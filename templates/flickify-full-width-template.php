<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
        }
        .flickify-container {
            width: 90%;
            max-width: 600px;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="flickify-container">
    <?php
    // This will process and display the content of the shortcode.
    echo do_shortcode('[flickify_form]');
    ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
