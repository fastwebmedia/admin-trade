<?php namespace FWM\Admin\FormItems;

use Input;

class Password extends NamedFormItem
{

	protected $view = 'password';

    public function save()
    {
        $name = $this->name();

        if ( ! Input::has($name))
        {
            Input::merge([$name => null]);
        }

        if( $this->value() ){
            $password = bcrypt($this->value());

            $this->instance()->$name = $password;
        }
    }

}