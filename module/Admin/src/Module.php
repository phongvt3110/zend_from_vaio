<?php

namespace Admin;

class Module
{
    const VERSION = '3.0.2';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}