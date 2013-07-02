<?php
/* SVN FILE: $Id: Sass.php 64 2010-04-16 13:23:14Z chris.l.yates $ */
/**
 * Coffee class file.
 *
 * @author      stan <tanaka@signaltalk.com>
 * @package     PHamlP
 * @subpackage  Yii
 */

Yii::setPathOfAlias('CoffeeScript', Yii::getPathOfAlias('ext.coffeescript.lib.coffeescript-php.src.CoffeeScript'));
CoffeeScript\Init::load();

class CoffeeParser {

    private $options;

    /**
     * Constructor
     * @param array compile options
     */
    public function __construct($options) {
        $this->options = $options;
    }

    /**
     * Parse a Coffee script file to JS
     * @param string path to file
     * @return string JS
     */
    public function parse($file)
    {
        $coffee = file_get_contents($file);
        return $this->compile($coffee);
    }

    public function compile($coffee)
    {
        return CoffeeScript\Compiler::compile($coffee, $this->options);
    }
}
