<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Auth route
    |--------------------------------------------------------------------------
    |
    | This option controls the route under which the novu authentication
    | can be started.
    |
    */

    'route' => 'sso',

    /*
    |--------------------------------------------------------------------------
    | Redirect Route after successful local login
    |--------------------------------------------------------------------------
    |
    | This option controls the route, where the user will be redirected if
    | Authentication was successful.
    |
    */

    'redirect' => 'cp',

    /*
    |--------------------------------------------------------------------------
    | Redirect Route after successful external login
    |--------------------------------------------------------------------------
    |
    | This option controls the route, where the user will be redirected
    | after authentication on the Auth-server.
    |
    */

    'callback' => 'novu-auth/callback',

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the secret token to sign requests to the auth server.
    |
    */

    'token' => 'TRDnQUiBW8ghAg3gsHsKqPbr2qFj_',

    /*
    |--------------------------------------------------------------------------
    | Auth server
    |--------------------------------------------------------------------------
    |
    | This option controls the server should be used for authentication.
    |
    */

    'auth-server' => 'https://auth.novu.ch',

    /*
    |--------------------------------------------------------------------------
    | User model
    |--------------------------------------------------------------------------
    |
    | This option controls the model should be used as Authenticable.
    */

    'model' => Statamic\Auth\User::class,

    /*
    |--------------------------------------------------------------------------
    | Auth guard for routes
    |--------------------------------------------------------------------------
    |
    | This option controls the auth guard should be used for the registered routes.
    |
    */

    'guard' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Static user attributes for new users.
    |--------------------------------------------------------------------------
    |
    | This option controls the attributes that should be assigned to a newly
    | created user after a successful authentication on the auth server.
    | This option is only respected if no custom user attributes
    | Factory is used.
    |
    | Example:
    | ```
    | ['active' => true]
    | ```
    |
    */

    'user-attributes' => [
        'super' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Factory user to setup users attributes for creation
    |--------------------------------------------------------------------------
    |
    | This option controls the factory that should be used to extract the
    | needed data from the auth response needed to create a new local
    | User with the given attributes.
    |
    */

    'user-factory' => \Novu\Auth\UserAttributesFactory::class,

    /*
    |--------------------------------------------------------------------------
    | Manager to be used for creating users
    |--------------------------------------------------------------------------
    |
    | This option controls the manager that should be used to find
    | existing or create new users authenticated with novu-auth.
    | There is also a Manager to be used in Statamic projects.
    |
    |
    */

    'user-manager' => \Novu\Auth\UserManagerStatamic::class,
];
