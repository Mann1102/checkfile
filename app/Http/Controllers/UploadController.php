<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{   
    public function index()
    {
        return view('upload');
    }
    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'adhar' => 'required|image',
            'pan' => 'required|image',
            'voter' => 'required|image',
        ]);

        // Upload images and get file paths
        $adharPath = $this->uploadImage($request->file('adhar'));
        $panPath = $this->uploadImage($request->file('pan'));
        $voterPath = $this->uploadImage($request->file('voter'));

        // Update or create a record in the data table
        $data = Data::updateOrCreate(
            [
                'name' => $validatedData['name'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
            ],
            [
                'adhar' => $adharPath,
                'pan' => $panPath,
                'voter' => $voterPath,
                'status' => 'pending',
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Form submitted successfully!');
    }

    // Helper method to upload an image and return the file path
    private function uploadImage($image)
    {
        $path = $image->store('images', 'public');
        return Storage::url($path);
    }
}
