<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json(Contact::all(), 200);
    }

    // Tạo một liên hệ mới
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'name' => 'nullable|string|max:150',
            'email' => 'nullable|string|email|max:150',
            'contact_content' => 'required|string'
        ]);

        $contact = Contact::create($validatedData);
        return response()->json($contact, 201);
    }

    // Lấy thông tin một liên hệ cụ thể
    public function show($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }
        return response()->json($contact, 200);
    }

    // Cập nhật thông tin liên hệ
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        $validatedData = $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'name' => 'nullable|string|max:150',
            'email' => 'nullable|string|email|max:150',
            'contact_content' => 'required|string'
        ]);

        $contact->update($validatedData);
        return response()->json($contact, 200);
    }

    // Xóa liên hệ
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        $contact->delete();
        return response()->json(['message' => 'Contact deleted successfully'], 200);
    }
}
