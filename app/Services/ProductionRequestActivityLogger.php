<?php 

namespace App\Services;
use Illuminate\Http\Request;

class ProductionRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        return [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "country" => $request->input('country'),
            "region" => $request->input('region'),
            "ip" => $request->ip()
        ];
    }
}
