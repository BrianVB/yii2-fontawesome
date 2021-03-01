<?php

namespace bvb\fontawesome;

/**
 * Font-Awesome Dependent Source Asset
 * https://github.com/yidas/yii2-fontawesome/blob/master/src/FontawesomeAsset.php
 */
class FontawesomeAsset extends \yii\web\AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public $sourcePath = '@vendor/fortawesome/font-awesome';

    /**
     * {@inheritdoc}
     */
    public $css = [
        'css/all.min.css',
    ];

    /**
     * {@inheritdoc}
     */
    public $js = [
        'js/all.min.js'
    ];

    /**
     * @var string CDN version for CDN mode, eg. `'5.15.2'`
     */
    public $cdnVersion = '5.15.2';

    /**
     * @var bool Enable or disable CDN mode
     */
    public $cdn = false;

    /**
     * @var array Sprintf format or fixed URL of Font-Awesome CDN URL
     */
    public $cdnCSS = ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/%s/css/font-awesome.min.css'];

    /**
     * @var array Sprintf format or fixed URL of Font-Awesome CDN URL
     */
    public $cdnJS = ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/%s/js/all.min.js'];
    
    /**
     * Source handler
     */
    public function init()
    {
        // CDN mode
        if ($this->cdn) {
            // Unset sourcePath
            $this->sourcePath = NULL;
            // Rewrite CSS
            $this->css = [];
            foreach ($this->cdnCSS as $key => $url) {
                $this->css[] = sprintf($url, $this->cdnVersion);
            }
            // Rewrite JS
            $this->js = [];
            foreach ($this->cdnJS as $key => $url) {
                $this->js[] = sprintf($url, $this->cdnVersion);
            }
        }

        parent::init();
    }
}