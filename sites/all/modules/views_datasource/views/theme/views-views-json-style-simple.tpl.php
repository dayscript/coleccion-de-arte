<?php
/**
 * @file views-views-json-style-simple.tpl.php
 * Default template for the Views JSON style plugin using the simple format
 *
 * Variables:
 * - $view: The View object.
 * - $rows: Hierachial array of key=>value pairs to convert to JSON
 * - $options: Array of options for this style
 *
 * @ingroup views_templates
 */
$endpoint = "http://www.banrepcultural.org/coleccion-de-arte-banco-de-la-republica/sites/default/files/";

if(isset($rows['nodes'])) {
  foreach($rows['nodes'] as &$node) {
    $imagen = node_load($node['nid'])->field_imagen['und'];
    foreach($imagen as &$item) {
      $node['imagen'][] = array(
        'src' => str_replace('public://', $endpoint, $item['uri']),
        'alt' => $item['alt'],
        'title' => $item['title']
      );
    }

    if(isset($node['derechos_de_uso'])) {
      $in = $node['derechos_de_uso'];
      switch ($in) {
        case 'Dominio público':
          $out = 38451;
          break;
        case 'Propiedad Banco de la República ©':
          $out = 38480;
          break;
        case 'Todos los Derechos Reservados ©':
          $out = 38452;
          break;
        case 'Obra huérfana':
          $out = 46287;
          break;
        default:
          $out = '';
          break;
      }
      $node['derechos_de_uso'] = $out;
    }

    if(isset($node['curaduria'])) {
      $in = $node['curaduria'];
      switch ($in) {
        case 'Museo Botero':
          $out = '1192>35502>1234';
          break;
        case 'Los primeros tiempos modernos':
          $out = '1192>35502>1235>1497>1521';
          break;
        case 'La renovación vanguardista':
          $out = '1192>35502>1235>1497>1523';
          break;
        case 'Clásicos, experimentales y radicales':
          $out = '1192>35502>1235>1497>1524';
          break;
        case 'Tres décadas de arte en expansión':
          $out = '1192>35502>1235>1497>37266';
          break;
        case 'Rupturas y continuidades':
          $out = '1192>35502>1235>1497>1522';
          break;
        default:
          $out = '';
          break;
      }
      $node['curaduria'] = $out;
    }

    if(isset($node['estado'])) {
      $in = $node['estado'];
      switch ($in) {
        case 'En exposición':
          $out = 'Si';
          break;
        case 'No expuesta':
          $out = 'No';
          break;
        default:
          $out = '';
          break;
      }
      $node['estado'] = $out;
    }
    if(isset($node['lugar_muerte'])){
      $node['lugar_muerte'] = explode(",", $node['lugar_muerte'])[0];
    }

    if(isset($node['lugar_nacimiento'])){
      $node['lugar_nacimiento'] = explode(",", $node['lugar_nacimiento'])[0];
    }


  }
}

$jsonp_prefix = $options['jsonp_prefix'];

if ($view->override_path) {
  // We're inside a live preview where the JSON is pretty-printed.
  $json = _views_json_encode_formatted($rows, $options);
  if ($jsonp_prefix) $json = "$jsonp_prefix($json)";
  print "<code>$json</code>";
}
else {
  $json = _views_json_json_encode($rows, $bitmask);
  if ($options['remove_newlines']) {
     $json = preg_replace(array('/\\\\n/'), '', $json);
  }

  if (isset($_GET[$jsonp_prefix]) && $jsonp_prefix) {
    $json = check_plain($_GET[$jsonp_prefix]) . '(' . $json . ')';
  }

  if ($options['using_views_api_mode']) {
    // We're in Views API mode.
    print $json;
  }
  else {
    // We want to send the JSON as a server response so switch the content
    // type and stop further processing of the page.
    $content_type = ($options['content_type'] == 'default') ? 'application/json' : $options['content_type'];
    drupal_add_http_header("Content-Type", "$content_type; charset=utf-8");
    print $json;
    drupal_page_footer();
    exit;
  }
}
