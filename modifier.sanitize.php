<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty escape modifier plugin
 * 
 * Type:     modifier<br>
 * Name:     sanitize<br>
 * Purpose:  sanitize string for output
 * Example:  sanitize('Foo Bar') -> 'foo_bar'; sanitize('I-Like_Cheese And Wine', FALSE) -> i-like_cheeseandwine
 * 
 * @author Karen Ziv <karen@perlessence.com>
 * @param string $string input string
 * @param bool   $preserve_spaces if true, replace spaces with underscores (compacting multiple consecutive spaces), otherwise remove entirely
 * @return string escaped input string
 */
function smarty_modifier_sanitize($string, $preserve_spaces=TRUE) {

    $string = strtolower($string); // Lowercase the string

    // Remove unwanted characters
    $replacements = array('/\s+/' => $preserve_spaces ? '_' : '',
                          '/[^a-z0-9\-\_]/' => '',
                          );
    $string = preg_replace(array_keys($replacements), array_values($replacements), $string);

    return $string;
    
} 
