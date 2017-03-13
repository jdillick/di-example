# Dependency Injection Example

DI should not be confusing!

Dependency Injection is a **very** simple concept that often gets conflated with the Dependency Injection Container, which is a related pattern, but because of its simplicity I think the OOP community just skips over this essential idea. When I started out with this pattern, this threw me for a loop.

You must first understand this very simple pattern, and then you can move on the container concept.

## How to use this Repo

Here is a trivial web application written in PHP that I put together to demonstrate the Dependency Injection concept for the [Columbus PHP Meetup](https://www.meetup.com/phpphp/). See the slides below.

1. First take a gander at the **without-di** branch and familiarize yourself with this trivial "hello-world" web application.
  - It bootstraps in the app.php file, and this instantiates a simple application Core.
  - In src/App/Core.php, notice the dependencies that are instantiated to create a Router object, and to create individual routes.
2. Now switch over to the **with-di-basic** branch and notice how app.php now passes in a couple dependencies to the Core object at instantiation.
  - This "passing of dependencies" (*fancy pants* name for this is "Inversion of Control") into the context where they are being used is the whole "Dependency Injection" pattern.
  - It's really that simple. If you are passing in your dependencies, instead of creating your dependencies internally in your dependent classes, you are following the DI pattern.
  - This branch demonstrates injection into an object constructor method, but you can also use setter methods for the purpose of injection.
3. How's the related, but optional, DI container concept relate to Dependency Injection? Saunter over to the **with-di-container** branch.
  - Now the app.php bootstrap file is using a container library called [PHP-DI](http://php-di.org/), which I especially recommend if you just want to get acquainted with using a DI container **with** your DI patterned code.
  - You don't need to understand how this particular container works, only to understand that it aids you by giving you an instantiated object, and injecting its dependencies for you. PHP-DI has an "auto-wiring" mode which can automatically determine what dependencies are needed for your class (and their dependencies), and it does all the work for you of "wiring it up". Great for development.

  ```
  // Gives me an instance Core, complete with dependencies
  // that I can call the serve method on.
  $container = ContainerBuilder::buildDevContainer();
  $container->get('App\Core')->serve(new Request($_SERVER));
  ```

## Slides

[Presentation Slides](https://www.slideshare.net/johndillick/dependency-injection-flash-talk)
