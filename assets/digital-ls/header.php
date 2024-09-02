<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title() ?></title>
    <?php wp_head() ?>
    
    <style>
        body {
        background-image: url('<?php the_post_thumbnail_url() ?>');
        background-size: cover; /* Ajuste l'image pour couvrir toute la div */
        background-position: center; /* Centre l'image */
        background-attachment: fixed;
        background-repeat: no-repeat;
        }
        
        body::before {
            content: '';
            position: fixed;
            background-color: #0000009a;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            backdrop-filter: blur(4px);
            z-index: -1;
        }
        @keyframes ripple {
            0% {
                transform: scale(0.9);
                opacity: 1;
            }
            70% {
                transform: scale(1.1);
                opacity: 0.5;
            }
            100% {
                transform: scale(1.3);
                opacity: 0;
            }
        }

        .animate-ripple {
        animation: ripple 1.5s infinite;
        }
    </style>
</head>
<body>
  