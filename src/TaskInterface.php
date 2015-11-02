<?php

namespace Gnumast;

/**
 * Class PipeTask
 * @package Gnumast
 */
interface TaskInterface
{

    /**
     * This method should contain the code to be executed by the task.
     * Override this in your task classes.
     *
     * @param mixed $data
     * @return mixed
     */
    public function run($data);

}