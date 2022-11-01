<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Eventdetail;
use App\Record;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;


class MyappController extends Controller
{
    public function home()
    {
        return view('admin.myapp.calendar');
}
    public function add_event_name()
    {
        return view('admin.myapp.event');
}


    public function add()
    {
        return view('admin.myapp.eventdetail');
    }
      
    public function eventdetail(Request $request)
    {
        $this->validate($request,Eventdetail::$rules);
        $eventdetail = new Eventdetail;
        $eventdetail->user_id = Auth::id();
        $form = $request->all();
        unset($form['_token']);
        $eventdetail->fill($form);
        $eventdetail->save();
        return  redirect('admin/myapp/eventdetail');
    }
    public function get_eventdetail(Request $request)
    {
        
        $events = Auth::user()->events;
        
              
        
       return view('admin.myapp.eventdetail', ['events' => $events]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Event::$rules);
        $events = Event::find($request->id);
        $events_form = $request->all();
        unset($event_form['_token']);
        $events->fill($events_form);
        $events->save();

        return redirect('admin/event_name');
    }

    public function create_calendar (Request $request)
    {
        
        
        
        if (isset($_GET['ym'])) {  //中身があるか確認して、あったら上、無かったら、else以下を返す。
            $ym = $_GET['ym'];
            $value = explode("-",$ym); //yとｍを２つに分ける
            $year = $value[0];
            $month = $value[1];
        } else {
            $ym = date('Y-m');
            $year = date('Y');
            $month = date('m');
        }; 

        list($html_title,$prev,$next) = $this->get_day($ym);
        
        $records = Auth::user()->records()->whereYear('date',$year )->whereMonth('date', $month)->get();
       
        $day_of_records = [];
        foreach ($records as $record) {
            $day_num =date('d',strtotime($record->date));//$recordの日付の数値を取り出す*/
            $day_of_records[$day_num][] = $record->eventdetail->event->name.$record->eventdetail->weight.'キロ'.$record->eventdetail->reps.'回'.$record->eventdetail->sets.'セット';
        }
        $last_day = date("j", mktime(0, 0, 0, $month + 1, 0, $year));
        $days = [];
        $weekjp_array = array('日', '月', '火', '水', '木', '金', '土');
        for ($i = 1; $i < $last_day + 1; $i++)
        {
            $week = date("w", mktime(0, 0, 0, $month, $i, $year));

            $day = [];
            //$dat['day_num'] = $i;
            $day_of_week = $weekjp_array[$week];
            if(array_key_exists($i,$day_of_records)){
                //dd($day_of_records[$i]);
                $days[] = ['day_of_week'=> $day_of_week,'records'=> $day_of_records[$i]];
            }else{
                $days[] = ['day_of_week'=> $weekjp_array[$week],'records'=> []];//値のもたせかた　変数の後ろに[]
            }
        }
        //dd($days);
        return view('admin.myapp.main',compact('html_title','prev','next','days'));
    }
    private function get_day($ym)
    {
        date_default_timezone_set('Asia/Tokyo'); 
   
        $timestamp = strtotime($ym . '-01');
        $html_title = date('Y年n月', $timestamp);
        $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
      
        $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
     
        return [$html_title,$prev,$next];
    }
 
 
    public function get_eventdetails(Request $request)
    {
       $eventdetails = Auth::user()->eventdetails;//user_idが同じデータを取得して居れる
        return view('admin.myapp.record_menu', ['eventdetails' => $eventdetails]);
               
        
    }
    public function record_menu(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        //$records->eventdetails = $form->id;
        foreach($request->eventdetail_ids as $id ){
        $record = new Record;
        $record -> user_id = auth()->id();
        $record->eventdetail_id = $id;
        $record->date = Carbon::now();
        $record->save();
        
        }
        return redirect('admin/myapp/record_menu');
    }
    public function event_name(Request $request)
    {    
        $this->validate($request,Event::$rules);
       
        //User::with('id')->get();
        //$events = User::get(['id']);
        $events = new Event;
        $events->user_id = Auth::id();
         
        $form = $request->all();
        
        unset($form['_token']);
       
        $events->fill($form);
        $events->save();
         return redirect('admin/myapp/event');
    }
   
   
    
}
    
   
  
      

    
