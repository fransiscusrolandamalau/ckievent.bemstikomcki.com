<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('guest');
    }
}
