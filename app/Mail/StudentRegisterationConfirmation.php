<?php

namespace App\Mail;

use App\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class StudentRegisterationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    protected $student;

    public function __construct(Student $student)
    {
        //
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.student_registration')
            ->with([
                'name' => $this->student->name,
                'email' => $this->student->email,
                'phone' => $this->student->phone,
            ]);
    }
}
