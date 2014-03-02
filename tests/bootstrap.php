<?php

/*
 * This file is part of the Snide scrutinizer-client package.
 *
 * (c) Pascal DENIS <pascal.denis.75@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$baseDir = dirname(__DIR__.'/../');
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('Snide\\VersionEye', array($baseDir.'/src/', $baseDir.'/tests/'));
$loader->register();
