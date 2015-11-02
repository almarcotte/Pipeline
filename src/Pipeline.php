<?php

namespace Gnumast;

class Pipeline
{

    /**
     * @var array
     */
    protected $pipes = [];

    /**
     * Pipeline constructor.
     * @param ...$pipes
     */
    public function __construct(...$pipes)
    {
        $this->pipes = $pipes;
    }

    /**
     * @param TaskInterface $pipe
     */
    public function add(TaskInterface $pipe)
    {
        $this->pipes[] = $pipe;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function execute($data)
    {
        return array_reduce($this->pipes, function ($data, TaskInterface $step) {
            return $step->run($data);
        }, $data);
    }

}