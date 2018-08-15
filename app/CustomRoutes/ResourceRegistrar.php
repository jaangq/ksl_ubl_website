<?php

namespace App\CustomRoutes;
use Illuminate\Routing\ResourceRegistrar as OriginalRegistrar;

class ResourceRegistrar extends OriginalRegistrar {

      // add search to the array
      /**
      * The default actions for a resourceful controller.
      *
      * @var array
      */
      protected $resourceDefaults = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'search'];

      /**
      * Add the data method for a resourceful route.
      *
      * @param  string  $name
      * @param  string  $base
      * @param  string  $controller
      * @param  array   $options
      * @return \Illuminate\Routing\Route
      */

      protected function addResourceSearch($name, $base, $controller, $options)
      {
          $uri = $this->getResourceUri($name).'/search';

          $action = $this->getResourceAction($name, $controller, 'search', $options);

          return $this->router->get($uri, $action);
      }

}

 ?>
