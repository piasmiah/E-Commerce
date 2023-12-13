<?php

namespace App\Http\Controllers;

use App\Models\DelivaryBoyInfo;
use App\Models\PendingOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Delivaries;
use function PHPUnit\Framework\isEmpty;

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
                    'created_at'=> $now,
                    'approval'=>'Pending'
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

        $existuser = DelivaryBoyInfo::where('id',$id)->first();

        return view('delivaryboy',['order'=>$order,'existuser'=>$existuser,'order2'=>$order2,'id'=>$user,'currentMonths'=>$currentMonths,'mydeliveries'=>$mydeliveries,'mydeliveries2'=>$mydeliveries2]);
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
        $current = $request->input('current');
        $dob = $request->input('dob');
        $country = $request->input('country');
        $phone = $request->input('phone');
        $secondary = $request->input('secphone');
        $twitter = $request->input('twitter');
        $facebook = $request->input('facebook');
        $instagram = $request->input('instagram');
        $link = $request->input('linkedin');
        $now = Carbon::now();
        $code = $request->input('code');

        $existuser = DelivaryBoyInfo::where('id',$ids)->first();

        $isInsert = false;
        $isPassword = false;
        $isInfo = false;
        $isInfoInsert = false;

        if(!empty($password)){
            if ($password === $confirm) {
                $isInsert = Delivaries::where('id', $ids)
                    ->update([
                        'name' => $name,
                        'email' => $email,
                        'updated_at' => $now,
                        'address' => $address,
                        'password' => $password
                    ]);
            }
            else
                return redirect()->back()->with('error','Password did not match');
        }

            else
                $isInsert = Delivaries::where('id',$ids)
                    ->update([
                        'name'=>$name,
                        'email'=>$email,
                        'updated_at'=> $now,
                        'address'=>$address,
                        'password'=>$current
                    ]);



        if ($existuser)
            {
                $isInfo = DelivaryBoyInfo::where('id',$ids)
                    ->update([
                        'name'=>$name,
                        'address'=>$address,
                        'DOB'=>$dob,
                        'country'=>$country,
                        'code'=>$code,
                        'phone'=>$phone,
                        'second_phone'=>$secondary,
                        'facebook'=>$facebook,
                        'twitter'=>$twitter,
                        'instagram'=>$instagram,
                        'linkedIn'=>$link,
                        'updated_at'=>$now
                    ]);

            }
            else
                $isInfoInsert = DelivaryBoyInfo::insert([
                    'id'=>$ids,
                    'name'=>$name,
                    'address'=>$address,
                    'DOB'=>$dob,
                    'country'=>$country,
                    'code'=>$code,
                    'phone'=>$phone,
                    'second_phone'=>$secondary,
                    'facebook'=>$facebook,
                    'twitter'=>$twitter,
                    'instagram'=>$instagram,
                    'linkedIn'=>$link,
                    'created_at'=>$now
                ]);

            if($isInsert || $isInfo || $isInfoInsert){
                return redirect()->route('delivaryboy', ['id' => $ids]);
            }

    }
}
