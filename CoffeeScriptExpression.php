<?php

Yii::import('ext.coffeescript.components.parsers.CoffeeParser');

class CoffeeScriptExpression
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
        $parser = new CoffeeParser($options);
        $this->code = $parser->compile($code);
    }

    /**
     * String magic method
     * @return string the javascript expression wrapped by this object
     */
    public function __toString()
    {
        return preg_replace('/\r?\n/', ' ', $this->code);
    }
}
