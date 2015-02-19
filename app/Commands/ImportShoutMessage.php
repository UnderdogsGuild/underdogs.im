<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Carbon\Carbon;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class ImportShoutMessage extends Command implements SelfHandling, ShouldBeQueued {

	use InteractsWithQueue, SerializesModels;

    private $channel;
    private $username;
    private $timestamp;
    private $text;
    private $token;
    /**
     * Create a new command instance.
     * @param $channel The channel the message was sent to. Should always be shoutbox.
     * @param $username
     * @param Carbon $timestamp
     * @param $text
     */
	public function __construct($token, $channel, $username, Carbon $timestamp, $text)
	{
        $this->token = $token;
        $this->channel = $channel;
        $this->username = $username;
        $this->timestamp = $timestamp;
        $this->text = $text;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		if(!isValid()) {
            throw(new BadCredentialsException);
        }
	}

    /**
     * @return bool
     */
    public function isValid() {
        return $this->channel == 'shoutbox' && $this->token == \Config::get('app.slack_outgoing_webhook')['token'];
    }
}

//token=tY6NavDzATVgktCWSG41Hf8I
//team_id=T0001
//channel_id=C2147483705
//channel_name=test
//timestamp=1355517523.000005
//user_id=U2147483697
//user_name=Steve
//text=googlebot: What is the air-speed velocity of an unladen swallow?
//trigger_word=googlebot: