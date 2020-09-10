<?php

namespace Henri\Socialite\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class GitlabController extends Controller
{
    protected $redirectTo = '/dashboard';
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('gitlab')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $gitlabUser = Socialite::driver('gitlab')->user();

        $user = \App\User::updateOrCreate([
            'email' => $gitlabUser->getEmail(),
            'name' => $gitlabUser->getName(),
            'provider_id' => $gitlabUser->getId()
        ]);

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
