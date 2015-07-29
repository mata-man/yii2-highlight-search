<?php

namespace mataman\highlightsearch;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\base\Widget as BaseWidget;
use yii\helper\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;

class Widget extends BaseWidget
{
    /**
    * Mata-man Search Widget
    *
    */
    public $name;

    public $settings = [];

    public $searchAreaClass = '.calendar-index';

    public $searchBtnId = 'highlightsearch';

    public $nextBtnId = 'highlightsearch_next';

    public $prevBtnId = 'highlightsearch_prev';

    public $textInput = 'highlightsearch_criteria';

    public $scrollClass = '.content';

    /** Name of inline JavaScript package that is registered by the widget */
    const INLINE_JS_KEY = 'mata-man/highlight-search/';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->register();
    }

    protected function register()
    {
        $field = Html::TextInput('', '', ['class' => 'form-control', 'id' => 'highlightsearch_criteria']);
        echo $this->renderTemplate($field);
        $this->registerClientScripts();
    }

    protected function registerClientScripts()
    {
        $view = $this->getView();
        $asset = Yii::$container->get(Asset::className());
        $asset = $asset::register($view);

        if (isset($this->settings['plugins'])) {
            $asset->plugins = $this->settings['plugins'];
        }

        if (!empty($this->plugins)) {
            /** @var \yii\web\AssetBundle $bundle Asset bundle */
            foreach ($this->plugins as $plugin => $bundle) {
                $this->settings['plugins'][] = $plugin;
                $bundle::register($view);
            }
        }

        $view->registerJs(
            "jQuery('#highlight_search').highlightSearch('" . $this->searchAreaClass . "', '" . $this->scrollClass . "');
            jQuery('#highlight_search_next').highlightSearchNext('" . $this->scrollClass . "');
            jQuery('#highlight_search_prev').highlightSearchPrev('" . $this->scrollClass . "');
            jQuery('#highlight_clear').highlightClear('" . $this->searchAreaClass . "')"
        );
    }

    public function renderTemplate($field)
    {
        $view = $this->getViewPath() . '/searchField.php';
        $params = ['field' => $field];

        return $this->getView()->renderFile(Yii::getAlias($view), $params);
    }

}