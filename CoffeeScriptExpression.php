<?php

Yii::import('ext.coffeescript.CoffeeParser');

class CoffeeScriptExpression extends CJavaScriptExpression
{
    /**
     * @var string the javascript expression wrapped by this object
     */
    public $code;

    /**
     * @param string $code a coffee script expression that is to be wrapped by this object
     * @throws CException if argument is not a string
     */
    public function __construct($code, $options=array())
    {
        if(!is_string($code))
            throw new CException('Value passed to CoffeeScriptExpression should be a string.');
        if(strpos($code, 'coffee:')===0)
            $code=substr($code,7);
        $options['header'] = false;
        $options['bare'] = true;
        $options['filename'] = 'CoffeeScriptExpression';
        $parser = new CoffeeParser($options);
        $js = $parser->compile($code);
        // remove tail ';'
        $js = preg_replace('/;\s*$/s', '', $js);
        // remove lf
        // $js = preg_replace('/\r?\n\s*/s', ' ', $js);
        $this->code = $js;
    }
}
