<?php namespace App\Exceptions;

use Exception;
//use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Bugsnag\BugsnagLaravel\BugsnagExceptionHandler as ExceptionHandler;
use App;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 */
	public function report(Exception $e)
	{
        return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
        if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException)
        {
            //We threw some App::abort() exception.
            //If its an unauthorized request, we don't need the app to explode,
            //so we'll just redirect them back to the login page.
            if($e->getStatusCode() == 401)
            {
                return redirect()->guest('auth/login');
                //return parent::report($e);
            }
        }
		return parent::render($request, $e);
	}

}
