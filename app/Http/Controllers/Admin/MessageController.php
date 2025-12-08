<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function index()
    {
        // Pagination 10 messages par page, les plus récents en premier
        $messages = Contact::latest()->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    public function show(Contact $message)
    {
        // Marquer comme lu quand on ouvre
        $message->update(['is_read' => true]);

        return view('admin.messages.show', compact('message'));
    }

    public function reply(Request $request, Contact $message)
    {
        // Validation
        $request->validate([
            'reply' => 'required|min:3'
        ]);

        // Envoi de l'email
        \Mail::to($message->email)->send(new \App\Mail\MessageReplyMail(
            $message->name,
            $request->reply
        ));

        return redirect()->route('admin.messages')->with('success', 'Réponse envoyée avec succès !');
        }


    public function markAsRead(Contact $message)
    {
        $message->is_read = true;
        $message->save();

        return redirect()->back()->with('success', 'Message marqué comme lu !');
    }
    public function markRead(Contact $message)
    {
        $message->is_read = true;
        $message->save();

        return back()->with('success', 'Message marqué comme lu.');
    }

}
