<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MouProgressController extends Controller
{
    public function getMouprogressPage()
    {
        $partners = Partner::all();
        $notifications = Notification::all();
        return view('pages.mou.mou_progress',compact('notifications','partners'));  
    }
    
}
