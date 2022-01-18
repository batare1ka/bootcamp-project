<?php

namespace App\Http\Middleware;

use App\Services\UserRepresentationTrait;
use Closure;
use Psr\Log\LoggerInterface;
use Illuminate\Http\Request;

class LogActivityMiddleware
{
    use UserRepresentationTrait;
    private LoggerInterface $logger;
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    /**
     * @param Request $request
     * @param Closure $next
     * @param string|null $type
     */
    public function handle($request, Closure $next, ?string $type = null)
    {
        /**
         * @var User $user
         */
        $this->logger->debug(
            $this->identifyUserRepresentation($request->user()) . "made a request to " . ($type ?? 'unknown page'),
            ['data placeholder']
        );
        return $next($request);
    }
}
