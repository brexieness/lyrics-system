<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    // List public songs
    public function index()
    {
        $songs = Song::where('public', true)->get();
        return response()->json($songs);
    }

    // Show a specific song
    public function show($id)
    {
        $song = Song::findOrFail($id);
        return response()->json($song);
    }

    // Store a new song (admin only)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'lyrics' => 'required|string',
            'public' => 'boolean',
            'cover_image' => 'required|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $song = Song::create([
            'title' => $request->title,
            'lyrics' => $request->lyrics,
            'public' => $request->public ?? true,
            'cover_image' => $request->cover_image->store('covers'),
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return response()->json($song, 201);
    }

    // Update an existing song (admin only)
    public function update(Request $request, $id)
    {
        $song = Song::findOrFail($id);

        $request->validate([
            'title' => 'string',
            'lyrics' => 'string',
            'public' => 'boolean',
            'cover_image' => 'image',
            'category_id' => 'exists:categories,id',
        ]);

        $song->update($request->only('title', 'lyrics', 'public', 'category_id'));

        if ($request->hasFile('cover_image')) {
            $song->cover_image = $request->cover_image->store('covers');
            $song->save();
        }

        return response()->json($song);
    }

    // Delete a song (admin only)
    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();
        return response()->json(['message' => 'Song deleted successfully']);
    }
}
