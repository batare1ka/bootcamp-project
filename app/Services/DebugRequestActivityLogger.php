<?php 

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DebugRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        return [
            "url" => $request->url(),
            "method" => $request->method(),
            "time: " => Carbon::now()


        ];
    }
}