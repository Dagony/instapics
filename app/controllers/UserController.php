<?php

class UserController extends BaseController
{
    public function postAuthenticate()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $new_user = Input::get('new_user', 'off');

        if ($new_user == 'on') {
            try {
                $user = new User();

                $user->email = $email;
                $user->password = Hash::make($password);
                $user->save();
                Auth::login($user);

                return Redirect::to('dashboard/index');
            } catch(Exception $e) {
                echo "Failed to create new user!";
            }
        } else {
            $credentials = array(
                'email'  =>  $email,
                'password'  => $password
            );

            if (Auth::attempt($credentials)) {
                return Redirect::to('dashboard/index')->with('message', 'You are logged in!');
            } else {
                echo 'Failed to login';
            }
        }
    }

    public function postLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}