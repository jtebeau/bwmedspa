<?php

//* **************** (: DEBUGGER :) **************** *//

if (!function_exists('pr')) {

    function pr ($c)
    {
        echo "<pre>";
        echo "*** You are printing: ***\n";
        print_r($c);
        echo "\n*** END ***";
        echo "</pre>";
    }

} else {
    echo "<h1>Debug error: pr() is alredy set!</h1>";
}

if (!function_exists('vd')) {

    function vd ($c)
    {
        echo "<pre>";
        echo "*** You are dumping: ***\n";
        var_dump($c);
        echo "\n*** END ***";
        echo "</pre>";
    }

} else {
    echo "<h1>Debug error: vd() is alredy set!</h1>";
}

if (!function_exists('phoenix_show_template_name')) {
    add_action('wp_footer', 'phoenix_show_template_name');
    function phoenix_show_template_name()
    {
        global $template;
        if( current_user_can('administrator') ){
            echo "<div style='text-align:center;font-size:smaller'>";
            print_r("To serve this page <strong>" . basename($template) . "</strong> is used.");
            echo "</div>";
        }
    }
} else {
    echo "<h1>Debug error: vd() is alredy set!</h1>";
}