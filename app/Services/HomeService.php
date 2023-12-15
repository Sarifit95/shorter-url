<?php

namespace App\Services;



use App\Models\Url;
use Exception;



class HomeService
{



    public  function  home(){
        try {

            if (isset(auth()->user()->id)){
                $data['urls']=Url::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
                return view('welcome', $data);
            }
            else {
                return view('welcome');
            }



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

            $userId= isset(auth()->user()->id) ? auth()->user()->id : null;

            $url=Url::where('original_url',$r->url)
                ->where('user_id', $userId)->first();

          if (!$url){
              $url= new Url();
              $url->original_url=$r->url;
              $url->shortener_url=$r->url;
              $url->user_id=$userId;
              $url->save();
              $url->shortener_url=url('/tinyurl/'.$url->id);
              $url->save();
          }



            $notification = array(
                'original_url' => $url->original_url,
                'shortener_url' => $url->shortener_url,
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

    public  function  getURL($id){
        try {

//            $url=Url::find($id);
            $url = Url::where('id','=',$id)->first();

            if ($url->original_url){
                $url->increment('click_count');


                return redirect()->route('redirect',$id);





            }
            else {
                abort( response('Not found URL', 404) );
            }





        } catch (Exception  $e) {
            abort( response('Server Error', 500) );

        }
    }
    public  function  redirectURL($id){
        try {

            $url = Url::where('id','=',$id)->first();

            if ($url->original_url){

         return redirect($url->original_url);

            }
            else {
                abort( response('Not found URL', 404) );
            }





        } catch (Exception  $e) {
            abort( response('Server Error', 500) );

        }
    }




}
