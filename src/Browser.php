<?php

namespace MorningTrain\Laravel\React\Polyfill;

use hisorange\BrowserDetect\Parser;

class Browser extends Parser
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

        return true;
    }

    public static function supportsES5()
    {
        if (static::isIE() && static::browserVersion() <= 9) {
            return false;
        }

        return true;
    }

    public static function isLegacy()
    {
        if (static::isEvergreen()) {
            return false;
        }

        if (static::isIe()) {
            return true;
        }

        return false;
    }

    public static function isEvergreen()
    {
        if (static::isChrome()) {
            return true;
        }

        if (static::isFirefox()) {
            return true;
        }

        if (static::isOpera()) {
            return true;
        }

        return false;
    }

}
