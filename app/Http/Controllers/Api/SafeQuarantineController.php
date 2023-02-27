<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SafeControlRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use App\SafeControl;
use App\Lang;

class SafeQuarantineController extends Controller
{
    function __construct(){
        $this->langs_model = new Lang();
    }
    public function save_safe_control(Request $request){        
        \App::setLocale($request->language);
        DB::beginTransaction();
        try {
            $id_lang = $this->langs_model->get_lang_id_by_code($request->language)->id;         
            //extension image base 64
            $extensionImageSignature = explode('/', explode(':', substr($request->signature, 0, strpos($request->signature, ';')))[1])[1];
            //section one
            $safe_control = new SafeControl();
            $safe_control->name = $request->full_name;
            $safe_control->email = $request->email;
            $safe_control->phone = $request->phone;
            $safe_control->data_emergency = $request->data_emergency;
            $safe_control->accept_terms = $request->accept_terms;
            //new fields
            $safe_control->rsv_folio = $request->rsv_folio;
            $safe_control->rsv_room = $request->room_number;
            $safe_control->check_in = $request->check_in;
            $safe_control->check_out = $request->check_out;
            //section signature
            $safe_control->signature_img = Str::slug($request->full_name, '_').'-'.date('Y_m_d-H_m_s').'.'.$extensionImageSignature;
            $safe_control->id_lang = $id_lang;

            if (!$safe_control->save()) {
                DB::rollBack();
                return response(['errors' => __('api.error_saving')], 422);
            }

            $replace = substr($request->signature, 0, strpos($request->signature, ',')+1);
            $imageSignature = str_replace($replace, '', $request->signature);
            $imageSignature = str_replace(' ', '+', $imageSignature);

            Storage::put('safe_control/signature/'.$safe_control->signature_img, base64_decode($imageSignature));

            DB::commit();
            return response()->json([
                'msg' => __('api.save'),
                'img'=>$safe_control->signature_img
            ] , 200);
        } catch (Exception $th) {
            return response(['errors' => __('api.error_saving'), 'error'=>$th], 422);
        }

        
    }
}
