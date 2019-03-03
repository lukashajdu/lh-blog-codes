<?php

namespace Lh;

interface CarFactoryInterface
{
    public function addBody(BodyInterface $body): CarFactory;

    public function addEngine(EngineInterface $engine): CarFactory;

    public function addDoor(DoorInterface $door);

    public function addWheel(WheelInterface $wheel);

    public function assembly();
}
