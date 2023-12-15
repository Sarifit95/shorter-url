<?php

namespace App\Services;



use App\Models\Url;
use Exception;



class DashboardService
{



    public  function  index(){
        try {

            $data['urls']=Url::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);
            return view('dashboard', $data);

        } catch (Exception  $e) {
            $notification = array(
                'message' => $e->getLine() . "--" . $e->getMessage(),
                'status' => false,
            );
            return redirect()->back()->with($notification);
        }
    }
    public  function  editUrl($id){
        try {

            $data['url']=Url::where('user_id', auth()->user()->id)->find($id);
            $data['urls']=Url::where('user_id', auth()->user()->id)
                ->whereNotIn('id', [$id])
                ->orderBy('id', 'desc')->paginate(15);

            if (!$data['url']){
                $notification = array(
                    'message' => 'Url not found!',
                    'status' => false,
                );
                return redirect()->back()->with($notification);
            }


            return view('dashboard', $data);

        } catch (Exception  $e) {
            $notification = array(
                'message' => $e->getLine() . "--" . $e->getMessage(),
                'status' => false,
            );
            return redirect()->back()->with($notification);
        }
    }
  public  function  createUrl($r){
        try {

            $userId=auth()->user()->id;

            $url=Url::where('original_url',$r->url)->where('user_id',$userId )->first();
            $message='Already exist!';

          if (!$url){
              $url= new Url();
              $url->original_url=$r->url;
              $url->user_id=$userId;
              $url->shortener_url=$r->url;
              $url->save();
              $url->shortener_url=url('/tinyurl/'.$url->id);
              $url->save();
              $message='URL create successfully';
          }



            $notification = array(
                'original_url' => $url->original_url,
                'shortener_url' => $url->shortener_url,
                'status' => true,
                'message' => $message,
            );
            return redirect()->back()->with($notification);

        } catch (Exception  $e) {
            $notification = array(
                'message' => $e->getLine() . "--" . $e->getMessage(),
                'status' => false,
            );
            return redirect()->back()->with($notification);


        }
    }
  public  function  updateUrl($r,$id){
        try {

            $userId=auth()->user()->id;
            $url=Url::where('original_url',$r->url)->where('user_id',$userId )->find($id);
            $url->original_url=$r->url;
            $url->save();



            $notification = array(
                'message' => 'URL update successfully',
                'original_url' => $url->original_url,
                'shortener_url' => $url->shortener_url,
                'status' => true,
            );
            return redirect()->route('dashboard')->with($notification);

        } catch (Exception  $e) {
            $notification = array(
                'message' => $e->getLine() . "--" . $e->getMessage(),
                'status' => false,
            );


            return redirect()->back()->with($notification);


        }
    }
  public  function  deleteUrl($id){
        try {

            $userId=auth()->user()->id;
            $url=Url::where('user_id',$userId )->find($id);
            $url->delete();



            $notification = array(
                'message' => 'URL delete successfully',
                'status' => true,
            );
            return redirect()->back()->with($notification);

        } catch (Exception  $e) {
            $notification = array(
                'message' => $e->getLine() . "--" . $e->getMessage(),
                'status' => false,
            );
            return redirect()->back()->with($notification);


        }
    }






}
