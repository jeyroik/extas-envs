<?php
namespace extas\components\envs;

use extas\components\repositories\Repository;
use extas\interfaces\envs\IEnvRepository;

/**
 * Class EnvRepository
 *
 * @package extas\components\envs
 * @author jeyroik@gmail.com
 */
class EnvRepository extends Repository implements IEnvRepository
{
    protected string $idAs = '';
    protected string $scope = 'extas';
    protected string $pk = Env::FIELD__NAME;
    protected string $name = 'envs';
    protected string $itemClass = Env::class;
}
