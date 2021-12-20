<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = User::all();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('edad', function($row){
                        list($year,$month,$day) = explode("-",$row->date_birth);
                        $year_diff  = date("Y") - $year;
                        $month_diff = date("m") - $month;
                        $day_month   = date("d") - $day;
                        if ($day_month < 0 || $month_diff < 0)
                            $year_diff--;
                         return $year_diff;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;
                    })
                    
                    ->rawColumns(['edad','action'])
                    ->make(true);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:100',
            'email' => 'required|email|unique:users',
            'cell'=>'nullable|min:10|max:10',
            'cedula'=> 'required|max:11',
            'password'=>'required|confirmed|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'date_birth'=>'required|olderThan:18'
        ],[
            'date_birth.older_than'=>'The user cannot be under 18 years of age'
        ]);

        $user = new User;
        $user->role_id = 2;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->cell = $request->cell;
        $user->cedula = $request->cedula;
        $user->date_birth = $request->date_birth;
        $user->city = $request->city;

        $save = $user->save();

        if($save){
            return view('users.index')->with('success','Usuario creado exitosamente');
        }else {
            return back()->with('fail','Ha ocurrido un error al guardar los datos');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
