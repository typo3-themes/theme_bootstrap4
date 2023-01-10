<?php

defined('TYPO3') or die();

call_user_func(
    function ($extKey) {

        // Add/register icons
        // Add Rootline fields for default meta-tags
        $TYPO3_CONF_VARS['FE']['addRootLineFields'] = 'layout,abstract,keywords,description,author,author_email,';
        $TYPO3_CONF_VARS['FE']['addRootLineFields'] .= $TYPO3_CONF_VARS['FE']['addRootLineFields'];
        $TYPO3_CONF_VARS['FE']['addRootLineFields'] = implode(',', array_unique(explode(',', $TYPO3_CONF_VARS['FE']['addRootLineFields'])));
        // TYPO3 skin css overrides
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][] = \KayStrobach\ThemeBootstrap4\Hooks\PageRenderer::class . '->addJSCSS';
        //
        // register svg icons: identifier and filename
        $iconsSvg = [
            'themes-backendlayout-content' => 'BackendLayouts/Content.svg',
            'themes-backendlayout-contentempty' => 'BackendLayouts/ContentEmpty.svg',
            'themes-backendlayout-contentstartsite' => 'BackendLayouts/ContentStartsite.svg',
            'themes-backendlayout-contentmenu' => 'BackendLayouts/ContentMenu.svg',
            'themes-backendlayout-contentmenusidebar' => 'BackendLayouts/ContentMenuSidebar.svg',
            'themes-backendlayout-contentsidebar' => 'BackendLayouts/ContentSidebar.svg',
            'themes-backendlayout-contentsidebarmenu' => 'BackendLayouts/ContentSidebarMenu.svg',
            'themes-backendlayout-contentspecial' => 'BackendLayouts/ContentSpecial.svg',
            'themes-backendlayout-default' => 'BackendLayouts/Default.svg',
            'themes-backendlayout-menucontent' => 'BackendLayouts/MenuContent.svg',
            'themes-backendlayout-menucontentsidebar' => 'BackendLayouts/MenuContentSidebar.svg',
            'themes-backendlayout-menusidebarcontent' => 'BackendLayouts/MenuSidebarContent.svg',
            'themes-backendlayout-sidebarcontent' => 'BackendLayouts/SidebarContent.svg',
            'themes-backendlayout-sidebarcontentmenu' => 'BackendLayouts/SidebarContentMenu.svg',
            'themes-backendlayout-sidebarmenucontent' => 'BackendLayouts/SidebarMenuContent.svg',
            'new-content-el-2-column' => 'GridElements/new_content_el_2_Column.svg',
            'new-content-el-3-column' => 'GridElements/new_content_el_3_Column.svg',
            'new-content-el-4-column' => 'GridElements/new_content_el_4_Column.svg',
            'new-content-el-accordion' => 'GridElements/new_content_el_Accordion.svg',
            'new-content-el-carousel' => 'GridElements/new_content_el_Carousel.svg',
            'new-content-el-container' => 'GridElements/new_content_el_Container.svg',
            'new-content-el-row' => 'GridElements/new_content_el_Row.svg',
            'new-content-el-singlecolumnheaderfooter' => 'GridElements/new_content_el_SingleColumnHeaderFooter.svg',
            'new-content-el-singlecolumnhorizontal' => 'GridElements/new_content_el_SingleColumnHorizontal.svg',
            'new-content-el-singlecolumnvertical' => 'GridElements/new_content_el_SingleColumnVertical.svg',
            'new-content-el-tab' => 'GridElements/new_content_el_Tab.svg',
            'new-content-el-text' => 'Content/text.svg',
            'new-content-el-text-image' => 'Content/text-image.svg',
            'new-content-el-icon' => 'Content/icon.svg',
            'new-content-el-image' => 'Content/image.svg',
        ];
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($iconsSvg as $identifier => $path) {
            $iconRegistry->registerIcon(
                $identifier,
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:' . $extKey . '/Resources/Public/Icons/' . $path]
            );
        }
    },
    $_EXTKEY
);
