<?php

namespace App\Services;

use App\Models\LoggableInterface;
use App\Models\User;
use Psr\Log\LoggerInterface;

class ModelLogger
{
    use UserRepresentationTrait;
    private LoggerInterface $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function logModel(?User $user, LoggableInterface $loggable): void
    {       
        preg_match('/^.*\\\(\w*)$/', get_class($loggable), $match);
        $this->logger->info(
            $this->identifyUserRepresentation($user) . " accesed " . "{$match[1]} with id " . $loggable->getStringRepresentation(),
            $loggable->getData()
        );
    }
}
