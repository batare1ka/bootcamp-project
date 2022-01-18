<?php

namespace App\Http\Middleware;

use App\Services\DebugRequestActivityLogger;
use App\Services\DummyRequestActivityLogger;
use App\Services\ProductionRequestActivityLogger;
use Closure;
use Illuminate\Http\Request;

class LogActivityMiddleware
{
    private DummyRequestActivityLogger $logger;
    private DebugRequestActivityLogger $debug_logger;
    private ProductionRequestActivityLogger $production_logger;
    /**
     * @param DummyRequestActivityLogger $logger
     */
    public function __construct(DummyRequestActivityLogger $logger, DebugRequestActivityLogger $debug_logger, ProductionRequestActivityLogger $production_logger)
    {
        $this->logger = $logger;
        $this->debug_logger = $debug_logger;
        $this->production_logger =$production_logger;
    }
    /**
     * @param Request $request
     * @param Closure $next
     * @param string|null $type
     */
    public function handle($request, Closure $next, ?string $type = null)
    {
        $this->logger->logRequest($request, $type ?? 'unknown page');
        $this->debug_logger->logRequest($request, $type ?? 'unknown page');
        $this->production_logger->logRequest($request, $type ?? 'unknown page');
        return $next($request);
    }
}
