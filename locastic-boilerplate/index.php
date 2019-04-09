<?php

    $context = Timber::get_context();

    $args = array(
        'post_type' => 'post'
    );

    $context['posts'] = new Timber\PostQuery($args);

    Timber::render('index.twig', $context);
