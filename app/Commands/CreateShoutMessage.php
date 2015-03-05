<?php namespace App\Commands;

use App\Commands\Command;

use App\Exceptions\ShoutCreationException;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use GuzzleHttp\Client;
use Config;
use App\Events\ShoutWasCreated;
use Event;

class CreateShoutMessage extends Command implements SelfHandling, ShouldBeQueued {

    use InteractsWithQueue, SerializesModels;

    private $user;
    private $message;

    /**
     * Create a new command instance.
     *
     * @param $user
     * @param $message
     */
	public function __construct(User $user, $message)
	{
		$this->user = $user;
        $this->message = $message;
	}

    /**
     * Execute the command.
     *
     * @throws ShoutCreationException
     */
	public function handle()
	{
        if(strlen($this->message) > 2000) {
            $this->message = substr($this->message, 0, 2000);
        }
        $this->message = trim($this->message);
        $client = new Client();
        $response = $client->post(Config::get('app.slack_incoming_webhook')['url'], ['json' => ['text' => $this->message, 'username' => $this->user->username]]);
        if($response->getStatusCode() == '200') {
            Event::fire(new ShoutWasCreated($response, $this->user, $this->message));
        }else {
            throw new ShoutCreationException($response, $this->user, $this->message);
        }
	}
}

