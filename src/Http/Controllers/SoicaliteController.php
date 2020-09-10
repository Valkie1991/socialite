<?php

namespace Henri\Socialite\Http\Controllers;

use Socialite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SocialiteController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function redirectToGitlab() {
        return Socialite::driver('gitlab')->redirect();
    }

    public function handleProviderCallback()
    {
        $gitlabUser = Socialite::driver('gitlab')->user();

        $userGitlab = Gitlab::updateOrCreate([
            'email' => $gitlabUser->getEmail(),
            'name' => $gitlabUser->getName(),
            'provider_id' => $gitlabUser->getId()
        ]);

        $test = Auth::login($user, true);

        return redirect($this->redirectTo);
    }

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
