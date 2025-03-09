<?php

    use App\Http\Controllers\Account\AccountController;
    use App\Http\Controllers\Auth\AuthController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\Auth\RolePermissionController;
    use App\Http\Controllers\GenderController;
    use App\Http\Controllers\Invitation\InvitationController;
    use App\Http\Controllers\Issuer\IssuerController;
    use App\Http\Controllers\Sat\BankController;
    use App\Http\Controllers\Sat\TaxRegimeController;
    use App\Http\Middleware\CustomAuthVerification;
    use Illuminate\Support\Facades\Route;

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);

    Route::middleware([CustomAuthVerification::class])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('logout', 'logout');
            Route::get('me', 'me');
        });

        //SAT
        Route::group(['prefix' => 'sat'], function () {
            Route::get('tax-regimes', TaxRegimeController::class);
            Route::get('banks', BankController::class);
        });

        Route::group(['prefix' => 'catalogs'], function () {
            Route::get('genders', GenderController::class);
        });

        Route::controller(RolePermissionController::class)->group(function () {
            Route::get('/roles', 'getAllRoles');
            Route::get('/permissions', 'getAllPermissions');
            Route::post('/users/{id}/roles', 'assignRole');
            Route::post('/users/{id}/permissions', 'assignPermission');
            Route::get('/users/{id}/roles-permissions', 'getUserRolesAndPermissions');
        });

        Route::apiResource('accounts', AccountController::class);
        Route::apiResource('issuers', IssuerController::class);

        Route::post('issuer/invite', [InvitationController::class, 'invite']);

        Route::get('search/issuers', [IssuerController::class, 'search']);
//        Route::apiResource('receivers', ReceiverController::class);
    });

    Route::post('issuer/check-invitation', [InvitationController::class, 'checkInvitation']);
    Route::post('issuer/accept-invitation', [InvitationController::class, 'acceptInvitation']);


