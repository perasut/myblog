<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
// use Illuminate\Support\Facades\DB; 
use DB;    ////แบบย่อ use Illuminate\Support\Facades\DB;

// เรียก model Employee เข้ามา
use App\Models\Employee;

class HomeController extends Controller
{
    public function home(){
        return view('pages.home');
        // return 'homepage';
    }

    public function about(){
        return view('pages.about');
    }

    public function service(){
        return view('pages.service');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function login(){
        return view('pages.login');
    }

    public function employees(){


        // การอ่านข้อมูลเข้าไปในตาราง --------------------------------------------

        // อ่านข้อมูลทั้งหมดจากตาราง employees
        // $employees = DB::table('employees')->get(); // select * from employees

        // อ่านข้อมูลเพียงรายการเดียวจากตาราง employees
        // $employees = DB::table('employees')->first(); // select * from employees limit 1

        // อ่านข้อมูลระบุ field ที่ต้องการ
        // $employees = DB::table('employees')->first(['fullname','gender','email']); // select fullname, gender, email from employees

        // อ่านข้อมูลแบบระบุเงื่อนไข
        // $employees = DB::table('employees')->where('id', 2)->get();
        // $employees = DB::table('employees')->where('id', '>=', 2)->get(['id','fullname','email']);

        // $employees = DB::table('employees')
        //             ->where('id', 2)
        //             ->where('status',1)
        //             ->orWhere('age',30)
        //             ->first();

        // ค้นหาโดยระบุ id โดยตรง
        // $employees = DB::table('employees')->find(3); // select * from employees where id='3'

        // การนับจำนวน record ที่พบ
        // $employees = DB::table('employees')->count();

        // การหาค่าสูงสุด ต่ำสุด และค่าเฉลี่ย
        // $employees = DB::table('employees')->max('age');
        // $employees = DB::table('employees')->min('age');
        // $employees = DB::table('employees')->avg('age');

        // การจัดเรียนข้อมูล และการเลือกข้อมูลบางส่วน
        // $employees = DB::table('employees')->orderBy('age')->get(); // order asc
        // $employees = DB::table('employees')->orderByDesc('age')->get(); // order desc
        // $employees = DB::table('employees')->orderByDesc('age')->limit(2)->get();

        // การเพิ่มข้อมูลเข้าไปในตาราง --------------------------------------------
        // $data = array(
        //     'fullname' => 'Samit Koyom',
        //     'gender' => 'Male',
        //     'email' => 'samit@email.com',
        //     'tel' => '0898938889389',
        //     'age' => 38,
        //     'address' => '20/2 moo.2 bangkok',
        //     'avartar' => 'noavatar.jpg',
        //     'status' => 1
        // );

        // $employees = DB::table('employees')->insert($data);

        // // การแก้ไขข้อมูลเข้าไปในตาราง --------------------------------------------
        // $data = array(
        //     'email' => 'samitkk@gmail.com',
        //     'tel' => '02222333444',
        //     'age' => 42
        // );

        // $employees = DB::table('employees')->where('id', 4)->update($data);


        // การลบข้อมูลเข้าไปในตาราง --------------------------------------------
        // $employees = DB::table('employees')->where('id', 7)->delete();

        // return $employees;
    }
    public function employeelist(){
                // การอ่านข้อมูลเข้าไปในตาราง --------------------------------------------

        // อ่านข้อมูลทั้งหมดจากตาราง employees
        //  $employees = Employee::all(); // select * from employees
        //  $employees = Employee::all(['id','fullname']); // อ่านข้อมูลระบุ field ที่ต้องการ
        //  $employees = Employee::first(['id','fullname']); // อ่านข้อมูลเพียงรายการเดียวจากตาราง employees
        // $employees = Employee::where('id',3)->first(); // อ่านข้อมูลแบบระบุเงื่อนไข
        // $employees = Employee::where('age','>=',27)->get(); // การจัดเรียนข้อมูล และการเลือกข้อมูลบางส่วน

        // $employees = Employee::where('age','>=',27)   // อ่านข้อมูลแบบระบุเงื่อนไข
        //             ->orderByDesc('age')
        //             ->get();  

        // การเพิ่มข้อมูลเข้าไปในตาราง --------------------------------------------
        //         $data = array(
        //     'fullname' => 'Sudo Koysad',
        //     'gender' => 'Male',
        //     'email' => 'sudodesgftyhj@email.com',
        //     'tel' => '0898938889456',
        //     'age' => 19,
        //     'address' => '20/256 moo.2 bangkok',
        //     'avartar' => 'noavatar.jpg',
        //     'status' => 1
        // );

        // $employees = Employee::create($data);
        
        // การแก้ไขข้อมูลเข้าไปในตาราง --------------------------------------------
                // $data = array(
                //     'email' => 'sudoxxxx@email.com',
                //     'tel' => '089777777',
                //     'age' => 55,
                // );
        
                // $employees = Employee::where('id',5)->update($data);

         // การลบข้อมูล--------------------------------------------      
                // $employees = Employee::where('id',5)->delete();
        // return $employees;
     // -------------------------------------------------------------------------
        //การส่งข้อมูลไปยังview
        //  $employees = Employee::all();  // select * from employees
         $employees = Employee::paginate(2);
          return view('pages.employeelist', compact('employees'));
    }
}
