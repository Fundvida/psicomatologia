<?php
namespace App\Traits;
use Illuminate\Support\Facades\Session;

trait AddsToastTrait
{
    protected function addToast(string $title, string $message, string $type, bool $alwaysShow)
    {
        // $request = new Request();
        $toast = [
            'title'      => $title,
            'message'    => $message,
            'type'       => $type,
            'alwaysShow' => $alwaysShow
        ];
 
        // Request::session()->flash('toast', $toast);
        Session::flash('toast',$toast);
        //request()->session()->flash('toast',$toast);
        // $request->session()->flash('toast', $toast);
    }
}