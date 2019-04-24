<?php
/**
 * @file
 * obra.features.inc
 */

/**
 * Implements hook_node_info().
 */
function obra_node_info() {
  $items = array(
    'obra_coleccion' => array(
      'name' => t('Obra/coleccion'),
      'base' => 'node_content',
      'description' => t('Use este espacio para crear una colección(obra)'),
      'has_title' => '1',
      'title_label' => t('Título'),
      'help' => '',
    ),
  );
  return $items;
}
