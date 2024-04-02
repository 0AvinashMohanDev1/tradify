<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Illuminate\Support\Facades\Auth;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return "Ram Ram";
        $notes= Notes::all();
        // echo $notes;
        return view('notes.index',['notes'=>$notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $note=new Notes;
        $note->title=$request->title;
        $note->user_id = Auth::id();
        $note->content = $request->content;
        $note->status = $request->status;
        $note->target =$request->target;
        $note->share = $request->share;
        $note->save();
        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $note= Notes::find($id);
        $user_id=Auth::id();
        // echo $note;
        return view('notes.show',['note'=>$note,'user'=>$user_id]);
    }
    /**
     * Display the specified resource via url.
     */
    public function url(string $id)
    {
        //
        $note= Notes::find($id);
        $user_id=Auth::id();
        // echo $note;
        return view('notes.url',['note'=>$note,'user'=>$user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $note= Notes::find($id);
        $user_id=Auth::id();
        return view('notes.edit',['note'=>$note,'user'=>$user_id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $note = Notes::findOrFail($id);

        // Update the note attributes only if they have changed
        if ($request->title !== $note->title) {
            $note->title = $request->title;
        }
        if ($request->content !== $note->content) {
            $note->content = $request->content;
        }
        if ($request->status !== $note->status) {
            $note->status = $request->status;
        }
        if ($request->target !== $note->target) {
            $note->target = $request->target;
        }

        if($request->share !== $note->share){
            $note->share = $request->share;
        }

        // Save the updated note
        $note->save();
        echo $note;

        // Redirect to the show page for the updated note
        return redirect()->route('notes.show', ['note' => $note]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $note=Notes::find($id);
        $user_id=Auth::id();
        if($note->user_id !== $user_id){
            return "<p>Not Allowed</p>";
        }else{
            $note->delete();
            return redirect()->route('notes.index');
        }
        
        
    }
}
