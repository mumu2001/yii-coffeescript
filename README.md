yii-coffeescript
================

INSTALL
----
1. clone this repository to protected/extension/coffeescript directory.
1. git submodule update --init lib/coffeescript-php
1. Your application config, set assetManager component:

    'components'=>array(
        'assetManager' => array(
            'class' => 'ext.coffeescript.PBMAssetManager',
            'parsers' => array(
                'coffee' => array(
                    'class' => 'ext.coffeescript.CoffeeParser',
                    'output' => 'js',
                    'options' => array(
                    ),
                ),
            ),
        ),
    ),

USAGE
----

Using our assetManager::publish to get compiled js.

    $jsfile = Yii::app()->geAssetManager()->publish(
         YiiBase::getPathOfAlias('application.assets.js').'/yourscript.coffee');

And to get js expression, using our CoffeeScriptExpression.

    $this->beginWidget('bootstrap.widgets.TbModal', array(
            'events' => array(
                'show' => new CoffeeScriptExpression(<<<__SCRIPT__
                    ->
                        # ... any code ...
    __SCRIPT__
                ),
            ),
      ));
