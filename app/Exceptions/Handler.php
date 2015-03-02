<?php namespace App\Exceptions;

use Bugsnag_Client;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

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

        $bugsnag = new Bugsnag_Client(\Config::get('app.bugsnag_api_key'));
        $bugsnag->setProjectRoot(app_path());
        $bugsnag->setSendEnvironment(true);
        $bugsnag->setReleaseStage(App::environment());
        $bugsnag->notifyException($e);
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
            if($e->getStatusCode() == 401)
            {
                return redirect()->guest('auth/login');
                //return parent::report($e);
            }
        }
		return parent::render($request, $e);
	}

}
