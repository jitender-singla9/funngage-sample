<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Profile;
use App\Education;

class ProfileController extends Controller
{
    public function saveProfile(Request $request) {
    	$inputs = json_decode($request->getContent(), true);

    	foreach ($inputs as $key => $input) {
    		if (array_key_exists('education', $input)) {
    			foreach ($input['education'] as $key => $education) {
    				$validator = Validator::make($education, [
		                'year' => 'required|string|min:4|max:4',
		                'degree' => 'required|min:3|max:255|string',
		                'university' => 'required|max:255|string',
		                'college' => 'required|max:255|string'
		            ]);

		            if ($validator->fails()) {
			            if (count($validator->errors()) <= 1) {
			                return response()->json(['status' => 'exception','response' => $validator->errors()->first()]);
			            } else {
			                return response()->json(['status' => 'exception','response' => 'All fields are required']);
			            }
			        }

    				Education::create($education);
    			}
    		} elseif (array_key_exists('address', $input)) {
    			foreach ($input['address'] as $key => $address) {
    				$validator = Validator::make($address, [
		                'address1' => 'required|string',
		                'city' => 'required|max:255|string',
		                'state' => 'required|max:255|string',
		                'pincode' => 'required|max:255|string'
		            ]);

		            if ($validator->fails()) {
			            if (count($validator->errors()) <= 1) {
			                return response()->json(['status' => 'exception','response' => $validator->errors()->first()]);
			            } else {
			                return response()->json(['status' => 'exception','response' => 'All fields are required']);
			            }
			        }

    				Profile::create($address);
    			}
    		}
    	}

    	return response()->json(['status' => 'success','response' => 'Data saved successfully']);
    }
}
