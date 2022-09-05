<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Contact;

class ContactController extends Controller
{
        public function index()
    {
        return view('index');
    }

    public function manage(Request $request)
    {
        $contacts = Contact::Paginate(10);

        $fullname = $request->input('fullname');
        $from_date = $request->input('from_date');
        $until_date = $request->input('until_date');
        $email = $request->input('email');
        $gender = $request->input('gender');

        return view('manage',[
            'contacts' => $contacts,
            'fullname' => $fullname,    
            'from_date' => $from_date,
            'until_date' => $until_date,
            'email' => $email,
            'gender' => $gender,
        ]);
    }

    public function search(Request $request)
    {
        $contacts = Contact::Paginate(10);
        $id = $request -> input('id');
        $fullname = $request->input('fullname');
        $from_date = $request->input('from_date');
        $until_date = $request->input('until_date');
        $email = $request->input('email');
        $gender = $request->input('gender');

        $query = Contact::query();
        //名前
        if (isset($fullname)) {
            $query->where('fullname', 'like', '%' . self::escapeLike($fullname) . '%');
        }
        if (isset($request['from_date']) || isset($request['until_date'])) {
            $query = Contact::getDate($request['until_date'], $request['until_date']);
        }
        if (isset($email)) {
            $query->where('email', 'like', '%' . self::escapeLike($email) . '%');
        }
        if (isset($gender)) {
            $query->where('gender', $gender);
        }

        //$queryをcategory_idの昇順に並び替えて$productsに代入
        $contacts = $query->orderBy('id', 'asc')->paginate(15);

        return view('manage', [
        'contacts' => $contacts,
        'id' => $id,
        'fullname' => $fullname,
        'from_date' => $from_date,
        'until_date' => $until_date,
        'email' => $email,
        'gender' => $gender
        ]);
    }

        //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    public function delete($id)
    {
        $contact = Contact::destroy($id);
        return redirect()->route('manage');
    }
}
