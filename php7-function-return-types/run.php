<?php

spl_autoload_register(function ($className) {
    include sprintf('%s.php', str_replace('Lh\\', '', $className));
});

$carFactory = new \Lh\CarFactory();

$carFactory
    ->addBody(new \Lh\SportBody())
    ->addEngine(new \Lh\V8Engine())
    ->addDoor(new \Lh\SportDoor())
;
