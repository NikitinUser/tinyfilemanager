<?php

namespace Nikitinuser\Tinyfilemanager\Controllers;

class AuthController
{
    /**
     * post
     */
    public function login()
    {
        $_POST['login'];
        $_POST['pass'];
        // ToDo check login pass
        // ToDo create token

        return '';
    }

    public function getLoginForm()
    {
        // ToDo

        header("Content-Type: text/html; charset=utf-8");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        global $favicon_path;

        return file_get_contents(__DIR__.'/../../resources/views/login_form.html');
    }

    /**
     * post
     */
    public function logout()
    {
        // ToDo remove token
        header('Location: '.FM_SELF_URL, true, 302);
        exit;
    }
}
