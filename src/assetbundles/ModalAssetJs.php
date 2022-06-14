<?php

namespace craftsnippets\modalcomponent\assetbundles;

use Craft;
use craft\web\AssetBundle;

class ModalAssetJs extends AssetBundle
{

    public function init()
    {
        $this->sourcePath = "@craftsnippets/modalcomponent/assetbundles";

        $this->js = [
            'js/a11y-dialog.min.js',
        ];

        parent::init();
    }
}
