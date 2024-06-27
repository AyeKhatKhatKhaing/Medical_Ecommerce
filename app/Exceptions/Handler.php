<?php

namespace App\Exceptions;

use Throwable;
use App\Mail\ExceptionOccured;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            if(config('app.env') == 'production'){
                $this->sendEmail($e);
            }
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {
                // not authorized
                case '403':
                    // return \Response::view('errors.403',array(),403);
                    // return redirect()->back()->with('danger', 'Sorry! Access Denied!');
                    logger('Reached the redirect point.');
                    return redirect()->back()->with('danger', 'Sorry! Access Denied!');
                    break;

                // Unauthorized
                case '401':
                    return \Response::view('errors.401',array(),401);
                    break;

                // Too Many Requests
                case '429':
                    return \Response::view('errors.429',array(),429);
                    break;

                // not found
                case '404':
                    return \Response::view('errors.404',array(),404);
                    break;

                // internal error
                case '500':
                    return \Response::view('errors.500',array(),500);
                    break;

                //maintenance mode
                case '503':
                    return \Response::view('errors.maintenance',array(),500);
                    break;

                default:
                    return $this->renderHttpException($exception);
                    break;
            }
        } else {
            return parent::render($request, $exception);
        }
    }


    public function sendEmail(Throwable $exception)
    {
       try {
            $content['message'] = $exception->getMessage();
            $content['file'] = $exception->getFile();
            $content['line'] = $exception->getLine();
            $content['trace'] = $exception->getTrace();
  
            $content['url'] = request()->url();
            $content['body'] = request()->all();
            $content['ip'] = request()->ip();
   
            $ccEmails = [
                "pearl@visibleone.com",
                "aries@visibleone.com",
                'visibleone.pearl@gmail.com',
                'bella@visibleone.com',
                'visibleone.kylen@gmail.com',
            ];
            // $bccEmails = ["aries@visibleone.com"];

            Mail::to('visibleone.aries@gmail.com')
            ->cc($ccEmails)
            // ->bcc($bccEmails)
            ->send(new ExceptionOccured($content));
  
        } catch (Throwable $exception) {
            Log::error($exception);
        }
    }
}
