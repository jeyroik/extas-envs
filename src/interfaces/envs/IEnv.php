<?php
namespace extas\interfaces\envs;

use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IHasValue;
use extas\interfaces\IItem;

/**
 * Interface IEnv
 *
 * @package extas\interfaces\envs
 * @author jeyroik@gmail.com
 */
interface IEnv extends IItem, IHasName, IHasValue, IHasDescription
{
    const SUBJECT = 'extas.env';
}
