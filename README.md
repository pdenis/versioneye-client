versioneye-client
=================

A PHP Client for [Version Eye](https://www.versioneye.com/) API

[![Build Status](https://travis-ci.org/pdenis/versioneye-client.png)](https://travis-ci.org/pdenis/versioneye-client)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/pdenis/versioneye-client/badges/quality-score.png?s=61cf7eaed508a94c8f30f1b21cd6dfa47cf483e5)](https://scrutinizer-ci.com/g/pdenis/versioneye-client/)
[![Code Coverage](https://scrutinizer-ci.com/g/pdenis/versioneye-client/badges/coverage.png?s=f46dd24eae904c3ad80456c403d4e3605006f2bd)](https://scrutinizer-ci.com/g/pdenis/versioneye-client/)


## Installation

### Installation by Composer

If you use composer, add versioneye-client library as a dependency to the composer.json of your application

```php
    "require": {
        ...
        "snide/php-versioneye-client": "dev-master"
        ...
    },

```

## Usage

### Projects

```php
<?php

    // Fetch projects

    $client->fetchProjects();

    // Project detail

    $client->fetchProject(new \Snide\VersionEye\Model\Project("composer_pdenis_travinizer_1");

    // Create a project

    $client->createProject('../composer.json');

    // Update a project

    $client->updateProject(new \Snide\VersionEye\Model\Project('composer_snide_php_versioneye_client_1'), '../composer.json');

```

### Users

```php
<?php

    // Fetch me

    $client->fetchMe();

    // Project User by username

    $client->fetchUser(new \Snide\VersionEye\Model\User('pdenis'));

```



### Ping Service


```php
<?php

    // Ping service

    $client->pingService();

```
