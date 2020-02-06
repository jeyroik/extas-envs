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
    protected $selfItemClass = Env::class;
    protected $selfName = 'env param';
    protected $selfSection = 'env';
    protected $selfRepositoryClass = IEnvRepository::class;
    protected $selfUID = Env::FIELD__NAME;
}
