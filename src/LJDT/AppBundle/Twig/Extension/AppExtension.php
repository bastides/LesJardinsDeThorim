<?php

namespace LJDT\AppBundle\Twig\Extension;

class AppExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface {

    private $menuAdmin;

    public function __construct($menuAdmin) {
        $this->menuAdmin = $menuAdmin;
    }

    public function getGlobals() {
        $queries = $this->menuAdmin->menu(5);

        return array(
            'menuProducts' => $queries['menuProducts'],
            'menuProfiles' => $queries['menuProfiles'],
            'menuGalleries' => $queries['menuGalleries']
        );
    }

    public function getName() {
        return 'App_TwigExtension';
    }
}
