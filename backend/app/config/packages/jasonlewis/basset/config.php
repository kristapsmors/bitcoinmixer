<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Collections
    |--------------------------------------------------------------------------
    |
    | Basset is built around collections. A collection contains assets for
    | your application. Collections can contain both stylesheets and
    | javascripts.
    |
    | A default "application" collection is ready for immediate use. It makes
    | a couple of assumptions about your directory structure.
    |
    | /public
    |    /assets
    |        /stylesheets
    |            /less
    |            /sass
    |        /javascripts
    |            /coffeescripts
    |
    | You can overwrite this collection or remove it by publishing the config.
    |
    */
    
    'collections' => array(

        'application' => function($collection)
        {
            $collection->directory('assets/css', function($collection)
            {
                $collection->add('less/master.less')->apply('Less');
                $collection->stylesheet('bootstrap-overrides.css');
                $collection->stylesheet('lib/jquery-ui-1.10.2.custom.css');
                $collection->stylesheet('lib/font-awesome.css');
                $collection->stylesheet('compiled/layout.css');
                $collection->stylesheet('compiled/elements.css');
                $collection->stylesheet('compiled/icons.css');
                $collection->stylesheet('compiled/index.css');
                $collection->stylesheet('//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
                $collection->stylesheet('//fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic');              

            })->apply('UriRewriteFilter')->apply('CssMin');

            $collection->directory('assets/js', function($collection)
            {
                $collection->javascript('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
                $collection->javascript('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
                //$collection->requireDirectory('../../../vendor/twbs/bootstrap/js');

                $collection->add('../../../vendor/twbs/bootstrap/js/affix.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/alert.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/button.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/carousel.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/collapse.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/dropdown.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/modal.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/tooltip.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/popover.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/scrollspy.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/tab.js');
                $collection->add('../../../vendor/twbs/bootstrap/js/transition.js');

                $collection->javascript('jquery.knob.js');
                $collection->javascript('jquery.flot.js');
                // $collection->javascript('jquery.flot.stack.js');
                $collection->javascript('jquery.flot.resize.js');
                $collection->javascript('theme.js');

            })->apply('JsMin');
        },

        'auth' => function($collection)
        {
            $collection->directory('assets/css', function($collection)
            {
                $collection->add('less/master.less')->apply('Less');
                $collection->stylesheet('bootstrap-overrides.css');
                $collection->stylesheet('compiled/layout.css');
                $collection->stylesheet('compiled/elements.css');
                $collection->stylesheet('compiled/icons.css');
                $collection->stylesheet('lib/font-awesome.css');
                $collection->stylesheet('compiled/signin.css');
                $collection->stylesheet('//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800');
            })->apply('UriRewriteFilter')->apply('CssMin');

            $collection->directory('assets/js', function($collection)
            {
                $collection->javascript('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
                $collection->requireDirectory('../../../vendor/twbs/bootstrap/js');
                $collection->javascript('theme.js');
            })->apply('JsMin');
        }

    ),

    /*
    |--------------------------------------------------------------------------
    | Production Environment
    |--------------------------------------------------------------------------
    |
    | Basset needs to know what your production environment is so that it can
    | respond with the correct assets. When in production Basset will attempt
    | to return any built collections. If a collection has not been built
    | Basset will dynamically route to each asset in the collection and apply
    | the filters.
    |
    | The last method can be very taxing so it's highly recommended that
    | collections are built when deploying to a production environment.
    |
    | You can supply an array of production environment names if you need to.
    |
    */

    //'production' => array('production', 'prod'),
    'production' => array('p'),


    /*
    |--------------------------------------------------------------------------
    | Build Path
    |--------------------------------------------------------------------------
    |
    | When assets are built with Artisan they will be stored within a directory
    | relative to the public directory.
    |
    | If the directory does not exist Basset will attempt to create it.
    |
    */

    'build_path' => 'assets/compiled',

    /*
    |--------------------------------------------------------------------------
    | Debug
    |--------------------------------------------------------------------------
    |
    | Enable debugging to have potential errors or problems encountered
    | during operation logged to a rotating file setup.
    |
    */

    'debug' => false,

    /*
    |--------------------------------------------------------------------------
    | Node Paths
    |--------------------------------------------------------------------------
    |
    | Many filters use Node to build assets. We recommend you install your
    | Node modules locally at the root of your application, however you can
    | specify additional paths to your modules.
    |
    */

    'node_paths' => array(

        base_path().'/node_modules'

    ),

    /*
    |--------------------------------------------------------------------------
    | Gzip Built Collections
    |--------------------------------------------------------------------------
    |
    | To get the most speed and compression out of Basset you can enable Gzip
    | for every collection that is built via the command line. This is applied
    | to both collection builds and development builds.
    |
    | You can use the --gzip switch for on-the-fly Gzipping of collections.
    |
    */

    'gzip' => false,

    /*
    |--------------------------------------------------------------------------
    | Asset and Filter Aliases
    |--------------------------------------------------------------------------
    |
    | You can define aliases for commonly used assets or filters.
    | An example of an asset alias:
    |
    |   'layout' => 'stylesheets/layout/master.css'
    |
    | Filter aliases are slightly different. You can define a simple alias
    | similar to an asset alias.
    |
    |   'YuiCss' => 'Yui\CssCompressorFilter'
    |
    | However if you want to pass in options to an aliased filter then define
    | the alias as a nested array. The key should be the filter and the value
    | should be a callback closure where you can set parameters for a filters
    | constructor, etc.
    |
    |   'YuiCss' => array('Yui\CssCompressorFilter', function($filter)
    |   {
    |       $filter->setArguments('path/to/jar');
    |   })
    |
    |
    */

    'aliases' => array(

        'assets' => array(),

        'filters' => array(

            /*
            |--------------------------------------------------------------------------
            | Less Filter Alias
            |--------------------------------------------------------------------------
            |
            | Filter is applied only when asset has a ".less" extension and it will
            | attempt to find missing constructor arguments.
            |
            */

            'Less' => array('LessphpFilter', function($filter)
            {
                $filter->whenAssetIs('.*\.less')->findMissingConstructorArgs();
            }),

            /*
            |--------------------------------------------------------------------------
            | Sass Filter Alias
            |--------------------------------------------------------------------------
            |
            | Filter is applied only when asset has a ".sass" or ".scss" extension and
            | it will attempt to find missing constructor arguments.
            |
            */

            'Sass' => array('Sass\ScssFilter', function($filter)
            {
                $filter->whenAssetIs('.*\.(sass|scss)')->findMissingConstructorArgs();
            }),

            /*
            |--------------------------------------------------------------------------
            | CoffeeScript Filter Alias
            |--------------------------------------------------------------------------
            |
            | Filter is applied only when asset has a ".coffee" extension and it will
            | attempt to find missing constructor arguments.
            |
            */

            'CoffeeScript' => array('CoffeeScriptFilter', function($filter)
            {
                $filter->whenAssetIs('.*\.coffee')->findMissingConstructorArgs();
            }),

            /*
            |--------------------------------------------------------------------------
            | CssMin Filter Alias
            |--------------------------------------------------------------------------
            |
            | Filter is applied only when within the production environment and when
            | the "CssMin" class exists.
            |
            */

            'CssMin' => array('CssMinFilter', function($filter)
            {
                $filter->whenAssetIsStylesheet()->whenProductionBuild()->whenClassExists('CssMin');
            }),

            /*
            |--------------------------------------------------------------------------
            | JsMin Filter Alias
            |--------------------------------------------------------------------------
            |
            | Filter is applied only when within the production environment and when
            | the "JsMin" class exists.
            |
            */

            'JsMin' => array('JSMinFilter', function($filter)
            {
                $filter->whenAssetIsJavascript()->whenProductionBuild()->whenClassExists('JSMin');
            }),

            /*
            |--------------------------------------------------------------------------
            | UriRewrite Filter Alias
            |--------------------------------------------------------------------------
            |
            | Filter gets a default argument of the path to the public directory.
            |
            */

            'UriRewriteFilter' => array('UriRewriteFilter', function($filter)
            {
                //$filter->setArguments('../')->whenAssetIsStylesheet();
                $filter->setArguments(public_path())->whenAssetIsStylesheet();
            })

        )

    )

);