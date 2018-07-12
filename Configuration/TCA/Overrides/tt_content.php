<?php

// Show media field for special gridlayouts
$GLOBALS['TCA']['tt_content']['columns']['media']['displayCond'] = array(
    'OR' => array(
        'FIELD:CType:!=:gridelements_pi1',
        'FIELD:tx_gridelements_backend_layout:IN:container,row,singleColumn,singleColumnHorizontal,carousel',
    )
);


// Enforce equal column height
// Column settings
$tempColumn = array(
    'tx_themes_enforceequalcolumnheight' => array(
        'displayCond' => array(
            'AND' => array(
                'FIELD:CType:=:gridelements_pi1',
                'OR' => array(
                    'FIELD:tx_gridelements_backend_layout:=:row',
                    'FIELD:tx_gridelements_backend_layout:=:column',
                ),
            ),
        ),
        'exclude' => 1,
        'label' => 'LLL:EXT:themes/Resources/Private/Language/locallang.xlf:enforce_equal_column_height',
        'config' => array(
            'type' => 'user',
            'userFunc' => 'KayStrobach\\Themes\\Tca\\ContentEnforceEqualColumnHeight->renderField',
        )
    ),
    'tx_themes_columnsettings' => array(
        'displayCond' => array(
            'AND' => array(
                'FIELD:CType:=:gridelements_pi1',
                'OR' => array(
                    'FIELD:tx_gridelements_backend_layout:=:singleColumn',
                    'FIELD:tx_gridelements_backend_layout:=:singleColumnHorizontal',
                ),
            ),
        ),
        'exclude' => 1,
        'label' => 'LLL:EXT:themes/Resources/Private/Language/locallang.xlf:column_settings',
        'config' => array(
            'type' => 'user',
            'userFunc' => 'KayStrobach\\Themes\\Tca\\ContentColumnSettings->renderField',
        )
    ),
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumn);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'media', 'gridelements_pi1', 'after:section_frame');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'tx_themes_icon', '', 'after:header');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'tx_themes_variants,tx_themes_behaviour,tx_themes_responsive', '', 'after:layout');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'tx_themes_enforceequalcolumnheight,tx_themes_columnsettings', '', 'after:tx_themes_responsive');
