# Solutions

Below are the solutions to the exercises.


## WSOD on status page

Custom installation profiles require a `version` key in their `*.info.yml` file. Relevant documentation: [Info file strcuture](https://www.drupal.org/docs/develop/creating-modules/let-drupal-know-about-your-module-with-an-infoyml-file) and this [Drupal core issue](https://www.drupal.org/project/drupal/issues/3270892).

```
echo 'version: 1.0.0' >> web/profiles/moonshot/moonshot.info.yml 
ddev launch $(ddev drush uli)
ddev launch /admin/reports/status
```

The final content of the `web/profiles/moonshot/moonshot.info.yml` file should look like this:

```yaml
name: Moonshot
type: profile
description: 'Example installation profile'
core_version_requirement: ^10 || ^11
install:
  - node
  - block
  - breakpoint
  - dblog
  - page_cache
  - dynamic_page_cache
  - toolbar
themes:
  - claro
version: 1.0.0

```

The order of the `version` key in the file is not relevant.

## Hello page not found

The `web/modules/custom/hello_world/hello_world.routing.yml` file is not properly indented. The `_controller` key line 5 needs an extra layer of indentation. It should be a child of `defaults` in line 3. Relevant documentation: [Routing system overview](https://www.drupal.org/docs/drupal-apis/routing-system/routing-system-overview) and [Structure of routes](https://www.drupal.org/docs/drupal-apis/routing-system/structure-of-routes).

```
ddev exec -- sed -i "s/_controller/\ \ _controller:/" web/modules/custom/hello_world/hello_world.routing.yml
```

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

The `web/modules/custom/hello_world/hello_world.routing.yaml` file does not have the proper file extension. Drupal uses `*.yml`, instead of `*.yaml`, as the extension for YAML files. Relevant documentation: [YAML Configuration files](https://www.drupal.org/docs/develop/coding-standards/configuration-file-coding-standards) and [Roles and permissions](https://www.drupal.org/docs/roles-and-permissions).

```
mv web/modules/custom/hello_world/hello_world.permissions.yaml web/modules/custom/hello_world/hello_world.permissions.yml
```

Make sure the `hello_world` world module is enabled. You should see the new `Example permission` in the permissions page.
