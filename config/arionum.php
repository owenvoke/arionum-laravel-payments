<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Arionum Node URI
    |--------------------------------------------------------------------------
    |
    | This is the node address that will be used for generating addresses, etc.
    | Ensure that this is a trusted, preferably-HTTPS node URI.
    |
    */

    'node_uri' => env('ARIONUM_NODE_URI'),

    /*
    |--------------------------------------------------------------------------
    | Required Confirmations
    |--------------------------------------------------------------------------
    |
    | This is the number of confirmations that are required for a transaction
    | to be marked as successful.
    |
    */

    'confirmations' => 10,

];
