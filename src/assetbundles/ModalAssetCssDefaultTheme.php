<?php

namespace craftsnippets\modalcomponent\assetbundles;

use Craft;
use craft\web\AssetBundle;

class ModalAssetCssDefaultTheme extends AssetBundle
{

    public function init()
    {
        $this->sourcePath = "@craftsnippets/modalcomponent/assetbundles";

        $this->css = [
            'css/modal-default-theme.css',
        ];

        parent::init();
    }
}
