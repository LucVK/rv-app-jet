<?php

namespace App\Listeners\Rv;

use App\Events\Rv\ClubMemberCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClubMemberCreator
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Rv\ClubMemberCreate  $event
     * @return void
     */
    public function handle(ClubMemberCreate $event)
    {
        $xxx = $event->payload;
    }
}
