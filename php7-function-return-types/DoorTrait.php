<?php

namespace Lh;

trait DoorTrait
{
    /** @var DoorInterface[] */
    private $doors;

    public function addDoor(DoorInterface $door): self
    {
        $this->doors[] = $door;

        return $this;
    }
}
