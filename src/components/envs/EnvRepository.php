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
    protected $idAs = '';
    protected $scope = 'extas';
    protected $pk = Env::FIELD__NAME;
    protected $name = 'envs';
    protected $itemClass = Env::class;
}
