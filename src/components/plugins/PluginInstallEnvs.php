<?php
namespace extas\components\plugins;

use extas\components\envs\Env;
use extas\interfaces\envs\IEnvRepository;

/**
 * Class PluginInstallEnvs
 *
 * @package extas\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallEnvs extends PluginInstallDefault
{
    protected string $selfItemClass = Env::class;
    protected string $selfName = 'env param';
    protected string $selfSection = 'env';
    protected string $selfRepositoryClass = IEnvRepository::class;
    protected string $selfUID = Env::FIELD__NAME;
}
