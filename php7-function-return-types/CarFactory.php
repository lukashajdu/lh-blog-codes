<?php

namespace Lh;

class CarFactory implements CarFactoryInterface
{
    use DoorTrait;

    /** @var EngineInterface */
    private $engine;

    /** @var BodyInterface */
    private $body;

    /** @var WheelInterface[] */
    private $wheels;

    public function addBody(BodyInterface $body): CarFactory
    {
        $this->body = $body;

        return $this;
    }

    public function addEngine(EngineInterface $engine): CarFactory
    {
        $this->engine = $engine;

        return $this;
    }

    public function addWheel(WheelInterface $wheel): self
    {
        $this->wheels[] = $wheel;

        return $this;
    }

    public function assembly()
    {
        // return car
    }
}
