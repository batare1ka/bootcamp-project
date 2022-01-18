<?php 
namespace App\Models;

interface LoggableInterface
{
    /**
     * Get Loggable unique name for message generation.
     * @return string
     */
    public function getStringRepresentation(): string;


    /**
     * Get Loggable object data for log context.
     * 
     * @return arrray
     */

    public function getData(): array;
}