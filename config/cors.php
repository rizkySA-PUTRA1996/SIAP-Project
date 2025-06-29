<?php

return [
  'paths' => ['api/*', 'sanctum/csrf-cookie'],

  'allowed_methods' => ['*'],

  'allowed_origins' =>
  [
  'https://siapotik.vercel.app',
  'https://frontend-pemeriksaan.vercel.app',
  'http://localhost:5173',
  'capacitor://localhost',
  'ionic://localhost'
  ],

  'allowed_origins_patterns' => [],

  'allowed_headers' => ['*'],

  'exposed_headers' => [],

  'max_age' => 0,

  'supports_credentials' => true,
];
