<?php
namespace walter74\back2top;

use yii\helpers\Html;
use yii\helpers\Url;
use Yii;
/**
 * Back2Top button.
 */

class Back2Top extends \yii\base\Widget
{
 public $id="toTop";
 public $class_tag="btn btn-info";
 public $style_tag="display: block;";
 public $position_bottom="100px;";
 public $position_right="10px;";
 public $title="Back To Top";
 public $class_icon="glyphicon glyphicon-chevron-up";
 public $template='<div id="{{id_widget}}" class="{{class_tag}}" style="{{style_tag}}"><span class="{{class_icon}}"></span>{{title}}</div>'; 
 public $js=null;//if $js !==null it's possible to inject this code rather than the default assets
 public $css=null;//if $css !==null it's possible to inject this style rather than the default assets
 
 public function init(){
     
     parent::init();
     $view = $this->getView();
	 //initialize the assets
	 $js=<<<sss
        $('body').append('<div id="{{id_widget}}" class="{{class_tag}}" style="{{style_tag}}"><span class="{{class_icon}}"></span>{{title}}</div>');
    	$(window).scroll(function () {
			    if ($(this).scrollTop() != 0) {
				    $('#{{id_widget}}').fadeIn();
			    } else 
                {
				    $('#{{id_widget}}').fadeOut();
			    }
		    }); 
        $('#{{id_widget}}').click(function(){
                $("html, body").animate({ scrollTop: 0 }, 600);
                 return false;
                });
sss;
    $css=<<<ccc
    #{{id_widget}}{
	position: fixed;
	bottom: {{position_bottom}}
	right: {{position_right}}
	cursor: pointer;
	display: none;
}
    
ccc;
//replacement placeholder
    $css = str_replace('{{id_widget}}',$this->id,$css);
    $css = str_replace('{{position_bottom}}',$this->position_bottom,$css);
    $css = str_replace('{{position_right}}',$this->position_right,$css);
    $js = str_replace('{{id_widget}}',$this->id,$js);
    $js = str_replace('{{class_icon}}',$this->class_icon,$js);
    $js = str_replace('{{class_tag}}',$this->class_tag,$js);
    $js = str_replace('{{style_tag}}',$this->style_tag,$js);
    $js = str_replace('{{title}}',$this->title,$js);
//register assets  
	$view->registerJs(($this->js!==null)?$js:$this->js,\yii\web\View::POS_READY);
	$view->registerCss(($this->css!==null)?$css:$this->css);
 
 
 }   
    
  public function run(){
	//replacement placeholder template
	$this->template = str_replace('{{id_widget}}',$this->id,$this->template);
    $this->template = str_replace('{{class_icon}}',$this->class_icon,$this->template);
    $this->template = str_replace('{{class_tag}}',$this->class_tag,$this->template);
    $this->template = str_replace('{{style_tag}}',$this->style_tag,$this->template);
    $this->template = str_replace('{{title}}',$this->title,$this->template);
	//display template
	echo $this->template;
  }
}
