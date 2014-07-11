<?php

class BaseController extends Controller {

    public function __construct()
    {
        // Assets
        HTML::style('css/bootstrap.min.css');
        HTML::style('css/bootstrap-theme.min.css');
        HTML::script('js/jquery.js');
        HTML::script('js/bootstrap.js');

        HTML::style('css/main.css');
        //parent::__construct();

        // Filters
        $class=  get_called_class();
        switch ($class)
        {
            case 'HomeController'   :
                $this->beforeFilter('nonauth');
                break;

            case 'UserController'   :
                $this->beforeFilter('nonauth', array('only'=> array('authenticate')));
                $this->beforeFilter('auth', array('only' => 'logout'));
                break;

            default                 :
                $this->beforeFilter('auth');
                break;
        }
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
