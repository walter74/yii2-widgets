Back to top button
==================
A simple widget button to use to go back to the top of the page

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist walter74/yii2-back2top "*"
```

or add

```
"walter74/yii2-back2top": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \walter74\back2top\Back2Top::widget(); ?>
```

You can configure several custom attributes which are set by default as follow :
```
 'id' =>"toTop"
 'class_tag' => "btn btn-info"
 'style_tag'=>'display: block;'
 'position_bottom'=>'100px;'
 'position_right'=>'10px;'
 'title=>'Back To Top'
 'class_icon'=>'glyphicon glyphicon-chevron-up'
 'template'=>'<div id="{{id_widget}}" class="{{class_tag}}" style="{{style_tag}}"><span class="{{class_icon}}"></span>{{title}}</div>'
```
if you want to change this settings, you've to pass new value by widget config as the example showed below:
```php
<?= \walter74\back2top\Back2Top::widget(['title'=>'go up','class_icon'=>'glyphicon glyphicon-arrow-up']); ?>
```
 
 it's possible even to inject your custom code or style rather than the default assets, by passing through js and css respectevely since both two are set as null by default:
 js=>null
 css=>null
Once you've modified the code, new code will be registered as init() function will be called.
