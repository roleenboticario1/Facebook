<?php


namespace App\Traits;
use App\Friendship;

trait Friendable
{
	public function test()
	{
		return "Hi";
	}

	public function addFriends($id)
	{
		$Friendship = Friendship::create([
           'requester' => $this->id, //who is logged in. yung nag rerequest
           'user_requested' => $id // yung pinag requestan or inadd
		]);

		if($Friendship)
		{
			return $Friendship;
		}

		return 'Failed!';
	}
}

