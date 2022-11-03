<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController');

    // Article Category
    Route::apiResource('article-categories', 'ArticleCategoryApiController');

    // Ingredients
    Route::apiResource('ingredients', 'IngredientsApiController');

    // Allergence Master
    Route::apiResource('allergence-masters', 'AllergenceMasterApiController');

    // Diet Master
    Route::apiResource('diet-masters', 'DietMasterApiController');

    // Tags
    Route::apiResource('tags', 'TagsApiController');

    // Constituent Master
    Route::apiResource('constituent-masters', 'ConstituentMasterApiController');
});
