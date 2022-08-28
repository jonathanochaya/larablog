<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        $flash_message = "You are now signed up for our nesletter!";

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            $flash_message = "This email could not be added to our mailing list.";
        }

        return redirect(route('home'))->with('message', $flash_message);
    }
}
