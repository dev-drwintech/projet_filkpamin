<?php

return [
    /*
     * The view id of which you want to display data.
     */
    'view_id' => env('GOOGLE_ANALYTICS_ID'),

    /*
     * Path to the json file with service account credentials.
     */
    'service_account_credentials_json' => storage_path('app/google/filmkpamin-432716-ee9450ddde7a.json'),

    /*
     * The amount of minutes the Google API responses will be cached.
     * If you set this to zero, the responses won't be cached at all.
     */
    'cache_lifetime_in_minutes' => 60 * 24,
];
