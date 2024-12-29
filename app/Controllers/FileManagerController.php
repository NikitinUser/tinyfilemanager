<?php

namespace Nikitinuser\Tinyfilemanager\Controllers;

class FileManagerController
{
    public function index()
    {
        header("Content-Type: text/html; charset=utf-8");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        global $sticky_navbar, $favicon_path;
        $isStickyNavBar = $sticky_navbar ? 'navbar-fixed' : 'navbar-normal';

        return file_get_contents(__DIR__.'/../../resources/views/file_manager.html');
    }
}
