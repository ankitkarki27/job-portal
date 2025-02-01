<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('applicant.home');
    }
}
