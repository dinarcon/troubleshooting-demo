# Welcome

This repository is part of the troubleshooting demo of the [Divide and Conquer: A Systematic Approach to Troubleshooting](https://ddev.com/s/divide-and-conquer) presentation by:

* [Randy Fay](https://ddev.com/) - [@rfay](https://www.drupal.org/u/rfay) on Drupal.org
* [Mauricio Dinarte](https://understanddrupal.com/) - [@dinarcon](https://www.drupal.org/u/dinarcon) on Drupal.org

The slides are available at https://udrupal.com/divide-and-conquer.

# Setup

This repository contains a [Drupal 11 set up on DDEV](https://ddev.readthedocs.io/en/stable/users/quickstart/#drupal). Execute the following commands to get you started:

```
git clone https://github.com/dinarcon/troubleshooting-demo.git
cd troubleshooting-demo
ddev start
ddev composer install
ddev launch
```


# Exercises

Below are a series of exercises to practice your troubleshooting skills. Refer to [SOLUTIONS.md](/SOLUTIONS.md) to find answers to them.


## WSOD on status page

Install the site using the `moonshot` installation profile. Then visit Drupal's status report page. Can you determine why it yields a fatal PHP error?

```
ddev drush --yes site:install moonshot
ddev launch $(ddev drush uli)
ddev launch /admin/reports/status
```

## Hello page not found

Install the site using any installation profile. Enable the `hello_world` module and go to `/hello`. Anyone (including anonymous users) should see a welcome message, but a page not found error is presented instead. Why?

```
ddev drush site:install --yes --account-pass=admin demo_umami
ddev drush pm:enable hello_world
ddev launch /hello
```

## Permission not being detected

Install the site using any installation profile. Enable the `hello_world` module. The module is supposed to expose a permission named `Hello world allowed`, but it is not being detected. Go to the permissions page and verify the problem. Why?

```
ddev drush site:install --yes --account-pass=admin demo_umami
ddev drush pm:enable hello_world
ddev launch $(ddev drush uli)
ddev launch /admin/people/permissions
```
