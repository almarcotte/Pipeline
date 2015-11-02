<?php

/**
 * Class MakeCapitals
 */
class MakeCapitals implements Gnumast\TaskInterface
{

    /**
     * @param mixed $data
     * @return string
     */
    public function run($data)
    {
        return mb_strtoupper($data);

    }

}