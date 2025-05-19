<?php

namespace App\Http\Controllers;

use App\Models\JobApplication; // Import the JobApplication model
use Illuminate\Http\Request;

class LamaranController extends Controller
{
   public function showLamaran()
{
    // Fetch all job applications from the database
    $applications = \App\Models\JobApplication::all();

    // Debugging output
    dd($applications); // Cek apakah data benar-benar ada

    // Return the 'dashboardperusahaan' view with the applications data
    return view('dashboardperusahaan', compact('applications'));
}

    /**
     * Accept a job application (mark as accepted).
     *
     * @param  int  $applicationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function acceptLamaran($applicationId)
    {
        $application = JobApplication::find($applicationId);
        
        if ($application) {
            $application->status = 'accepted'; // Example field for accepted status
            $application->save();
            return redirect()->route('lamaran')->with('success', 'Lamaran diterima!');
        }
        
        return redirect()->route('lamaran')->with('error', 'Lamaran tidak ditemukan!');
    }

    /**
     * Reject a job application (mark as rejected).
     *
     * @param  int  $applicationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rejectLamaran($applicationId)
    {
        $application = JobApplication::find($applicationId);

        if ($application) {
            $application->status = 'rejected'; // Example field for rejected status
            $application->save();
            return redirect()->route('lamaran')->with('success', 'Lamaran ditolak!');
        }

        return redirect()->route('lamaran')->with('error', 'Lamaran tidak ditemukan!');
    }


}
