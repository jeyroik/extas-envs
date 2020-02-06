<?php
namespace extas\components\envs;

use extas\components\Item;
use extas\components\THasDescription;
use extas\components\THasName;
use extas\components\THasValue;
use extas\interfaces\envs\IEnv;

/**
 * Class Env
 *
 * @package extas\components\envs
 * @author jeyroik@gmail.com
 */
class Env extends Item implements IEnv
{
    use THasName;
    use THasValue;
    use THasDescription;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
