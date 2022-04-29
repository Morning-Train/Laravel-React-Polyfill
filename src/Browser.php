<?php

namespace MorningTrain\Laravel\React\Polyfill;

use hisorange\BrowserDetect\Facade as BrowserDetect;

class Browser
{

    public static function supportsES6()
    {
        if (static::isIE()) {
            return false;
        }

        if (static::isSafari()) {
            if (static::browserVersion() < 10) {
                return false;
            }

            return true;
        }

        if(static::isOperaMini()) {
            return false;
        }

        if(!static::isEvergreen()) {
            return false;
        }

        return true;
    }

    public static function supportsES5()
    {
        if(static::isEvergreen()) {
            return true;
        }

        if (static::isIE() && static::browserVersion() <= 9) {
            return false;
        }

        if(static::isEdge()) {
            return true;
        }

        if(static::isOperaMini()) {
            return false;
        }

        return true;
    }

    public static function isOperaMini()
    {
        return static::isOpera() && static::isMobile();
    }

    public static function isEvergreen()
    {
        if (static::isChrome() && static::browserVersion() >= 51) {
            return true;
        }

        if (static::isFirefox() && static::browserVersion() >= 54) {
            return true;
        }
        if (static::isEdge() && static::browserVersion() >= 79) {
            return true;
        }

        if (static::isOpera() && !static::isMobile()) {
            return true;
        }

        return false;
    }

    public static function isMobile()
    {
        return BrowserDetect::isMobile();
    }

    public static function isTablet()
    {
        return BrowserDetect::isTablet();
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([BrowserDetect::class, $name], $arguments);
    }

}
