<?php

class PhotoController extends BaseController
{


    public function upload()
    {
        $upload_success = false;

        if (Input::file('photo')->isValid())
        {
            $destinationPath = sha1(Auth::user()->id);
            $upload_destinationPath = public_path('/uploads/').$destinationPath;
            $extension = Input::file('photo')->getClientOriginalExtension();
            $fileName = Auth::user()->id.time().".{$extension}";
            try {
                Input::file('photo')->move($upload_destinationPath, $fileName);
            } catch (Exception $e) {
                echo $e;
            }

            try {
                $photo = New Photo();
                $photo->location = $destinationPath . '/'.$fileName;
                $photo->description = Input::get('description');
                Auth::user()->photos()->save($photo);
            } catch (Exception $e) {
                echo $e;
            }




/*
                //Session::get('success')->with('message', 'Successfully uploaded new Instapic');
            } else {
                Session::get('error')->with('message', 'An error occurred while uploading new Instapic - please try again.');
            }
*/
        }

        return Redirect::to('dashboard/index');
    }
}