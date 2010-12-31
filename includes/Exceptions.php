<?php

/**
 * @author     Ignas Rudaitis <ignas.rudaitis@gmail.com>
 * @copyright  2010 Ignas Rudaitis
 * @license    http://www.opensource.org/licenses/mit-license.html
 * @link       http://antecedent.github.com/patchwork
 */
namespace Patchwork\Exceptions;

use Patchwork\Utils;
use Patchwork\Call;

abstract class Exception extends \Exception
{
}

class PatchEscaped extends Exception
{
}

class StackEmpty extends Exception
{
    protected $message = "There are no calls in the dispatch stack";
}

abstract class CallbackException extends Exception
{
    function __construct($callback)
    {
        parent::__construct(sprintf($this->message, Utils\callbackToString($callback)));
    }
}

class NotImplemented extends CallbackException
{
    protected $message = "%s is not implemented";
}

class NotDefined extends CallbackException
{
    protected $message = "%s is not defined";
}

class NotPreprocessed extends CallbackException
{
    protected $message = "%s is not defined in a preprocessed file";
}
