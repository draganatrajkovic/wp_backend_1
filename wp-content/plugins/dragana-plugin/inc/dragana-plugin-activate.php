<?php 

/**
 * @package DraganaPlugin
*/

class DraganaPluginActivate
{
    public static function activate() {
        flush_rewrite_rules();
    }
}
