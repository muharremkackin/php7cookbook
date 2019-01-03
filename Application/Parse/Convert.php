<?php
/**
 * Created by PhpStorm.
 * User: ALKU
 * Date: 26.12.2018
 * Time: 02:29
 */

namespace Application\Parse;


class Convert
{

    public function scan($filename)
    {
        if (!file_exists($filename)) {
            throw new \Exception(self::EXCEPTION_FILE_NOT_EXISTS);
        }

        $contents = file($filename);
        echo "Processing: " . $filename . PHP_EOL;

        $result = preg_replace_callback_array([
            '!^<\%=(\n| )!' => function ($match) {
            return '<?php echo ' . $match[1];
            },
            '!\%\>!' => function ($match) {
            return '?>';
            }
        ]);
    }

}