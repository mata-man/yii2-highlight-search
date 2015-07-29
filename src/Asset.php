<?php

namespace mataman\highlightsearch;

use yii\web\AssetBundle;
/**
 * Widget asset bundle
 *
 * @author David Mata <tripskeet@hotmail.com>
 *
 * @link https://github.com/mata-man
 */
class Asset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/mata-man/yii2-highlight-search/src/assets';

    /**
     * @var array Redactor plugins array
     */
    public $plugins = [];
    /**
     * @inheritdoc
     */
    public $css = [
        'css/highlight-search.css'
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'js/jquery.highlight-5.js',
        'js/highlight-search.js'
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset'
    ];
    /**
     * Register asset bundle plugins.
     */
    public function registerAssetFiles($view)
    {
        if (!empty($this->plugins)) {
            foreach ($this->plugins as $plugin) {
                if ($plugin === 'clips') {
                    $this->css[] = 'plugins/' . $plugin . '/' . $plugin . '.css';
                }
                $this->js[] = 'plugins/' . $plugin . '/' . $plugin .'.js';
            }
        }
        parent::registerAssetFiles($view);
    }
}