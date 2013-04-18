yii-coffeescript
================

INSTALL
----
clone this repository to your protected/extension directory.

USAGE
----

Your application config, set assetManager component:

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
