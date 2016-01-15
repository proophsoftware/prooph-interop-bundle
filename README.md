# Symfony container-interop bundle

## Overview
This Symfony bundle creates two services to have support for 
["container-interop"](https://github.com/container-interop/container-interop) in your Symfony application.

**Why?**

Well, we at prooph software GmbH create framework agnostic factories/libraries and don't want to configure for each
Framework new factories or service container. The factories are based on the container-interop specification and need
an service `config` in the container to retrieve different component configuration.

See [prooph-bundle project](https://github.com/proophsoftware/prooph-bundle "Symfony Bundle for prooph components") 
to get started out of the box with message bus, CQRS, event sourcing and snapshots of the prooph components.

## Configuration
In your `parameters.yml` you can define the key `interop_config` with a list of Symfony bundles where it's configuration
should be put into the `config` service. This bundle provides the default value `prooph`, so the prooph component config
can be used out of the box. It's also possible to add more values to the list, see this example

```yml
parameters:
    # other parameters in your parameters.yml
    interop_config: ['prooph', 'awesome_bundle', 'acme_bundle']
```

### Available services

* `interop_container`: Simple container-interop wrapper around the Symfony `Symfony\Component\DependencyInjection\ContainerInterface`
* `config`: Contains the bundle configuration which is used by the factories

## Installation

You can install prooph/prooph-interop-bundle via composer by adding `"proophsoftware/prooph-interop-bundle": "^0.1"` as requirement to your composer.json.

Don't forget to [enable this Bundle](http://symfony.com/doc/current/cookbook/bundles/installation.html#b-enable-the-bundle "Enable bundle").

## Support

- Ask questions on [prooph-users](https://groups.google.com/forum/?hl=de#!forum/prooph) mailing list.
- File issues at [https://github.com/proophsoftware/prooph-interop-bundle/issues](https://github.com/proophsoftware/prooph-interop-bundle/issues).
- Say hello in the [prooph gitter](https://gitter.im/prooph/improoph) chat.

## Contribute

Please feel free to fork and extend existing or add new plugins and send a pull request with your changes!
To establish a consistent code quality, please provide unit tests for all your changes and may adapt the documentation.

## License

Released under the [New BSD License](LICENSE).
