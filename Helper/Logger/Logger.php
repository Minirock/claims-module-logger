<?php


namespace Aims\Logger\Helper\Logger;


use Zend\Log\Logger as ZendLogger;
use Zend\Log\Writer\Stream;

/**
 * Class Logger
 * @package Aims\Logger\Helper\Logger
 * Create log files in var/log
 */
class Logger implements ILogger
{

    /**
     * @var String $filename
     */
    private $filename;

    /**
     * @var ZendLogger $logger
     */
    private $logger;

    /**
     * Logger constructor.
     * @param $logFilename
     */
    public function __construct($logFilename)
    {
        $this->filename = $logFilename;
        $this->createLogger();
    }

    /**
     *
     */
    private function createLogger() {
        $writer = new Stream(BP . '/var/log/'.$this->filename.'.log');
        $this->logger = new ZendLogger();
        $this->logger->addWriter($writer);
    }

    /**
     * @param $filename
     */
    public function updateLoggerfile($filename) {
        $writer = new Stream(BP . '/var/log/'.$filename.'.log');
        $this->logger = new ZendLogger();
        $this->logger->addWriter($writer);
    }

    /**
     * @param $message
     * @param array $variables
     */
    public function logInfo($message, $variables = []) {
        $fullMessage = vsprintf($message,$variables);
        $this->logger->info("[INFO] ".$fullMessage);
    }

    /**
     * @param $message
     * @param array $variables
     */
    public function logSuccess($message, $variables = []) {
        $fullMessage = vsprintf($message,$variables);
        $this->logger->info("[SUCCESS] ".$fullMessage);
    }

    /**
     * @param $message
     * @param array $variables
     */
    public function logError($message, $variables = []) {
        $fullMessage = vsprintf($message,$variables);
        $this->logger->err("[FAILURE] ".$fullMessage);
    }
}
