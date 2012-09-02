<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'TinyErp - AWS Group',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'bismillah',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=tiny_db',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'rahasia',
            'charset' => 'utf8',
        ),
//        'db' => array(
//            'connectionString' => 'pgsql:host=localhost;port=5432;dbname=TinyDB',
//            'username' => 'sangkilsoft',
//            'password' => 'rahasia',
//        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'widgetFactory' => array(
            'widgets' => array(
                'CGridView' => array(
                    'htmlOptions' => array('cellspacing' => '0', 'cellpadding' => '0'),
                    'itemsCssClass' => 'item-class',
                    'pagerCssClass' => 'pager-class'
                ),
                'CListView' => array(
                    'htmlOptions' => array('cellspacing' => '0', 'cellpadding' => '0'),
                    'itemsCssClass' => 'item-class',
                    'pagerCssClass' => 'pager-class'
                ),
                'CJuiTabs' => array(
                    'htmlOptions' => array('class' => 'shadowtabs'),
                ),
                'CJuiAccordion' => array(
                    'htmlOptions' => array('class' => 'shadowaccordion'),
                ),
                'CJuiProgressBar' => array(
                    'htmlOptions' => array('class' => 'shadowprogressbar'),
                ),
                'CJuiSlider' => array(
                    'htmlOptions' => array('class' => 'shadowslider'),
                ),
                'CJuiSliderInput' => array(
                    'htmlOptions' => array('class' => 'shadowslider'),
                ),
                'CJuiButton' => array(
                    'htmlOptions' => array('class' => 'shadowbutton'),
                ),
                'CJuiButton' => array(
                    'htmlOptions' => array('class' => 'button green'),
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'company' => 'SangkilSoft.com',
        'adminEmail' => 'mujib.masyhudi@gmail.com',
    ),
    //'theme' => 'classic',    
    'theme' => 'shadow_dancer',
);