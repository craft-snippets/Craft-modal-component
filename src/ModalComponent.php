<?php
/**
 * Modal component plugin for Craft CMS 4.x
 *
 * Modal component
 *
 * @link      https://craftsnippets.com/
 * @copyright Copyright (c) 2022 Piotr Pogorzelski
 */

namespace craftsnippets\modalcomponent;


use Craft;
use craft\base\Plugin;
use yii\base\Event;

use craft\events\RegisterTemplateRootsEvent;
use craft\web\View;
use craftsnippets\modalcomponent\models\Settings;

/**
 * Class ModalComponent
 *
 * @author    Piotr Pogorzelski
 * @package   ModalComponent
 * @since     1.0.0
 *
 */
class ModalComponent extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var ModalComponent
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public bool $hasCpSettings = false;

    /**
     * @var bool
     */
    public bool $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        $this->registerTemplateRoot();
        $this->registerAssets();
    }

    private function registerTemplateRoot()
    {
        Event::on(
            View::class,
            View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
            function(RegisterTemplateRootsEvent $event) {
                $keyword = 'snippets-modal';
                $event->roots[$keyword] = __DIR__ . '/templates';
            }
        );         
    }

    private function registerAssets()
    {   
        if(Craft::$app->getRequest()->getIsSiteRequest() == false){
            return;
        }

        Craft::$app->view->registerAssetBundle(\craftsnippets\modalcomponent\assetbundles\ModalAssetJs::class);
        if(ModalComponent::$plugin->getSettings()->useBaseCss == true){
            Craft::$app->view->registerAssetBundle(\craftsnippets\modalcomponent\assetbundles\ModalAssetCssBase::class);
        }
        
        if(ModalComponent::$plugin->getSettings()->useDefaultTheme == true){
            Craft::$app->view->registerAssetBundle(\craftsnippets\modalcomponent\assetbundles\ModalAssetCssDefaultTheme::class);
        }                    
    }

    protected function createSettingsModel(): ?craft\base\Model
    {
        return new Settings();
    }

}
