<?php


namespace Aims\Logger\Helper\Logger;


interface ILogger
{
    public function logInfo($message,$variables = []);
    public function logSuccess($message,$variables = []);
    public function logError($message,$variables = []);

}