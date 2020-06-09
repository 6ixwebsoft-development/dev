<?php

namespace App\Rules;

use App\Functions;
use Illuminate\Contracts\Validation\Rule;

class Emails implements Rule
{
    protected $email;
    protected $type;
    protected $func;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
        $this->func = new Functions();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $all_emails = array_filter(explode(",",$value));

        switch ($this->type) {
            case 'mail':
                    $error = $this->emailCheck($all_emails);
                break;
            case 'sms':
                    $error = $this->mobileCheck($all_emails);
                break;            
        }

        if(!empty($error)){
            $this->email = implode("",$error);
            return false;
        }
        return true;

    }

    public function emailCheck($value)
    {        
        $error = array();
        foreach ($value as $row) {
            $row = trim($row);
            preg_match("/^[a-zA-Z0-9]+([\w\.\\'\!\#\$\%\&\*\+\-\/\=\?\^\`\{\|\}\~])*([a-zA-Z0-9])+@([a-zA-Z0-9]+\.)+[a-zA-Z0-9]{2,8}$/", $row, $output_array);
            //if (!empty($output_array) && !filter_var($row, FILTER_VALIDATE_EMAIL)) {            
            if (empty($output_array)) {
                $error[] = "'".$row."' is Invalid <br>";
            }
        }        
        return $error;
    }

    public function mobileCheck($value)
    {
        $error = array();
        foreach ($value as $row) {
            $row = trim($row);
            if (!$this->func->CheckPhone($row)) {
                $error[] = "'".$row."' is Invalid <br>";
            }
        }        
        return $error;
    }    
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->email;
    }
}
