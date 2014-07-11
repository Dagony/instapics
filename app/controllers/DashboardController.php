<?php

class DashboardController extends BaseController {
    public function postIndex() {
        $user = Auth::user();

        $photos = $user->photos()->orderBy('created_at', 'desc')->orderBy('id', 'desc')->get();

        return View::make('dashboard.index', array('photos' => $photos));
    }
}