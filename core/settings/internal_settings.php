<?php
defined('VG_ACCESS') or die('Access denied');

const TEMPLATE = 'web/';
const ADMIN_TEMPLATE = 'web/admin/';

const COOKIE_VERSION = '1.0.0';
const CRYPT_KEY = '';
/*** время бездействия для администратора***/
const COOKIE_TIME = 60;
const BLOCK_TIME = 3;
/***постраничная навигация ***/
/***количество позиций***/
const QTY = 8;
/***количество ссылок на страницы ***/
const QTY_LINKS  = 3;

const ADMIN_CSS_JS = [
    'styles' => [
        'css/site.css',
        'css/main.sea.css',
        'css/style.css',
        'css/grasp_mobile_progress_circle-1.0.0.min.css',
        'css/fontastic.css',
        'css/custom.css'


        ],
    'scripts' => [
        'js/front.js',
        'js/grasp_mobile_progress_circle-1.0.0.min.js',
        'js/charts-home.js',
        'js/charts-custom.js',
        ]
];

const USER_CSS_JS = [
    'styles' => ['css/style.css'],
    'scripts' => ['js/style.js']
];