<?php
namespace Component;

use Symfony\Component\Dotenv\Dotenv;
use Composer\Script\Event;

class EnvHandler
{
    public static function loadEnvFiles(Event $event)
    {
        $extras = $event->getComposer()->getPackage()->getExtra();

        if (!isset($extras['env-files'])) {
            throw new \InvalidArgumentException('The ENV files needs to be configured through the extra.env-files setting.');
        }

        $configs = $extras['env-files'];

        if (!is_array($configs)) {
            throw new \InvalidArgumentException('The extra.env-files setting must be an array or a configuration object.');
        }

        if (array_keys($configs) !== range(0, count($configs) - 1)) {
            $configs = array($configs);
        }

        $dotenv = new Dotenv();

        foreach ($configs as $config) {
            if (!is_file($config)) {
                throw new \InvalidArgumentException( sprintf('The extra.env-files has invalid file "%s" defined.', $config) );
            }

            $dotenv->load($config);
        }
    }
}