<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPasswordAfterRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Setting variable name
     *
     * @var name
     */
    private $name;

    /**
     * Setting variable email
     *
     * @var email
     */
    private $email;

    /**
     * Setting variable password
     *
     * @var password
     */
    private $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password)
    {
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.auth.send_password')
                    ->subject('Pendaftaran - ' . config('app.name'))
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'password' => $this->password
                    ]);
    }
}
