<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('dogs', 'DogApiController');

    Route::apiResource('litters', 'LitterApiController');

    Route::apiResource('content-categories', 'ContentCategoryApiController');

    Route::apiResource('content-tags', 'ContentTagApiController');

    Route::apiResource('content-pages', 'ContentPageApiController');
});
