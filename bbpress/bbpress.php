<?php

namespace Roots;

if ( !defined( 'ABSPATH' ) ) exit;

if( class_exists( 'bbpress' ) ) {

    //We always return the page template to render bbpress pages
    add_filter('bbp_template_include', function ($template){
        if( is_bbpress() ){
            return get_page_template();
        }

        return $template;
    }, 100, 1);

    //To be able to override bbpress templates with blade templates in Sage
    add_filter('bbp_get_template_part', function ($templates, $slug, $name) {

        $theme_template = '';
        foreach ($templates as $template) {
            //var_dump($template);
            $template = str_replace('.php', '.blade.php', $template);
            $theme_template = locate_template("resources/views/bbpress/{$template}");
            if( !empty( $theme_template ) )
                break;
        }

        if ($theme_template) {
            $data = collect(get_body_class())->reduce(function ($data, $class) {
                return apply_filters("sage/template/{$class}/data", $data);
            }, []);

            echo view($theme_template, $data)->render();
            return get_stylesheet_directory() . '/index.php';
        }

        return $templates;

    }, PHP_INT_MAX, 3);
}


add_action( 'wp_print_styles', function() {
    wp_deregister_style( 'bbp-default' );
}, 15 );


add_filter(
    'bbp_get_topic_class', function( $classes ) {
        $classes[] = 'tab2-row';
        return $classes;
    }
);

add_filter(
    'bbp_get_forum_class', function( $classes ) {
        $classes[] = 'tab1-row';
        return $classes;
    }
);

add_filter(
    'bbp_breadcrumbs', function ( $crumbs ) {

        foreach ($crumbs as &$crumb) {

            $li_begin = '<li class="inline-flex items-center">';
            $li_end = '</li>';

            if(strpos($crumb, 'bbp-breadcrumb-home') !== false) {
                $class_replacement = "bbp-breadcrumb-home inline-flex items-center font-medium text-black hover:text-rose-600 transition dark:text-gray-400 dark:hover:text-white";
                $replacement = '<svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>Home';
                
                $crumb = str_replace('bbp-breadcrumb-home', $class_replacement, $crumb);
                $crumb = str_replace('Home', $replacement, $crumb);
            } else {
                $class_replacement = "";
                if(strpos($crumb, 'bbp-breadcrumb-current') !== false) {
                    $class_replacement = "ml-1 font-medium text-rose-600 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white transition";
                } else {
                    $class_replacement = "ml-1 font-medium text-gray-400 hover:text-rose-600 md:ml-2 dark:text-gray-400 dark:hover:text-white transition";
                }

                $crumb = str_replace('class="', 'class="' . $class_replacement . ' ', $crumb);
            }
            
            $crumb = $li_begin . $crumb . $li_end;
        }

        return $crumbs;
    }
);

add_filter(
    'bbp_breadcrumb_separator', function ( $sep ) {

        $sep = '<svg class="w-6 h-6 text-gray-500 bbp-breadcrumb-sep" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
        
        return $sep;
    }
);

add_filter(
    'bbp_get_breadcrumb', function ( $bread_crumbs ) {

        $bread_crumbs = str_replace('div', 'ol', $bread_crumbs);
        $ol_classes = "inline-flex items-center space-x-1 md:space-x- bbp-breadcrumb";
        $bread_crumbs = str_replace('ol class="bbp-breadcrumb"', 'ol class="' . $ol_classes . '"', $bread_crumbs);

        return $bread_crumbs;
    }
);

add_filter(
    'bbp_get_forum_subscribe_link', function ( $subscription_link ) {

        $classes = 'class="subscription-toggle text-white bg-rose-600 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 transition duration-300';
        $subscription_link = str_replace('class="subscription-toggle', $classes, $subscription_link);
        $subscription_link = str_replace('<a', '<button', $subscription_link);
        $subscription_link = str_replace('</a>', '</button>', $subscription_link);

        return $subscription_link;
    }
);

add_filter(
    'bbp_get_topic_favorite_link', function ( $favorite_link ) {

        $classes = 'class="favorite-toggle bg-transparent border border-rose-500 hover:bg-gray-50 text-rose-600 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2 transition duration-300';
        $favorite_link = str_replace('class="favorite-toggle', $classes, $favorite_link);
        $favorite_link = str_replace('<a', '<button', $favorite_link);
        $favorite_link = str_replace('</a>', '</button>', $favorite_link);
        
        return $favorite_link;
    }
);

add_filter(
    'bbp_get_single_forum_description', function ( $description ) {

        $classes = "inline-table";
        $description = str_replace('<ul', '<ul class="' . $classes . '"', $description);

        return $description;
    }
);

add_filter(
    'bbp_get_single_forum_description', function ( $description ) {
        return $description;
    }
);

add_filter(
    'bbp_get_form_topic_type_dropdown', function ( $select_dropdown ) {

        $classes = 'bbp_dropdown mt-1 block w-full px-2 py-2 text-sm border-gray-300 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm rounded-md';
        $select_dropdown = str_replace('bbp_dropdown', $classes, $select_dropdown);

        return $select_dropdown;
    }
);

add_filter(
    'bbp_get_form_topic_status_dropdown', function ( $select_dropdown ) {

        $classes = 'bbp_dropdown mt-1 block w-full px-2 py-2 text-sm border-gray-300 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm rounded-md';
        $select_dropdown = str_replace('bbp_dropdown', $classes, $select_dropdown);

        return $select_dropdown;
    }
);

add_filter(
    'bbp_get_reply_class', function ( $classes ) {

        $classes[] = "flex";
        $classes[] = "justify-start";
        $classes[] = "space-x-5";

        return $classes;
    }
);

add_filter(
    'bbp_get_reply_content', function ( $reply_content ) {

        $reply_content = str_replace('p>', 'div>', $reply_content);

        return $reply_content;
    }
);

add_filter(
    'bbp_get_reply_author_link', function ( $author_link ) {

        $classes = 'photo w-12 h-12 rounded-md shadow-md';
        $author_link = str_replace('photo', $classes, $author_link);
        
        return $author_link;
    }
);

add_filter(
    'bbp_reply_admin_links', function ( $reply_admin_links ) {
        
        $classes = "bg-transparent text-gray-400 hover:text-rose-600 focus:ring-4 focus:outline-none focus:ring-rose-300 rounded-lg mx-2 transition duration-300";
        
        foreach ($reply_admin_links as &$element) {
            $element = str_replace('class="', 'class="' . $classes . ' ', $element);
        }
        
        return $reply_admin_links;
    }
);

add_filter(
    'bbp_get_reply_admin_links', function ( $reply_admin_links ) {
        $classes = "text-rose-400";
        $reply_admin_links = str_replace('|', '<span class="' . $classes . '"> | </span>', $reply_admin_links);
        return $reply_admin_links;
    }
);

add_filter(
    'bbp_get_single_topic_description', function ( $topic_description ) {
        
        $class_a = 'text-gray-400 hover:text-rose-600 transition';
        $allowed_tags = '<div><a><ul><li><span>';
        $topic_description = strip_tags($topic_description, $allowed_tags);
        $topic_description = str_replace('<a', '<a class="' . $class_a . '"', $topic_description);

        return $topic_description;
    }
);

add_filter(
    'bbp_get_reply_to_dropdown', function ( $reply_to_dropdown ) {
        
        $classes = 'bbp_dropdown mt-1 block w-full px-2 py-2 text-sm border-gray-300 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm rounded-md';
        $reply_to_dropdown = str_replace('bbp_dropdown', $classes, $reply_to_dropdown);

        return $reply_to_dropdown;
    }
);

add_filter(
    'bbp_get_form_reply_status_dropdown', function ( $reply_status_dropdown ) {
        
        $classes = 'bbp_dropdown mt-1 block w-full px-2 py-2 text-sm border-gray-300 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm rounded-md';
        $reply_status_dropdown = str_replace('bbp_dropdown', $classes, $reply_status_dropdown);

        return $reply_status_dropdown;
    }
);

add_filter(
    'bbp_get_dropdown', function ( $dropdown ) {
        
        $classes = 'bbp_dropdown mt-1 block w-full px-2 py-2 text-sm border-gray-300 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm rounded-md';
        $dropdown = str_replace('bbp_dropdown', $classes, $dropdown);

        return $dropdown;
    }
);

add_filter(
    'bbp_get_current_user_avatar', function ( $user_avatar ) {
        $user_avatar = str_replace('photo', 'photo h-16 w-16 rounded-full shadow-md', $user_avatar);
        return $user_avatar;
    }
);

add_filter(
    'bbp_get_user_languages_dropdown', function ( $languages_dropdown ) {
        
        $classes = 'id="locale" class="mt-1 block w-full px-2 py-2 text-sm border-gray-300 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm rounded-md"';
        $languages_dropdown = str_replace('id="locale"', $classes, $languages_dropdown);
        
        return $languages_dropdown;
    }
);

add_filter(
    'bbp_get_reply_content', function ( $reply_content ) {
        
        return $reply_content;
    }
);

add_filter(
    'bbp_get_topic_author_link', function ( $author_link ) {
        
        $author_link = str_replace('photo', 'photo rounded-md shadow-md', $author_link);
        return $author_link;
        
    }
);

add_filter(
    'bbp_get_topic_freshness_link', function ( $link ) {
        
        $classes = 'class="text-gray-400 hover:text-rose-600 transition"';
        $link = str_replace('">', '" ' . $classes . '>', $link );
        
        return $link;
    }
);
