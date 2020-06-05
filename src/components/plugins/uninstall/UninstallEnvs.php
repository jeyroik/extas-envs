<?php
namespace extas\components\plugins\uninstall;

use extas\components\envs\Env;

/**
 * Class UninstallEnvs
 *
 * @package extas\components\plugins\uninstall
 * @author jeyroik@gmail.com
 */
class UninstallEnvs extends UninstallSection
{
    protected string $selfItemClass = Env::class;
    protected string $selfName = 'env param';
    protected string $selfSection = 'env';
    protected string $selfRepositoryClass = 'envRepository';
    protected string $selfUID = Env::FIELD__NAME;
}
