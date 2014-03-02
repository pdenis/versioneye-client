<?php

include_once('../vendor/autoload.php');

$apiKey = '5eeac2ba8612f8d4f668';
$client = new \Snide\VersionEye\Client($apiKey);

echo '<pre>';
echo '<br /Fetch projects';

print_r($client->fetchProjects());

echo '<br /> Project Detail';
print_r($client->fetchProject(new \Snide\VersionEye\Model\Project("composer_pdenis_travinizer_1")));

echo '<br /> Create a project';

print_r($client->createProject('../composer.json'));


echo '<br /> Update a project';
print_r($client->updateProject(new \Snide\VersionEye\Model\Project('composer_snide_php_versioneye_client_1'), '../composer.json'));

echo '<br /> Fetch me';
print_r($client->fetchMe());

echo '<br /> Project User by username';
print_r($client->fetchUser(new \Snide\VersionEye\Model\User('pdenis')));

echo '<br />Ping service : ';
// Ping service
print_r($client->pingService());