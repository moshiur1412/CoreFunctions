<?php

namespace App\Exceptions;

use Exception;
use Log;
class HackerAlertException extends Exception 
{

	public function report()
	{
		Log::critical('Hacker tried to hack us today !');
	}

	public function render()
	{
		
		return response()->json([

			'Message' => 'Hacker, You got no luck today'

		]);

	}
}