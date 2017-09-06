<?php
class FormHelper {
  protected $value = array();

  public function __construct() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->values = $_POST;
    } else {
      $this->values = $values;
    }
  }

  public function input($type, $attributes = array(), $isMultiple = false) {
    $attributes['type'] = $type;
    if (($type == 'radio') || ($type == 'checkbox')) {
      // ?? null合体演算子
      // http://capella.3rin.net/Entry/33/
      // http://e-yota.com/webservice/php7_null_coalesce_operatorr_ternaryoperator/
      // if ($this->isOptionSelected($attributes['name'] ?? null,
      //                             $attributes['value'] ?? null)) {
      //     $attributes['checked'] = true;
      // }
      // 三項演算子
      if ($this->isOptionSelected(isset($attributes['name']) ? $attributes['name'] : null,
                                  isset($attributes['value']) ? $attributes['value'] : null)) {
          $attributes['checked'] = true;
      }
    }
    return $this->tag('input', $attributes, $isMultiple);
  }

  public function select($options, $attributes = array()) {
    $multiple = isset($attributes ['multiple']) ? $attributes ['multiple'] : false;
    return
        $this->start('select', $attributes, $multiple) .
        $this->options(isset($attributes ['name'] ? $attributes ['name'] : null), $options) .
        $this->end('select');
  }

  public function textarea($attributes = array()) {
    $name = isset($attributes ['name'] ? $attributes ['name'] : null);
    $values = isset($this->values [$name] ? $attributes ['name'] : '');
    return $this->start('textarea', $attributes) . htmlentities($value) . $this->end('textarea');
  }

  public function tag($tag, $attributes = array(), $isMultiple = false) {
    // {}は変数展開。PHPに明示的に変数であることを示す
    // http://php-beginner.com/reference/variable/develop.html
    // http://php.net/manual/ja/language.variables.variable.php
    // http://php.net/manual/ja/migration70.incompatible.php#migration70.incompatible.variable-handling.indirect
    // 以下の式はPHP7で書かれているのか？5でも通用するのか？
    return "<$tag {$this->attributes($attributes, $isMultiple)}/>";
  }

  

}
