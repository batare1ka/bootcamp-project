<?php 

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductionRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        return [
            "ip" => $request->ip(),
            "time: " => Carbon::now(),
            "full_url" => $request->fullUrl() 
        ];
    }
}
