<?php

namespace Gnumast;

/**
 * Allows creating a pipe task through an anonymous function
 *
 * Class CallablePipe
 * @package Gnumast
 */
class CallablePipe implements TaskInterface
{

    public function __construct(callable $function)
    {
        $this->function = $function;
    }

    /**
     * This method should contain the code to be executed by the task.
     * Override this in your task classes.
     *
     * @param mixed $data
     * @return mixed
     */
    public function run($data)
    {
        return call_user_func($this->function, $data);
    }
}