<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
            $theme->setTitle('Copyright ©  2013 - Laravel.in.th');

            // Breadcrumb template.
            // $theme->breadcrumb()->setTemplate('
            //     <ul class="breadcrumb">
            //     @foreach ($crumbs as $i => $crumb)
            //         @if ($i != (count($crumbs) - 1))
            //         <li><a href="{{ $crumb["url"] }}">{!! $crumb["label"] !!}</a><span class="divider">/</span></li>
            //         @else
            //         <li class="active">{!! $crumb["label"] !!}</li>
            //         @endif
            //     @endforeach
            //     </ul>
            // ');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function($theme)
        {
            // You may use this event to set up your assets.
            // $theme->asset()->usePath()->add('core', 'core.js');
            // $theme->asset()->add('jquery', 'vendor/jquery/jquery.min.js');
            // $theme->asset()->add('jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', array('jquery'));

            // Partial composer.
            // $theme->partialComposer('header', function($view)
            // {
            //     $view->with('auth', Auth::user());
            // });
            $theme->asset()->add('jquery', 'assets/js/jquery.js');
            $theme->asset()->add('bootstrap.min.js', 'assets/js/bootstrap.min.js');
            $theme->asset()->add('bootstrap.min.css', 'assets/css/bootstrap.min.css');

            //datatables
            //css
            $theme->asset()->add('dataTables.bootstrap.min.css', 'assets/css/plugins/datatables/dataTables.bootstrap.min.css');
            $theme->asset()->add('responsive.bootstrap.min.css', 'assets/css/plugins/datatables/responsive.bootstrap.min.css');

            //js
            $theme->asset()->add('jquery.dataTables.min.js', 'assets/js/plugins/datatables/jquery.dataTables.min.js');
            $theme->asset()->add('dataTables.bootstrap.min.js', 'assets/js/plugins/datatables/dataTables.bootstrap.min.js');
            $theme->asset()->add('dataTables.responsive.min.js', 'assets/js/plugins/datatables/dataTables.responsive.min.js');
            $theme->asset()->add('responsive.bootstrap.min.js', 'assets/js/plugins/datatables/responsive.bootstrap.min.js');


        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => array(

            'default' => function($theme)
            {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }

        )

    )

);