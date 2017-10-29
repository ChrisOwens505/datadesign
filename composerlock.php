{
"_readme": [
"This file locks the dependencies of your project to a known state",
"Read more about it at https://getcomposer.org/doc/01-basic-usage.md#composer-lock-the-lock-file",
"This file is @generated automatically"
],
"content-hash": "a875a1472dcbe2966863b06b0927e721",
"packages": [
{
"name": "paragonie/random_compat",
"version": "v2.0.11",
"source": {
"type": "git",
"url": "https://github.com/paragonie/random_compat.git",
"reference": "5da4d3c796c275c55f057af5a643ae297d96b4d8"
},
"dist": {
"type": "zip",
"url": "https://api.github.com/repos/paragonie/random_compat/zipball/5da4d3c796c275c55f057af5a643ae297d96b4d8",
"reference": "5da4d3c796c275c55f057af5a643ae297d96b4d8",
"shasum": ""
},
"require": {
"php": ">=5.2.0"
},
"require-dev": {
"phpunit/phpunit": "4.*|5.*"
},
"suggest": {
"ext-libsodium": "Provides a modern crypto API that can be used to generate random bytes."
},
"type": "library",
"autoload": {
"files": [
"lib/random.php"
]
},
"notification-url": "https://packagist.org/downloads/",
"license": [
"MIT"
],
"authors": [
{
"name": "Paragon Initiative Enterprises",
"email": "security@paragonie.com",
"homepage": "https://paragonie.com"
}
],
"description": "PHP 5.x polyfill for random_bytes() and random_int() from PHP 7",
"keywords": [
"csprng",
"pseudorandom",
"random"
],
"time": "2017-09-27T21:40:39+00:00"
},
{
"name": "ramsey/uuid",
"version": "3.7.1",
"source": {
"type": "git",
"url": "https://github.com/ramsey/uuid.git",
"reference": "45cffe822057a09e05f7bd09ec5fb88eeecd2334"
},
"dist": {
"type": "zip",
"url": "https://api.github.com/repos/ramsey/uuid/zipball/45cffe822057a09e05f7bd09ec5fb88eeecd2334",
"reference": "45cffe822057a09e05f7bd09ec5fb88eeecd2334",
"shasum": ""
},
"require": {
"paragonie/random_compat": "^1.0|^2.0",
"php": "^5.4 || ^7.0"
},
"replace": {
"rhumsaa/uuid": "self.version"
},
"require-dev": {
"apigen/apigen": "^4.1",
"codeception/aspect-mock": "^1.0 | ^2.0",
"doctrine/annotations": "~1.2.0",
"goaop/framework": "1.0.0-alpha.2 | ^1.0 | ^2.1",
"ircmaxell/random-lib": "^1.1",
"jakub-onderka/php-parallel-lint": "^0.9.0",
"mockery/mockery": "^0.9.4",
"moontoast/math": "^1.1",
"php-mock/php-mock-phpunit": "^0.3|^1.1",
"phpunit/phpunit": "^4.7|>=5.0 <5.4",
"satooshi/php-coveralls": "^0.6.1",
"squizlabs/php_codesniffer": "^2.3"
},
"suggest": {
"ext-libsodium": "Provides the PECL libsodium extension for use with the SodiumRandomGenerator",
"ext-uuid": "Provides the PECL UUID extension for use with the PeclUuidTimeGenerator and PeclUuidRandomGenerator",
"ircmaxell/random-lib": "Provides RandomLib for use with the RandomLibAdapter",
"moontoast/math": "Provides support for converting UUID to 128-bit integer (in string form).",
"ramsey/uuid-console": "A console application for generating UUIDs with ramsey/uuid",
"ramsey/uuid-doctrine": "Allows the use of Ramsey\\Uuid\\Uuid as Doctrine field type."
},
"type": "library",
"extra": {
"branch-alias": {
"dev-master": "3.x-dev"
}
},
"autoload": {
"psr-4": {
"Ramsey\\Uuid\\": "src/"
}
},
"notification-url": "https://packagist.org/downloads/",
"license": [
"MIT"
],
"authors": [
{
"name": "Marijn Huizendveld",
"email": "marijn.huizendveld@gmail.com"
},
{
"name": "Thibaud Fabre",
"email": "thibaud@aztech.io"
},
{
"name": "Ben Ramsey",
"email": "ben@benramsey.com",
"homepage": "https://benramsey.com"
}
],
"description": "Formerly rhumsaa/uuid. A PHP 5.4+ library for generating RFC 4122 version 1, 3, 4, and 5 universally unique identifiers (UUID).",
"homepage": "https://github.com/ramsey/uuid",
"keywords": [
"guid",
"identifier",
"uuid"
],
"time": "2017-09-22T20:46:04+00:00"
}
],
"packages-dev": [],
"aliases": [],
"minimum-stability": "stable",
"stability-flags": {
"ramsey/uuid": 0
},
"prefer-stable": false,
"prefer-lowest": false,
"platform": [],
"platform-dev": []
}