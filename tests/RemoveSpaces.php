<?php

/**
 * Class RemoveSpaces
 */
class RemoveSpaces implements Gnumast\TaskInterface
{

    /**
     * @param mixed $data
     * @return mixed
     */
    public function run($data)
    {
        return str_replace(' ', '', $data);
    }

}