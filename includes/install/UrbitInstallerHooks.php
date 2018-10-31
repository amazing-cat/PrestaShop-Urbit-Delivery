<?php
/**
 * Urbit for Pretashop
 *
 * @author    Urb-it
 * @copyright Urb-it
 * @license   Urb-it
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Class UrbitInstallerHooks
 */
class UrbitInstallerHooks extends UrbitInstallerEntity
{
    /**
     * @return bool
     */
    public function install()
    {
        $module = $this->module;

        return $module->registerHook('displayRightColumnProduct')
            && $module->registerHook('displayBackOfficeHeader')
            && $module->registerHook('actionCarrierUpdate')
            && $module->registerHook('actionObjectCarrierUpdateAfter')
            && $module->registerHook('displayCarrierList')
            && $module->registerHook('displayOrderConfirmation')
            && $module->registerHook('displayBeforeCarrier')
            && $module->registerHook('actionCartSummary')
            && $module->registerHook('actionOrderStatusPostUpdate')
<<<<<<< HEAD
            && $module->registerHook('extraCarrier')
            && $module->registerHook('displayAdminOrder');

=======
            && $module->registerHook('displayProductButtons')
            && $module->registerHook('extraCarrier')
            && $module->registerHook('displayAdminOrder');
>>>>>>> master
    }

    /**
     * @return bool
     */
    public function uninstall()
    {
        return true;
    }
}
