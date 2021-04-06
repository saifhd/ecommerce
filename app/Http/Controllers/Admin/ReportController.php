<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;

class ReportController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function todayOrder(){
        $today=date('d-m-y');
        $order=Order::where('status',0)->where('date',$today)->get();
        // dd($order);
        return view('admin.report.today_order',compact('order'));
    }
    
    public function todayDelevery(){
        $today=date('d-m-y');
        $order=Order::where('status',3)->where('date',$today)->get();
        // dd($order);
        return view('admin.report.today_delevery',compact('order'));
    }
    public function thismonth(){
        $month=date('F');
        $order=Order::where('status',3)->where('month',$month)->get();
        // dd($order);
        return view('admin.report.this_month',compact('order'));
    }

    public function searchreport(){
        return view('admin.report.search');
    }
    public function searchbydate(Request $request){
        $date=$request->date;
        $newdate=date('d-m-y',strtotime($date));
        // dd($newdate);
        $order=Order::where('status',3)->where('date',$newdate)->get();
        $total=Order::where('status',3)->where('date',$newdate)->sum('total');

        return view('admin.report.search_date',compact('order','date','total'));
    }
    public function searchbymonth(Request $request){
        $month=$request->month;
        $order=Order::where('status',3)->where('month',$month)->get();
        $total=Order::where('status',3)->where('month',$month)->sum('total');
        return view('admin.report.search_month',compact('order','month','total'));
    }
    public function searchbyyear(Request $request){
        $year=$request->year;
        // dd($year);
        $order=Order::where('status',3)->where('year',$year)->get();
        $total=Order::where('status',3)->where('year',$year)->sum('total');
        // dd($total);
        return view('admin.report.search_year',compact('order','year','total'));
    }
}
