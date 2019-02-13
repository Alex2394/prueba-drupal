<?php

namespace Drupal\drupalup_controller\Controller;

use Drupal\Core\Controller\ControllerBase;

class ArticleController extends ControllerBase {

  /**
  * Callback function to get the data from REST API
  */
  
  public function page() {
    $items = array(
      array(
        array('name' => 'Article one'),
        array('name' => 'Article two'),
        array('name' => 'Article three'),
        array('name' => 'Article four'),
        array('name' => 'Article five')
      )
    );

    $values =  array(
      array('name' => 'Article one'),
      array('name' => 'Article two'),
      array('name' => 'Article three'),
      array('name' => 'Article four')
    );

    print_r($items);
    print_r($values);

    return array(
      '#theme' => 'article_list',
      '#items' => $items,
      '#title' => 'Our article list'
    );
  }
}
?>