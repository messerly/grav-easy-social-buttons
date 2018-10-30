<?php

namespace Grav\Plugin;

use Grav\Common\Plugin;

class EasySocialButtonsPlugin extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
        ];
    }

    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $this->enable([
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
        ]);
    }

    /**
     * Add current directory to twig lookup paths.
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * if enabled on this page, load the JS + CSS theme.
     */
    public function onTwigSiteVariables()
    {
        $networks = [];

        $this->grav['assets']->addCss('plugin://easy-social-buttons/assets/css/icons.min.css', -999);

        // You have to load fontawesome version 5.4 yourself
        if ($this->config->get('plugins.easy-social-buttons.fontawesome', false)) {
            $this->grav['assets']->addCss('//use.fontawesome.com/releases/v5.4.2/css/regular.css', -999);
            $this->grav['assets']->addCss('//use.fontawesome.com/releases/v5.4.2/css/brands.css', -999);
            $this->grav['assets']->addCss('//use.fontawesome.com/releases/v5.4.2/css/fontawesome.css', -999);
        }

        $twig = $this->grav['twig'];

        $twig->twig_vars['icon_size'] = $this->config->get('plugins.easy-social-buttons.button_size');
        $twig->twig_vars['icon_shape'] = $this->config->get('plugins.easy-social-buttons.button_shape');
        $twig->twig_vars['config'] = $this->config->get('plugins.easy-social-buttons');

    }
}