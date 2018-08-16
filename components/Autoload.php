<?php
/**
 * Created by PhpStorm.
 * User: Sergeys
 * Date: 01.07.2018
 * Time: 9:01
 */
  function __autoload($class_name)
  {
      $array_paths =array(
          '/models/',
          '/components/'
      );
      foreach ($array_paths as $path){
          $path = ROOT. $path . $class_name . '.php';
          if (is_file($path)){
              include_once $path;
          }
      }
  }