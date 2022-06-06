<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Currency;
use App\Http\Resources\AccountResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{   
    public function show($account)
    {   
        $account=Account::find($account);

        return new AccountResource($account);
    }

    public function showUserAccount($user_id)
    {
        
        $account=Account::where('user_id','=',$user_id)->get();

        return AccountResource::collection($account);
    }

    public function store(Request $myRequestObject)
    {
        $rules=array(
            'currency_name' => 'exists:currencies,name',
            'user_id' => 'exists:users,id',
            'balance' => 'required'
        );
        $validator = Validator::make($myRequestObject->all(), $rules);
        if ($validator->fails()) {
            $code=$this->returnCodeAccordingToInput($validator);
               return  $this->returnValidationError($code,$validator);
        } 
        else
        {
            $account = $myRequestObject->all();
            $currency_id = Currency::select('id')->where('name','=',$account['currency_name'])->get()->first();
            Account::create([
                'account_number' => Str::uuid(),
                'currency_id' => $currency_id['id'],
                'user_id' => $account['user_id'],
                'balance' => $account['balance']
            ]);
            
            return response()->json([
                'status' => true,
                'message' => "Account Created successfully!",
                'account' => $account
            ], 200);
        }
    }

    public function update(Request $request,$id)
    {
        $rules=array(
            'currency_name' => 'exists:currencies,name',
            'user_id' => 'exists:users,id',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
               return  $validator->messages();
        } 
        else
        {
            $account = Account::find($id);
            if($account==null)
            {
                return ['User Not Found'];
            }
            $currency_id = Currency::select('id')->where('name','=',$request['currency_name'])->get()->first();
            $account->update([
                'currency_id' => $currency_id['id'],
                'user_id' => $request['user_id'],
                'balance' => $request['balance']
            ]);
            
            return response()->json([
                'status' => true,
                'message' => "Account Updated successfully!"
            ], 200);
        }
    }
}
