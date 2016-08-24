<?php

namespace REBELinBLUE\Deployer\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use REBELinBLUE\Deployer\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var string
     */
    protected $subject;

    /**
     * Where to redirect to once the password has been reset.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new password controller instance.
     */
    public function __construct()
    {
        $this->subject = Lang::get('emails.reset_subject');

        $this->middleware('guest');
    }
}
