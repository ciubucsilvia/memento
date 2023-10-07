<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($this->isHttpException($exception)) {

            $statusCode = $exception->getStatusCode();
            switch ($statusCode) {
                case '403':

                    $obj = new \App\Http\Controllers\Admin\AdminController(new \App\Repositories\MenusRepository(new \App\Menu));

                    $menu = $obj->getMenu();
                    
                    $sidebar = view(env('THEME') . '.admin.parts.sidebar')->withMenu($menu)->render();
                    $navigation = view(env('THEME') . '.admin.parts.navigation');

                    \Log::alert('You are forbidden! ' . $request->url());

                    return response()->view(env('THEME') . '.errors.403', [
                            'title' => 'You are forbidden!', 
                            'sidebar' => $sidebar,
                            'navigation' => $navigation
                        ]);

                // case '404':

                //     $obj = new \App\Http\Controllers\BaseController(new \App\Repositories\MenusRepository(new \App\Menu), new \App\Repositories\ArticlesRepository(new \App\Article));

                //     $menu = $obj->getMenu();

                //     $navigation = view(env('THEME') . '.navigation')->withMenu($menu)->render();

                //     \Log::alert('Page no find! ' . $request->url());

                //     return response()->view(env('THEME') . '.errors.404', [
                //             'title' => 'Page no find!', 
                //             'bar' => 'no', 
                //             'navigation' => $navigation
                //         ]);
            }
        }

        return parent::render($request, $exception);
    }
}
