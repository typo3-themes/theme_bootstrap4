<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TCA']['pages'] = array_merge_recursive(
    $GLOBALS['TCA']['pages'],
    [
        'columns' => [
            'sitemap_xml_exclude' => [
                'exclude' => 0,
                'label' => 'sitemap.xml exclude',
                'config' => [
                    'type' => 'check',
                    'items' => [
                        ['Exclude this page from sitemap.xml', 1],
                    ],
                ],
            ],
            'sitemap_xml_priority' => [
                'exclude' => 0,
                'label' => 'sitemap.xml priority',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['0.0', 0],
                        ['0.1', 1],
                        ['0.2', 2],
                        ['0.3', 3],
                        ['0.4', 4],
                        ['0.5', 5],
                        ['0.6', 6],
                        ['0.7', 7],
                        ['0.8', 8],
                        ['0.9', 9],
                        ['1.0', 10],
                    ]
                ],
            ],
            'sitemap_xml_change_frequency' => [
                'exclude' => 0,
                'label' => 'sitemap.xml change frequency',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['Always', 'always'],
                        ['Hourly', 'hourly'],
                        ['Daily', 'daily'],
                        ['Weekly', 'weekly'],
                        ['Monthly', 'monthly'],
                        ['Yearly', 'yearly'],
                        ['Never', 'never'],
                    ],
                ],
            ],
        ],
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'pages',
    'miscellaneous',
    'sitemap_xml_exclude, sitemap_xml_priority, sitemap_xml_change_frequency'
);
