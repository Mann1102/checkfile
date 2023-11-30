<?php

// app/Http/Controllers/AdminController.php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        // Logic for admin dashboard
        return view('admin.dashboard');
    }

    public function verifyData()
    {
        // Logic for verifying data
        return view('verify_data');
    }

    public function searchData(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'id' => 'nullable|exists:data,id',
        ]);

        // If ID is provided, show details for that ID
        if ($validatedData['id']) {
            $data = Data::find($validatedData['id']);
            return view('admin.show_data', ['data' => $data]);
        }

        // If no ID is provided, show all entries with pagination
        $allData = Data::paginate(10);
        return view('admin.show_all_data', ['allData' => $allData]);
    }
    public function showAllData()
    {
        // Logic to retrieve all data
        $allData = Data::paginate(10);
    
        return view('admin.show_data', ['allData' => $allData]);
    }
    public function changeStatus(Request $request)
    {
        // Logic for changing status
        // Update the status in the database based on the request data
        // Redirect back with a success message
    }
}
