<?php

namespace Tests\Feature\Admin;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeController extends BrowserKitTestCase
{
    public function index()
    {
        $this
            ->get('/admin')
            ->assertResponseStatus(200);
    }
}
