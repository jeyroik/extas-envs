<?php
namespace extas\components\plugins\init;

use extas\components\envs\Env;

/**
 * Class InitEnvs
 *
 * @package extas\components\plugins\init
 * @author jeyroik@gmail.com
 */
class InitEnvs extends InitSection
{
    protected string $selfItemClass = Env::class;
    protected string $selfName = 'env param';
    protected string $selfSection = 'env';
    protected string $selfRepositoryClass = 'envRepository';
    protected string $selfUID = Env::FIELD__NAME;
}
