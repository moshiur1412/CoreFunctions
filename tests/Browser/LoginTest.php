<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @group login-test
     */
    public function testAUserCanLogin(){

        $user = factory(User::class)->create();

        $this->browse(function(Browser $browser) use($user){
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }
}
