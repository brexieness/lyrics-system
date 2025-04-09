<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    // Admin login
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate user
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Check if user is an admin (Ensure `is_admin` column exists)
            if ($user->is_admin) {
                // Create token for admin user
                $token = $user->createToken('admin-token')->plainTextToken;
                
                // Return response with token and token type
                return response()->json([
                    'token' => $token,
                    'token_type' => 'Bearer',
                ], 200);
            }

            // If not admin, return Unauthorized error
            return response()->json(['message' => 'Unauthorized: Admin access required'], 403);
        }

        // Return error if credentials are invalid
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
// Compare this snippet from app/Models/Song.php: