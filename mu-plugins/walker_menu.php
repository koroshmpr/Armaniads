<?php

class Custom_Walker_Nav_Menu_With_Alpine extends Walker_Nav_Menu
{
    // Add custom classes and Alpine.js directives to ul submenu in level 2
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        if ($depth === 1) { // Target the second level
            $output .= '<ul class="custom-submenu-level-2 hidden">';
        } else {
            // Use Alpine.js x-show and transition directives for smooth animation with :class
            $output .= '<ul :class="open ? \'lg:py-8 py-4 scale-100 opacity-100\' : \'h-0 opacity-0 scale-0\'" class="sub-menu no-underline lg:flex grid lg:gap-8 gap-5 lg:text-lg text-sm duration-500 transition-all">';
        }
    }

    // Add Alpine.js functionality to li in level 1 for hover
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        // Check if the item has children by checking for the 'menu-item-has-children' class
        $classes = !empty($item->classes) ? (array) $item->classes : array();
        $has_children = in_array('menu-item-has-children', $classes);

        // Add specific classes for current menu items and ancestor items
        $current_class = '';
        if (in_array('current-menu-item', $classes)) {
            $current_class = ' current-menu-item';
        } elseif (in_array('current-menu-ancestor', $classes)) {
            $current_class = ' current-menu-ancestor';
        } elseif (in_array('current-menu-parent', $classes)) {
            $current_class = ' current-menu-parent';
        }

        if ($depth === 0) { // Target the first level
            $output .= '<li x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="grid parent-menu-item justify-center' . esc_attr($current_class) . '">';
        } elseif ($depth === 1) { // Target the second level
            $output .= '<li class="w-fit hover:text-secondary overflow-visible' . esc_attr($current_class) . '">';
        } else {
            $output .= '<li class="' . esc_attr($current_class) . '">';
        }

        // Get the menu item link and title
        $attributes = !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
        $item_output = $args->before;
        $item_output .= '<a class="flex gap-2 items-center transition-all hover:scale-110 justify-center"' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

        // Append an SVG icon if the item has children (parent item)
        if ($has_children) {
            $item_output .= '<svg width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
            </svg>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after;

        // Append the item output to the $output variable
        $output .= $item_output;
    }
}