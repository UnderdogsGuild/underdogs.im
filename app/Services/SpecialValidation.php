<?php
/**
 * Created by PhpStorm.
 * User: cetho_000
 * Date: 3/3/2015
 * Time: 9:37 PM
 */

namespace App\Services;
use \GuzzleHttp\Client;

class SpecialValidation extends \Illuminate\Validation\Validator
{

    private $_custom_messages = array(
        "recaptcha" => "You failed the humanity test.",
    );

    public function __construct( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
        parent::__construct( $translator, $data, $rules, $messages, $customAttributes );
        $this->_set_custom_stuff();
    }

    protected function _set_custom_stuff() {
        //setup our custom error messages
        $this->setCustomMessages( $this->_custom_messages );
    }

    public function validateRecaptcha($attributes, $value, $parameters)
    {
        $client = new Client();
        $request = $client->createRequest('POST', 'https://www.google.com/recaptcha/api/siteverify');
        $postBody = $request->getBody();

        $postBody->setField('secret', '6Lfg8wITAAAAAGqQlMQsyFZDytAlFJy4zuzP9_SQ');
        $postBody->setField('response', $value);
        $postBody->setField('remoteip', \Request::getClientIp());

        $response =  $client->send($request);

        if(json_decode($response->getBody())->success)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}