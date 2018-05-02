<?php

defined( 'ABSPATH' ) || exit;

/**
* Enqueue Author Bio Stylesheet
*/
function hms_author_styles() {
    wp_enqueue_style( 'author-bio-style', plugins_url( 'style.css', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'hms_author_styles' );


function hms_before_after($content) {
  if( is_single() ) {

    // Author Full Name
    $author_bio .= '<p class="hms-author-name">' . get_the_author_meta( 'display_name', false ) . '</p>';

    $author_bio .= '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author() . '</a>';
    // URL
    $author_bio .= '<p>' . get_the_author_link() . '</p>';

    // Author Field Description
    $author_bio .= '<p class="hms-author-description">' . get_the_author_meta( 'description', false ) . '</p>';



    // Fields Combined
    $author_bio = '<div class="hms-author-bio">' . $author_bio . '</div>';

    $fullcontent = $content . $author_bio;
  } else {
    $fullcontent = $content;
  }

  return $fullcontent;
}

add_filter( 'the_content', 'hms_before_after' );
