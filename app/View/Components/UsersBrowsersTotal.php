<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class UsersBrowsersTotal extends Component
{
    public $browsers=[];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $browsers=\DB::table('users_browsers')->groupBy('user_agent')->selectRaw('user_agent,COUNT(id) as count')->get();
        foreach ($browsers as $browser)
        {
            $this->browsers[]=$browser->user_agent.' : '.$browser->count;
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.users-browsers-total');
    }
}
