# VdmVersionBundle

[![Build Status](https://travis-ci.org/3slab/VdmVersionBundle.svg?branch=master)](https://travis-ci.org/3slab/VdmVersionBundle)

This bundle provides a simple and standardized way to expose application version in a route.

## Installation

```shell script
composer require 3slab/vdm-version-bundle
```

And load the routes in `routing.yml` :

```yaml
vdm_version:
  resource: "@VdmVersionBundle/Resources/config/routing.yml"
  prefix:   /
```

## Configuration

Put your configuration in `config/packages/vdm_version.yaml` file. This is the default :

```yaml
vdm_version:
  secret: ~
  path: /version
  versions: ~
```

Parameter | Default | Description
--- | --- | ---
`vdm_version.secret` | `null` | if set, you need to provide the secret as a GET parameter `secret` or in the 
header `VDM-Version-Secret` to get the detailed result of the versions in the response body.
`vdm_version.path` | `/version` | Change the path of the version endpoint.
`vdm_version.versions` | see below | Configure the versions of the different services of your app

You configure the versions of the different services of your app by providing an array where the keys are the services names and the values the versions names.

```yaml
vdm_version:
  versions:
    frontend: '1.0'
    backend: '1.1'
``` 

When querying the `/version` endpoint, it returns the following response :

```json
{"frontend":"1.0","backend":"1.1"}
```
