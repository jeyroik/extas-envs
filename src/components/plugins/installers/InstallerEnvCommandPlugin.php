<?php
namespace extas\components\plugins\installers;

use extas\commands\EnvCommand;
use extas\components\plugins\Plugin;

/**
 * Class InstallerEnvCommandPlugin
 *
 * @package extas\components\plugins\installers
 * @author jeyroik@gmail.com
 */
class InstallerEnvCommandPlugin extends Plugin
{
    /**
     * @return EnvCommand
     */
    public function __invoke()
    {
        return new EnvCommand();
    }
}
