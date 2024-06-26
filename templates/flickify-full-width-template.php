<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>
<div>
    <?php
    // This will process and display the content of the shortcode.
    echo do_shortcode('[flickify_form]');
    ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
