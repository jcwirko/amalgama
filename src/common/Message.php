<?php

namespace Amalgama\Common;

final class Message
{
    private const DESTINATION = '../log/amalgama.log';
    private const MESSAGE_TYPE = 3;

    public static function info($message): void
    {
        $date = date('d-m-Y H:i:s');

        echo "<br> $message";
        error_log("$date: $message. \n\n", self::MESSAGE_TYPE, self::DESTINATION);
    }
}
