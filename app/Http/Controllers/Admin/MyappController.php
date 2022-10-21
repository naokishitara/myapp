<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Eventdetail;
use App\Records;
use Carbon\Carbon;

class MyappController extends Controller
{
     public function home()
{
      return view('admin.myapp.home');
}
     public function add_event_name()
{
       return view('admin.myapp.event_name');
}  
     public function post_event_name(Request $request)
{
     $cond_events = $request->cond_events;
      if ($cond_events != '') {
      
          $posts = Event::where('eventdetails', $cond_events)->get();
      } else {
          
          $posts = Event::all();
       return view('admin/myapp/eventdetail',compact('posts'));
              }
} 
     public function event_name(Request $request)
{   
      
       $this->validate($request,Event::$rules);

       $events = new Event;
       $form = $request->all();
      
        unset($form['_token']);
       
        $events->fill($form);
        $events->save();

      
       return redirect('admin/myapp/event_name');
 }   


     public function add()
 {
       return view('admin.myapp.eventdetail');
 }
      
     public function eventdetail(Request $request)
 {
      $this->validate($request,Eventdetail::$rules);
      
      $eventdetail = new Eventdetail;
      $form = $request->all();
      
       unset($form['_token']);
       
       $eventdetail->fill($form);
       $eventdetail->save();
       return redirect('admin/myapp/eventdetail');
  }
      public function edit(Request $request)
  {
      $event = Event::find($request->id);
      if (empty($event)) {
        abort(404);    
      }
      return view('admin.myapp.edit', ['event_form' => $events]);
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
      
       $last_day = date("j", mktime(0, 0, 0, $month + 1, 0, $year));
       $weekjp = [];
       $weekjp_array = array('日', '月', '火', '水', '木', '金', '土');
       for ($i = 1; $i < $last_day + 1; $i++){
           $week = date("w", mktime(0, 0, 0, $month, $i, $year));
         
           $weekjp[] =$weekjp_array[$week];
           };
            return view('admin.myapp.home',compact('html_title','prev','next','weekjp'));
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
 
 
     public function record_menu_index(Request $request)
  {
      
      $cond_eventdetails = $request->cond_eventdetail;
      if ($cond_eventdetails != '') {
          
      $posts = Eventdetail::where('eventdetail', )->get();
      } else {
          
     $posts = Event::all();
          
   // dd($cond_menu);
     // return view('admin.myapp.index', ['posts' => $posts, 'cond_memu' => $cond_menu]);
       return view('admin.myapp.record_menu', ['posts' => $posts]);
    }
  }
     public function record_menu(Request $request)
  {
    
      $this->validate($request, RecordMenu::$rules);
   
      $records = new Record;
      $form = $request->all();
    
      unset($form['_token']);
   
    
     //foreach($request->menu_ids as $menu_id){
       // $menu = Menu::find($menu_id);
        //$record = new Record_menu;
        //$record->menu = $menu->menu;
         
       $records->weight = $form['weight']; 
       $records->sets = $form['sets'];
       $records->reps = $form['reps'];
        
      $records->fill($form);
      $records->save();
    
      return redirect('admin/myapp/record_menu');
  }
  
    
  }
    
   
  
      

    
