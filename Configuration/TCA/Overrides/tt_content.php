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
//
// Simple text content element
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'Text',
    'themebootstrap4_text',
    'mimetypes-x-content-themebootstrap4-text',
];
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['themebootstrap4_text'] = 'mimetypes-x-content-themebootstrap4-text';
$GLOBALS['TCA']['tt_content']['types']['themebootstrap4_text'] = [
    'showitem' => '
            CType,
            header,
            bodytext,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements,
            tx_gridelements_container,
            tx_gridelements_columns,
            colPos',
    'columnsOverrides' => [
        'layout' => [
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'minitems' => 1,
                'maxitems' => 1,
                'size' => 1,
                'items' => [
                    ['Default', 'Default'],
                    ['Centered text', 'Center'],
                ],
                'eval' => 'trim',
            ],
        ],
        'bodytext' => [
            'config' => [
                'enableRichtext' => 1,
            ],
        ],
    ],
];
//
// Simple media content element
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'Text Image',
    'themebootstrap4_text_image',
    'new-content-el-text_image',
];
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['themebootstrap4_text_image'] = 'new-content-el-text-image';
$GLOBALS['TCA']['tt_content']['types']['themebootstrap4_text_image'] = [
    'showitem' => '
            CType,
            header,
            bodytext,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
            assets,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements,
            tx_gridelements_container,
            tx_gridelements_columns,
            colPos',
    'columnsOverrides' => [
        'layout' => [
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'minitems' => 1,
                'maxitems' => 1,
                'size' => 1,
                'items' => [
                    ['Default', '0'],
                    ['Media-Element links', 'MediaLeft'],
                    ['Media-Element rechts', 'MediaRight'],
                    ['Media-Element unten', 'MediaBottom'],
                ],
                'eval' => 'trim',
            ],
        ],
        'bodytext' => [
            'config' => [
                'enableRichtext' => 1,
            ],
        ],
    ],
];
