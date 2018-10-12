<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Acesso',

    'title_prefix' => '',

    'title_postfix' => ' - SicBRAS',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<img src="img/sicbrasPB.png" style="width:150px;">',

    'logo_mini' => '<img src="img/sicbrasPBSimbolo.png" style="width:30px;">',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'green-light',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => 'fixed',

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
      [
          'text'        => 'Início',
          'url'         => 'home',
          'icon'        => 'home',
      ],
      [
          'text'        => 'Controle de Estoque',
          'url'         => 'estoque',
          'icon'        => 'archive',
      ],
      [
          'text'        => 'Controle de Treinamento',
          'icon'        => 'book',
          /*'url'         => 'treinamento',*/
          'submenu'     => [
            [
                'text'  => 'Matriz de Treinamento',
                'icon'  => 'bank',
                'url'   => 'treinamento', 
            ],
            [
                'text'  => 'Treinamento ',
                'icon'  => 'calendar-plus-o',
                'url'   => '#',
                'submenu'   => [
                    [
                    'text'  => 'Incluir Turma',
                    'url'   => '#',
                    ],

                ],
            ],
            [
                'text'  => 'Consultar',
                'icon'  => 'calendar',
                'url'   => '#',
                'submenu'   => [
                    [
                    'text'  => 'Turmas',
                    'url'   => '#',
                    ],
                ],
            ],
            [
                'text'  => 'Relatórios',
                'icon'  => 'calendar-check-o',
                'url'   => '#',
                'submenu'   => [
                    [
                    'text'  => 'Turmas por Data',
                    'url'   => '#',
                    ],
                    [
                    'text'  => 'Turmas por Cargo',
                    'url'   => '#',
                    ],
                                        [
                    'text'  => 'Turmas por Setor',
                    'url'   => '#',
                    ],
                                        [
                    'text'  => 'Turmas por Treinamento',
                    'url'   => '#',
                    ],
                    [
                    'text'  => 'Turmas por Departamento',
                    'url'   => '#',
                    ],
                ],
            ],
            [
                'text'  => 'Gerenciar Itens',
                'icon'  => 'edit',
                'url'   => '#',
                'submenu'   => [
                    [
                    'text'  => 'Cargo',
                    'url'   => 'cargos',
                    ],
                    [
                    'text'  => 'Departamento',
                    'url'   => 'departamentos',
                    ],
                    [
                    'text'  => 'Setor',
                    'url'   => 'cetors',
                    ],
                    [
                    'text'  => 'Funcionário',
                    'url'   => 'funcionarios',
                    ],
                    [
                    'text'  => 'Treinamento',
                    'url'   => 'cursos',
                    ],
                    /*[
                    'text'  => 'Departamento',
                    'url'   => 'departamentos',
                    ], */
                    [
                    'text'  => 'Tipo do Treinamento',
                    'url'   => 'tptreinamentos',
                    ],
                    [
                    'text'  => 'Espec. do Treinamento',
                    'url'   => 'espectreinamentos',
                    ],

                ],
            ],
            [
                'text'  => 'Gerenciador de Arquivos',
                'icon'  => 'edit',
                'url'   => '#',
                'submenu' =>[
                [
                    'text' =>'Download de Arquivos',
                    'url'  =>'#',
                    ],
                [
                    'text' =>'Upload de Arquivos',
                    'url'  =>'gerenciador',
                ],
               ],
              ],
            [
                'text'  => 'Ajuda',
                'icon'  => 'exclamation-circle',
                'url'   => '#',

            ],
          ],
      ],
      [
          'text'        => 'Controle de Qualidade',
          'url'         => 'qualidade',
          'icon'        => 'check-circle',
      ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
