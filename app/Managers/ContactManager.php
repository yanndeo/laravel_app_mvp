<?php

namespace App\Managers;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use PhpParser\ErrorHandler\Collecting;

/**
 * Undocumented class
 */
class ContactManager implements IManager
{

    /**
     * Create
     *
     * @param array $data
     */
    public function save($data): Contact
    {
        return  Contact::create(
            [
                'subject' => $data['subject'],
                'email' => $data['email'],
                'description' => $data['description']
            ]
        );
    }


    /**
     * Delete
     *
     * @param integer $id
     */
    public function remove(int $id)
    {
        $contact = Contact::findOrFail($id);
        return  $contact->delete();
    }

    /**
     * Contact list
     */
    public function getList()
    {
        $contacts = Contact::all();
        return $contacts->sortBy('created_at', null, true);
    }
}
