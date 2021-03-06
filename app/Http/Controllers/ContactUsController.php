<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\APIHelpers;
use App\Http\Requests\SendContactMessage;
use App\ContactUs;


class ContactUsController extends Controller
{
    public function SendMessage(Request $request){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
                'describtion' => 'required'
            ]);

            if ($validator->fails()) {
                $response = APIHelpers::createApiResponse(true , 406 ,  'بعض الحقول مفقودة', 'بعض الحقول مفقودة' , null, $request->lang );
                return response()->json($response , 406);
            }

        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->describtion = $request->describtion;
        $contact->save();
        $response = APIHelpers::createApiResponse(false , 200 ,  '', '' , $contact, $request->lang );
        return response()->json($response , 200);
    }
}
