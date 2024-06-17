<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckApplicationDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user) {
            $lastApplicationDate = $user->last_application_date;

            if ($lastApplicationDate && Carbon::parse($lastApplicationDate)->isToday()) {
                return redirect()->back()->with('error','Siz bir kunda faqat bir marotaba ariza yubora olasiz');
            }
        }

        return $next($request);
    }
}
