<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ContactController extends Controller
{
    public function search($item){
        $contacts = [];
        sleep(5000);
        if ($item) {
           $contacts = Contact::where('name', 'like', '%' . $item . '%')
               ->orWhere('email', 'like', '%' . $item . '%')
               ->orWhere('phone', 'like', '%' . $item . '%')
               ->get();
       }
       else{
           $contacts = Contact::all();
       }
        return $contacts->toJSON();
    }
}
