<?php 

/**
 * @package DraganaPlugin
*/

class DraganaPluginDeactivate
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}