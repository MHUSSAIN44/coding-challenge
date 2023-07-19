<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Connection;

class UserConnectionController extends Controller
{
    public function getSuggestions()
    {
        // Fetch users who are not connected to the currently authenticated user
        $userId = auth()->id();
        $connectedUserIds = Connection::where('user_id', $userId)->orWhere('connected_user_id', $userId)->pluck('id');
        $suggestions = User::whereNotIn('id', $connectedUserIds)->take(10)->get(); // Get the first 10 suggestions

        return response()->json($suggestions);
    }

    public function sendRequest($id)
    {
        // Create a connection request from the currently authenticated user to another user
        $connection = Connection::create([
            'user_id' => auth()->id(),
            'connected_user_id' => $id,
        ]);

        return response()->json($connection);
    }

    public function withdrawRequest($id)
    {
        // Delete a connection request sent by the currently authenticated user
        $connection = Connection::where('user_id', auth()->id())->where('connected_user_id', $id)->first();
        if($connection) {
            $connection->delete();
        }
        return response()->json(['message' => 'Request withdrawn']);
    }

    public function getConnections()
    {
        // Fetch connections of the currently authenticated user
        $connections = Connection::where('user_id', auth()->id())->orWhere('connected_user_id', auth()->id())->get();

        return response()->json($connections);
    }

    public function removeConnection($id)
    {
        // Remove a connection of the currently authenticated user
        $connection = Connection::where(function ($query) use ($id) {
            $query->where('user_id', auth()->id())
                  ->where('connected_user_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('user_id', $id)
                  ->where('connected_user_id', auth()->id());
        })->first();

        if($connection) {
            $connection->delete();
        }

        return response()->json(['message' => 'Connection removed']);
    }
}
