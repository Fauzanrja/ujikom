<?php


namespace App\Http\Controllers;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{

    public function create()
    {
        return view('admin.petugas.create');  // Create this view to show the form for adding petugas
    }

    public function showPetugas()
    {
        $petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));
    }
    
    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.petugas.index', compact('petugas'));
    }
    public function checkUsername(Request $request)
    {
        $exists = Petugas::where('username', $request->username)->exists();
        return response()->json(['exists' => $exists]);
    }
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'username' => 'required|unique:petugas|max:255',
            'password' => 'required|min:6',
        ]);

        // Create the petugas
        $petugas = new Petugas;
        $petugas->username = $request->username;
        $petugas->password = bcrypt($request->password);  // Ensure the password is encrypted
        $petugas->save();

        return redirect()->route('petugas.index')->with('success', 'Petugas created successfully!');
    }


    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);  // Find the petugas by id
        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:6', // Password is optional, but if provided, must be at least 6 characters
        ]);

        // Find the petugas by id
        $petugas = Petugas::findOrFail($id);

        // Update the fields
        $petugas->username = $request->input('username');
        
        // If a password is provided, hash it and update
        if ($request->filled('password')) {
            $petugas->password = bcrypt($request->input('password'));
        }

        // Save the updated petugas
        $petugas->save();

        // Redirect with a success message
        return redirect()->route('petugas.index')->with('success', 'Petugas updated successfully!');
    }


    public function destroy($id)
    {
        // Find the petugas by id
        $petugas = Petugas::findOrFail($id);

        // Delete the petugas record
        $petugas->delete();

        // Get the last ID in the table
        $lastId = Petugas::max('id');

        // If there is a last ID, reset the auto increment to be one higher than the last ID
        // If there is no last ID, set it to 1
        $newAutoIncrement = $lastId ? $lastId + 1 : 1;

        // Reset auto increment on the petugas table
        DB::statement("ALTER TABLE petugas AUTO_INCREMENT = {$newAutoIncrement}");

        // Redirect back to petugas.index route with a success message
        return redirect()->route('petugas.index')->with('success', 'Petugas deleted successfully');
    }
}