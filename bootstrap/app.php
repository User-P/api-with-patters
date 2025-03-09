<?php

    use App\Classes\ApiResponseClass;
    use Illuminate\Foundation\Application;
    use Illuminate\Foundation\Configuration\Exceptions;
    use Illuminate\Foundation\Configuration\Middleware;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Validation\ValidationException;
    use Spatie\Permission\Middleware\PermissionMiddleware;
    use Spatie\Permission\Middleware\RoleMiddleware;
    use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;
    use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

    return Application::configure(basePath: dirname(__DIR__))
        ->withRouting(
            api: __DIR__ . '/../routes/api.php',
            commands: __DIR__ . '/../routes/console.php',
            health: '/up',
        )
        ->withMiddleware(function (Middleware $middleware) {
            $middleware->alias([
                'role' => RoleMiddleware::class,
                'permission' => PermissionMiddleware::class,
                'role_or_permission' => RoleOrPermissionMiddleware::class
            ]);
        })
        ->withExceptions(function (Exceptions $exceptions) {
            $exceptions->render(function (NotFoundHttpException $e, Request $request) {
                return ApiResponseClass::error(
                    'The requested ' . $request->path() . ' was not found.',
                    [],404);
            });
            $exceptions->renderable(function (Throwable $e, Request $request) {
                if ($request->is('api/*')) {
                    if ($e instanceof ValidationException) {
                        $message = 'Los datos proporcionados no son válidos.';
                        $errors = $e->validator->errors()->toArray();
                        $status = $e->status;
                    }
                    if ($e instanceof NotFoundHttpException) {
                        $message = 'The requested' . $request->path() . ' was not found.';
                        $status = 404;
                    }
                    return ApiResponseClass::error(
                        $message ?? $e->getMessage(),
                        $errors ?? [],
                        $status ?? 500
                    );
                }
                return new Response($e->getMessage(), 404);
            });

        })->create();
