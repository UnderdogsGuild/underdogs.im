<?php namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class ShoutWasCreated extends Event {

	use SerializesModels;

    private $response;
    private $user;
    private $message;
    /**
     * Create a new event instance.
     *
     * @param $response
     * @param $user
     * @param $message
     */
	public function __construct($response, $user, $message)
	{
		$this->response = $response;
        $this->user = $user;
        $this->message = $message;
	}

    /**
     * @return \GuzzleHttp\Message\Response
     */
    final public function getResponse() {
        return $this->response;
    }

    /**
     * @return \App\User
     */
    final public function getUser() {
        return $this->user;
    }

    /**
     * @return string
     */
    final public function getMessage() {
        return $this->message;
    }
}
