# wait-for-listen


[![Packagist](https://img.shields.io/packagist/v/eiriksm/wait-for-listen.svg?maxAge=3600)](https://packagist.org/packages/eiriksm/wait-for-listen)
[![Packagist](https://img.shields.io/packagist/dt/eiriksm/wait-for-listen.svg?maxAge=3600)](https://packagist.org/packages/eiriksm/wait-for-listen)
[![Coverage Status](https://coveralls.io/repos/github/eiriksm/wait-for-listen/badge.svg?branch=master)](https://coveralls.io/github/eiriksm/wait-for-listen?branch=master)
[![Build Status](https://travis-ci.org/eiriksm/wait-for-listen.svg?branch=master)](https://travis-ci.org/eiriksm/wait-for-listen)
[![Violinist enabled](https://img.shields.io/badge/violinist-enabled-brightgreen.svg)](https://violinist.io)

## Installation

```
composer require eiriksm/wait-for-listen
```

...or probably you want this as a dev requirement:

```
composer require eiriksm/wait-for-listen --dev
```

## Usage

This package is useful to use in CI setups before your tests assume a service has started.

So instead of this:

```
- ./some-slow-starting-task-that-exposes-port 8000 &
- sleep 5
- composer test
```

You can now use this:

```
- ./some-slow-starting-task-that-exposes-port 8000 &
- ./vendor/bin/wait-for-listen 8000
```

## Configuration

`wait-for-listen` has 3 options. Port, host and timeout.

They are specified like this:

```
./vendor/bin/wait-for-listen <port> [host] [timeout]
```

### Port (required)

Specify a port to wait for.

### Host (optional)

Specify an optional host. The default is `127.0.0.1`.

### Timeout (optional)

Specify a timeout. The default is 10.

### Licence
WTFPL.
