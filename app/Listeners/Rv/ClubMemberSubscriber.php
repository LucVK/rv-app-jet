<?php

namespace App\Listeners\Rv;

use App\Events\Rv\ClubMemberCreate;

class ClubMemberSubscriber
{
    public function __construct()
    {
        //
    }

    public function onClubMemberCreate($event)
    {
        $x = $event->payload;
    }

    public function subscribe($events)
    {
        $events->listen(
            ClubMemberCreate::class,
            'App\Listeners\Rv\ClubMemberSubscriber@onClubMemberCreate'
        );
    }
}
