<?php

namespace App\Http\Middleware;

use Closure;
use Psr\Log\LoggerInterface;
use Illuminate\Http\Request;

class LogActivityMiddleware
{
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
        $user = $request->getUser();
        $this->logger->debug(
            $this->identifyUserRepresentation($user) . "made a request to " . ($type ?? 'unknown page'),
            ['data placeholder']
        );
        return $next($request);
    }
}
