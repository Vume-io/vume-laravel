<?php

namespace Vume\Laravel\Controllers;
use Vume\Laravel\Libraries\CMS as Vume;

class VumeController
{
    public function clearCache()
    {
        $vume = new Vume();
        $vume->clearCache();

        return true;
    }
}