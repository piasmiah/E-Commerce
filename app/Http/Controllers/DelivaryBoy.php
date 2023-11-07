<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Delivaries;

class DelivaryBoy extends Controller
{

    public function delivary(Request $request){
        $password = $request->input('password');
        $confirm = $request->input('confirm-password');
        $photo = $request->file('pic');
        $now = Carbon::now();

        if ($password !== $confirm) {
            $messages[] = 'Password did not match';

            return redirect()->back()->with('messages', $messages);
        }
        else {
            if($photo) {
                $originalname = $photo->getClientOriginalName();
                $path = $photo->storeAs('public/delivar', $originalname);
                $path = str_replace('public/', '', $path);

                $isDelivary = Delivaries::insert([
                    'name' => $request->input('names'),
                    'address' => $request->input('address'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'nid' => $request->input('nid'),
                    'password' => $password,
                    'photo'=>$path,
                    'created_at'=> $now
                ]);
                if ($isDelivary){
                    return redirect('delivaryregistration');
                }
                else
                {
                    echo 'error';
                }
            }
        }
    }

    public function showDelivary($id)
    {
        $user = Delivaries::find($id);
        $now = Carbon::now();
        $currentMonth = Carbon::now()->format('Y-m');
        $currentMonths = Carbon::now()->format('F');
        $order = PendingOrder::where('order_status','Shipping')
            ->whereRaw('DATE_FORMAT(Date, "%Y-%m") = ?', [$currentMonth])
            ->paginate(8);

        $order2 = PendingOrder::where('order_status','On the Way')
            ->whereRaw('DATE_FORMAT(Date, "%Y-%m") = ?', [$currentMonth])
            ->paginate(8);

        $mydeliveries = PendingOrder::where('delivary_boy_id',$id)
            ->where('order_status','Delivered')
            ->whereMonth('Date',$now->month)
            ->whereYear('Date',$now->year)
            ->paginate(8);
        $mydeliveries2 = PendingOrder::where('delivary_boy_id',$id)
            ->where('order_status','Delivered')
            ->whereMonth('Date',$now->month)
            ->whereYear('Date',$now->year)
            ->count();

        return view('delivaryboy',['order'=>$order,'order2'=>$order2,'id'=>$user,'currentMonths'=>$currentMonths,'mydeliveries'=>$mydeliveries,'mydeliveries2'=>$mydeliveries2]);
    }

    public function updateDelivary($id, Request $request)
    {
        $deli = Delivaries::find($id);

        $user = PendingOrder::where('order_id',$request->input('id'))
            ->update([
                'delivary_boy_id' => $deli->id,
                'order_status' => $request->input('status')
            ]);
        return redirect()->route('delivaryboy',['id'=>$deli]);
    }

    public function updateInfo(Request $request, $id)
    {
        $ids = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $password = $request->input('password');
        $confirm = $request->input('confirm-password');
        $dob = $request->input('dob');
        $country = $request->input('country');
        $phone = $request->input('phone');
        $secondary = $request->input('secphone');
        $twitter = $request->input('twitter');
        $facebook = $request->input('facebook');
        $instagram = $request->input('instagram');
        $link = $request->input('linkedin');
        $now = Carbon::now();


            $isInsert = Delivaries::where('id',$ids)
                ->update([
                    'name'=>$name,
                    'email'=>$email,
                    'updated_at'=> $now,
                    'address'=>$address
                ]);
            if ($password === $confirm)
            {
                $isPassword = Delivaries::where('id',$ids)
                    ->update([
                        'password'=>$confirm
                    ]);
            }
            else
                return redirect()->back()->with('error','Password did not match');

            if($isInsert || $isPassword){
                return redirect()->route('delivaryboy',['id'=>$ids]);
            }


    }
}
