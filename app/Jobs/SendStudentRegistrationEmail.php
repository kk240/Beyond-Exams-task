<?php

namespace App\Jobs;

use App\Mail\StudentRegisterationConfirmation;


use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Student;


class SendStudentRegistrationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $student = $this->student;


        Mail::to($student->email)->send(new StudentRegisterationConfirmation($student));
    }
}
