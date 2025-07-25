# Solutions

Below are the solutions to the exercises.

## Hello page not found (404)

### Suggestions

* This seems to be about an error or omission in the `hello_world` module, so take a look at its configuration files.
* There are three configuration files. Look at them and compare them to another working module's configuration files. Look at the routes [docs and configuration](https://www.drupal.org/docs/drupal-apis/routing-system/structure-of-routes).
* If you can't see what might be wrong with the routing file, ask a friend or ChatGPT to look at it with you and make an explicit comparison with the Drupal documentation and other modules.

### Answer

The `web/modules/custom/hello_world/hello_world.routing.yml` file is not properly indented. The `_controller` key line 5 needs an extra layer of indentation - it is supposed to be a child of `defaults` in line 3. Relevant documentation: [Routing system overview](https://www.drupal.org/docs/drupal-apis/routing-system/routing-system-overview) and [Structure of routes](https://www.drupal.org/docs/drupal-apis/routing-system/structure-of-routes).

Edit `web/modules/custom/hello_world/hello_world.routing.yml` to add the two spaces before `_controller`.

The final content of the `web/modules/custom/hello_world/hello_world.routing.yml` file should look like this:

```yaml
hello_world.salute:
  path: '/hello'
  defaults:
    _title: 'Hello'
    _controller: '\Drupal\hello_world\Controller\HelloWorldController::salute'
  requirements:
    _access: 'TRUE'
```

## Permission not being detected

### Suggestions

* It's a good assumption that this is a relatively simple problem with configuration files.
* Read the [permissions documentation](https://www.drupal.org/docs/roles-and-permissions) and compare the permissions file here to the docs and to other modules that are working.
* Ask a friend or ChatGPT to take a look and compare the permissions configuration file to other working files or to the documentation.

### Answer

The `web/modules/custom/hello_world/hello_world.routing.yaml` file does not have the proper file extension. Drupal uses `*.yml` and does not recognize `*.yaml` as an extension for YAML files. Relevant documentation: [YAML Configuration files](https://www.drupal.org/docs/develop/coding-standards/configuration-file-coding-standards) and [Roles and permissions](https://www.drupal.org/docs/roles-and-permissions).

```
mv web/modules/custom/hello_world/hello_world.permissions.yaml web/modules/custom/hello_world/hello_world.permissions.yml
```

Make sure the `hello_world` world module is enabled. You should see the new `Hello world allowed` in the permissions page.
