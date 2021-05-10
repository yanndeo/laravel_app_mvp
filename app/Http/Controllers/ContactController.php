<?php

namespace App\Http\Controllers;

use App\Events\ContactRegistered;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Managers\ContactManager;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    private ContactManager $contactManager;

    /**
     * Undocumented function
     *
     * @param ContactManager $contactManager
     */
    public function __construct(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }

    /**
     * Show the contact's list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contacts = $this->contactManager->getList();

        return view('templates.contact.list', compact('contacts'));
    }


    /**
     * Save contact 
     *
     * @param Request $request
     *
     * @return void
     */
    public function store(ContactRequest $request)
    {
        //Persist In Database
        $contact = $this->contactManager->save($request->all());
        //Flash Message
        Session::flash('flash_message', 'Your message has been sent!');
        //Dispatch event 
        ContactRegistered::dispatch($contact);

        return redirect()->back();
    }


    /**
     * Show the contact list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id)
    {
        $contacts = $this->contactManager->getList();
        $contact = Contact::findOrFail($id);


        return view('templates.contact.list', compact('contacts', 'contact'));
    }


    /**
     * Undocumented function
     *
     * @param int $id
     * 
     * @param Request $request
     */
    public function update(int $id, ContactRequest $request)
    {
        $contact = Contact::findOrFail($id);

        $input = $request->all();

        $contact->fill($input)->save();
        Session::flash('flash_message', 'Contact successfully changed!');
        return redirect()->route('contact.index');
    }


    /**
     * Undocumented function
     *
     * @param int $id
     */
    public function delete(int $id): Response
    {
        $this->contactManager->remove($id);
        Session::flash('flash_message', ' Contact successfully deleted!');
        return redirect()->route('contact.index');
    }
}
