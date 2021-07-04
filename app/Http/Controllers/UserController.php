<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
//         $query='hamza';

//         $data = DB::table('users')
//         ->where('name', 'like', '%'.$query.'%')
//         ->orWhere('email', 'like', '%'.$query.'%')
//         ->get();
//         // dd($data);
//  if (count($data)) {
//     dd($data);
// };
// dd('sdfsdf');    
        // $users=User::paginate(2);
        $a='a';
        $users=User::orderBy('name', 'asc')
        ->paginate(20); 
        // $users=User::get();
        return view('_admin.users',compact('users'));
    }
    public function edit(User $user)
    {
        return view('_admin.profile',compact('user'));
    }

    public function store(Request $request)
    {
      
        $data = $request->all();

        // dd($data);
        // $name= $user->userAvatar($request);
       
        // dd($a);
        // $data['image'] = $name;
        $data['name'] =  request('name');
        $data['email'] = request('email');
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message','Doctor added successfully');
    }

    public function update(User $user)
    {
        $input = request()->validate([ 
            'name' => 'required',
            'email' => 'required',
            'avatar'=>'file',
            // 'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'Confirm_Password' => ['same:password'],
    
        ]);
    }

    public function admin(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();
        return Redirect::back();
    }


    function action(Request $request)
    {
       dd($request->all());

     if($request->ajax())
     {
      $output[] = '';
      $query = $request->get('data_table');
     
    
      if(!empty($query))
      { 
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->get();
         
      }

      else
      {
       $data = DB::table('users')
         ->orderBy('name', 'desc')
         ->get();
      }
      return response()->json($data);
      if (!count($data)) {
        $output[] = '
        <tr>
         <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
    }else{
        foreach($data as $item)
        {
         $output[] = '
         <tr>
          <td>'.$item->name.'</td>
          <td>'.$item->email.'</td>
          <td>'.count($item->posts).'</td> 
         </tr>
         ';
        }
    };

      

     }
    }


    public function search(Request $request)
    {
       $users=User::where('name','like','%'.$request->name.'%')->orderBy('name', 'desc')
       ->paginate(20); 
    //    return $users;
       return view('_admin._user',compact('users'));
    }


}


