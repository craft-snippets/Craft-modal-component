<?php

namespace craftsnippets\modalcomponent\assetbundles;

use Craft;
use craft\web\AssetBundle;

class ModalAssetCssBase extends AssetBundle
{

    public function init()
    {
        $this->sourcePath = "@craftsnippets/modalcomponent/assetbundles";

        $this->css = [
            'css/a11y-dialog-base.css',
        ];

        parent::init();
    }
}
