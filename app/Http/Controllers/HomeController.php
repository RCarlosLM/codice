<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //users with (annual salary => solo lo multiplique en la vista)
        $users = User::where('status', 1)->paginate(5);

        //tercer empleado con mayor salario
        $three_employe = User::orderBy('salary', 'desc')->get();
        //empleados con clave par
        $key_par = [];
        foreach(User::all() as $user){
            if($user->id%2==0){
                array_push($key_par, $user); 
            }
        }

        // promedio de salario
        $salarys = User::all();
        $suma = 0;
        foreach ($salarys as $salary) {
            $suma += $salary->salary;
        }
        $count_salary = count($salarys);
        $average = $suma / $count_salary;

        // problem 1
        $input_problem1 = [0,'a',2,'b',3,'c',1,4,3,5,6,8,'d',7];
        $output_problem1 = $this->problem1($input_problem1);

        // problem 1
        $input_problem2 = '<?xml version="1.0"?>
            <document>
                <doc id="AB9917D">
                    <author>Ralls, John</author>
                    <length>5000</length>
                    <date>2016-08-22</date>
                    <description><![CDATA[Medical research]]></description>
                </doc>
                <doc id="PU7513K">
                    <author>Peaterson, Michael</author>
                    <length>8719</length>
                    <date>2017-02-17</date>
                    <description><![CDATA[Test document]]></description>
                </doc>
            </document>';
        $output_problem2 = $this->problem2($input_problem2);
        $output_problem2->total = count($output_problem2);

        // problem 1
        $input_problem3 = '2017-02-28';
        $output_problem3 = $this->problem3($input_problem3);

        return view('home')
            ->with('users', $users)
            ->with('three_employe', $three_employe)
            ->with('key_par', $key_par)
            ->with('count_par', count($key_par))
            ->with('average', $average)
            ->with('output_problem1', $output_problem1)
            ->with('output_problem2', $output_problem2)
            ->with('output_problem3', $output_problem3);
    }

    public function problem1($inputt)
    {
        
        $number_problem1 = [];
        $lyrics_problem1 = [];
        $output_problem1 = [];
        foreach($inputt as $input){
            if(is_numeric($input))
                array_push($number_problem1, $input);
            else
                array_push($lyrics_problem1, $input);
        }
        sort($number_problem1);
        $output_problem1[] = $lyrics_problem1;
        $output_problem1[] = $number_problem1;

        return $output_problem1;
    }

    public function problem2($inputt)
    {
        return simplexml_load_string($inputt);
    }

    public function problem3($inputt)
    {
        $date = Carbon::parse(Carbon::parse($inputt)->addMonth()->format('Y-m-t'));
        return $date;
    }

}
