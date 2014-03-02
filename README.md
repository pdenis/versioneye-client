versioneye-client
=================

A PHP Client for [Version Eye](https://www.versioneye.com/) API

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
