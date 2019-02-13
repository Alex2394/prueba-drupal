<?php

    /**
     * @file
     * Contains \Drupal\posts\Controller\PostsController.
     */
    namespace Drupal\posts\Controller;

    use Drupal\Core\Controller\ControllerBase;

    class PostsController extends ControllerBase {

      /**
       * Esta función hace el proceso de obtener los datos que una vez procesado devuelve las funciones de my_module.module
       */
      public function getList() {

        $data = array();
        $response = null;
        $response_d = null;
        $data = null;
        $result = null;
        $result_d = null;
        
        // La función que se llama es la que se delara en el archivo my_module.module
        if (function_exists('my_module_reponse')) {
          $response = my_module_reponse('http://jsonplaceholder.typicode.com/posts?_page=1&_limit=15', 'GET');
          $response_d = my_module_reponse('http://jsonplaceholder.typicode.com/photos?_page=1&_limit=5', 'GET');
        }

        if ($response && $response_d)
        {

          $result = json_decode($response);

          $result_d = json_decode($response_d);

          $data = array();

          $data['posts'] = $result;

          $data['images'] = $result_d;

          // Creamos un array el cual podremos renderizar en el html del modulo
          $build = array(
            '#theme' => 'posts_list', //Asignamos el theme correspondiente, en este caso es: posts-list.htmltwig
            '#title' => 'Posts',//Asignamos el titulo
            '#pagehtml' => 'data is coming from : posts/list ', // Asignamos un texto acompañante
            '#data' => $data //Asignamos el array que contiene los datos obtenidos y que seran desplegados en el theme
          );
        }
        return $build;
      }
    }
  ?>