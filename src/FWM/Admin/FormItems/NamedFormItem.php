<?php namespace FWM\Admin\FormItems;

use Input;

abstract class NamedFormItem extends BaseFormItem
{

    protected $name;
    protected $label;
    protected $defaultValue;
    protected $readonly;
    protected $ignored;
    protected $help;
    protected $placeholder;

    function __construct($name, $label = null)
    {
        $this->label = $label;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIgnored()
    {
        return $this->ignored;
    }

    public function name($name = null)
    {
        if (is_null($name))
        {
            return $this->name;
        }
        $this->name = $name;
        return $this;
    }

    public function label($label = null)
    {
        if (is_null($label))
        {
            return $this->label;
        }
        $this->label = $label;
        return $this;
    }

    public function getParams()
    {
        return parent::getParams() + [
            'name'          => $this->name(),
            'label'         => $this->label(),
            'readonly'      => $this->readonly(),
            'help'          => $this->help(),
            'placeholder'   => $this->placeholder(),
            'value'         => $this->value()
        ];
    }

    public function defaultValue($defaultValue = null)
    {
        if (is_null($defaultValue))
        {
            return $this->defaultValue;
        }
        $this->defaultValue = $defaultValue;
        return $this;
    }

    public function readonly($readonly = null)
    {
        if (is_null($readonly))
        {
            return $this->readonly;
        }

        $this->readonly = $readonly;

        return $this;
    }

    public function help($help = null)
    {
        if (is_null($help))
        {
            return $this->help;
        }

        $this->help = $help;

        return $this;
    }

    public function placeholder($placeholder = null)
    {
        if (is_null($placeholder))
        {
            return $this->placeholder;
        }

        $this->placeholder = $placeholder;

        return $this;
    }

    public function value()
    {
        $instance = $this->instance();
        if ( ! is_null($value = old($this->name())))
        {
            return $value;
        }
        $input = Input::all();
        if (array_key_exists($this->name, $input))
        {
            return Input::get($this->name());
        }
        if ( ! is_null($instance) && ! is_null($value = $instance->getAttribute($this->name())))
        {
            return $value;
        }
        return $this->defaultValue();
    }

    public function save()
    {
        $name = $this->name();
        if ( ! Input::has($name))
        {
            Input::merge([$name => null]);
        }
        $this->instance()->$name = $this->value();
    }

    public function required()
    {
        return $this->validationRule('required');
    }

    public function ignored()
    {
        $this->ignored = true;
        return $this;
    }

    public function unique()
    {
        return $this->validationRule('_unique');
    }

    public function getValidationRules()
    {
        $rules = parent::getValidationRules();
        array_walk($rules, function (&$item)
        {
            if ($item == '_unique')
            {
                $table = $this->instance()->getTable();
                $item = 'unique:' . $table . ',' . $this->name();
                if ($this->instance()->exists())
                {
                    $item .= ',' . $this->instance()->getKey();
                }
            }
        });
        return [
            $this->name() => $rules
        ];
    }

}