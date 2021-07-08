<?php

namespace Vume\Laravel\Libraries;

use Vume\CMS as VumeCMS;

class CMS
{
    protected $vume;

    public function __construct()
    {
        $this->vume = new VumeCMS(config('vume.api_access_token'));
        $this->vume->setApiEndpoint(config('vume.api_endpoint'));

        if(config('vume.caching')) {
            $this->vume->setCaching(true);
        }

        if(config('vume.caching_dir')) {
            $this->vume->setCachingDir(config('vume.caching_dir'));
        }
    }

    public function __call($method, $args)
    {
        if (method_exists($this->vume, $method)) {
            return call_user_func_array([$this->vume, $method], $args);
        }
    }
}
