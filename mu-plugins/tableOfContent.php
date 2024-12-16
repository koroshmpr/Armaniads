<?php
/*
Plugin Name: Custom Table of Contents
Description: Automatically add semantic IDs to H2 and H3 headings and generate a table of contents shortcode.
Version: 1.0
Author: korosh mpr
*/

// Global counter for heading IDs
$heading_counter = 0; // Use a single counter for all headings

// Automatically add semantic IDs to H2 and H3 headings
function auto_id_headings($content)
{
    // Match only h2 and h3 tags
    $content = preg_replace_callback('/(<h[2-3](.*?))>(.*?)(<\/h[2-3]>)/i', function ($matches) {
        // Generate a semantic ID based on the heading content
        $heading_text = strip_tags($matches[3]);
        $semantic_id = sanitize_title_with_dashes($heading_text); // Creates a URL-friendly ID

        // Add the ID attribute if not already present
        if (!stripos($matches[0], 'id=')) {
            return $matches[1] . $matches[2] . ' id="' . $semantic_id . '">' . $matches[3] . $matches[4];
        }

        return $matches[0];
    }, $content);

    return $content;
}


add_filter('the_content', 'auto_id_headings');

// Function to get the table of contents
function get_toc($content)
{
    // Get only H2 and H3 headings
    $headings = get_headings($content, 2, 3); // Only h2, h3
    // Parse toc
    ob_start();
    echo "<div class='table-of-contents text-white w-fit mx-auto px-6 lg:px-0'>";
    echo "<p class='text-xl font-bold pb-3 border-b border-white lg:mb-3 mb-6'>آنچه در این مقاله می‌خوانید:</p>";
    parse_toc($headings, 0, 0);
    echo "</div>";
    return ob_get_clean();
}

// Parse the headings and generate the TOC HTML
function parse_toc($headings, $index, $recursive_counter)
{
    if ($recursive_counter > 60 || !count($headings)) return;

    $last_element = $index > 0 ? $headings[$index - 1] : NULL;
    $current_element = $headings[$index];
    $next_element = NULL;
    if ($index < count($headings) && isset($headings[$index + 1])) {
        $next_element = $headings[$index + 1];
    }

    if ($current_element == NULL) return;

    $tag = intval($headings[$index]["tag"]);
    $id = $headings[$index]["id"];
    $classes = $headings[$index]["classes"] ?? array();
    $name = $headings[$index]["name"];

    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("nitoc", $current_element["classes"])) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
        return;
    }

    if ($last_element == NULL) echo "<ul class='list-disc list-inside'>";
    if ($last_element != NULL && $last_element["tag"] < $tag) {
        for ($i = 0; $i < $tag - $last_element["tag"]; $i++) {
            echo "<ul class='list-disc ps-2 list-inside'>";
        }
    }

    $li_classes = "";
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) $li_classes = " class='bold'";

    echo "<li" . $li_classes . ">";
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) {
        echo $name;
    } else {
        echo "<a class='hover:text-cyan-500' href='#" . $id . "'>" . $name . "</a>";
    }
    if ($next_element && intval($next_element["tag"]) > $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }

    echo "</li>";
    if ($next_element && intval($next_element["tag"]) == $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }

    if ($next_element == NULL || ($next_element && $next_element["tag"] < $tag)) {
        echo "</ul>";
        if ($next_element && $tag - intval($next_element["tag"]) >= 2) {
            echo "</li>";
            for ($i = 1; $i < $tag - intval($next_element["tag"]); $i++) {
                echo "</ul>";
            }
        }
    }

    if ($next_element != NULL && $next_element["tag"] < $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }
}

// Function to extract only H2 and H3 headings from the content
function get_headings($content, $from_tag = 2, $to_tag = 3)
{
    $headings = array();
    // Only match h2 and h3 tags
    preg_match_all("/<h([" . $from_tag . "-" . $to_tag . "])([^<]*)>(.*)<\/h[" . $from_tag . "-" . $to_tag . "]>/", $content, $matches);
    for ($i = 0; $i < count($matches[1]); $i++) {
        $headings[$i]["tag"] = $matches[1][$i];
        $att_string = $matches[2][$i];
        preg_match("/id=\"([^\"]*)\"/", $att_string, $id_matches);
        $headings[$i]["id"] = $id_matches[1];
        preg_match_all("/class=\"([^\"]*)\"/", $att_string, $class_matches);
        for ($j = 0; $j < count($class_matches[1]); $j++) {
            $headings[$i]["classes"] = explode(" ", $class_matches[1][$j]);
        }
        $headings[$i]["name"] = strip_tags($matches[3][$i]);
    }
    return $headings;
}

// TOC Shortcode
function toc_shortcode()
{
    return get_toc(auto_id_headings(get_the_content()));
}

add_shortcode('TOC', 'toc_shortcode');
