<?php

namespace Vume\Laravel\Tests;

use Vume\Laravel\Facades\CMS as Vume;

use Orchestra\Testbench\TestCase;
use Vume\Laravel\Providers\VumeServiceProvider;

class CmsTest extends TestCase
{
    protected $test_access_token = 'VM.wDScs0mOBkl1rRbUJtf9oPEQMeC24gWh5AqxKvGzNuXI3VZY6dTHijn7LpaF8';

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            VumeServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        //
    }

    public function testSectionEntryValue()
    {
        $entry = Vume::setAccessToken($this->test_access_token)->section('section-test')->entry();

        $this->assertEquals('Hello world', $entry->value('text'));
    }

    public function testSectionEntryInheritLocale()
    {
        config(['vume.inherit_app_locale' => true]);
        app()->setLocale('nl');

        $entry = Vume::setAccessToken($this->test_access_token)->section('section-test')->entry();

        $this->assertEquals('Hello world nl', $entry->value('text'));
    }

    public function testSectionEntryIgnoreLocale()
    {
        config(['vume.inherit_app_locale' => false]);
        app()->setLocale('nl');

        $entry = Vume::setAccessToken($this->test_access_token)->section('section-test')->entry();

        $this->assertEquals('Hello world', $entry->value('text'));
    }
}
