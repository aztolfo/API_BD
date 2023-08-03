<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Settings\ServiceController as OS;
use Illuminate\Http\Request;
use App\Models\Provider;
class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $providers = provider::all()->sortBy('id');

        foreach ($providers as $provider){
        $provider['legal_name'] = $provider->legal_name ;
        $provider['commercial_name']= $provider->commercial_name ;
        $provider['email']= $provider-> email  ;
        $provider['phone']= $provider-> phone  ;
        $provider['address']= $provider-> address  ;
        $provider['contact_name']= $provider-> contact_name  ;
        $provider['param_city']= $provider-> param_city   ;
        $provider['param_bank']= $provider-> param_bank   ;
        $provider['param_account']= $provider-> param_account    ;
        $provider['param_gender']= $provider-> param_gender   ;
        $provider['param_subcategory']= $provider -> param_subcategory   ;
        $provider['account']= $provider-> account    ;
        $provider['param_state']= $provider->param_state;
        $data[] = $provider; 

        }


        return OS::frontendResponse('200','success', $data, null); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $provider=new Provider;   
        $provider->legal_name = $request -> legal_name ;
        $provider->commercial_name= $request ->commercial_name ;
        $provider->email= $request-> email  ;
        $provider->phone= $request-> phone  ;
        $provider->address= $request-> address  ;
        $provider->contact_name= $request-> contact_name  ;
        $provider->param_city= $request-> param_city   ;
        $provider->param_bank= $request-> param_bank   ;
        $provider->param_account= $request-> param_account    ;
        $provider->param_gender= $request-> param_gender   ;
        $provider->param_subcategory= $request -> param_subcategory   ;
        $provider->account= $request-> account    ;
        $provider->param_state= $request->param_state;
        $provider-> save ();    // save
        $data=[
          'message' => 'Provider created successfully',
          'Provider' => $provider,
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        return response()->json($provider);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        $provider->namelegal = $request -> namelegal ;
        $provider->namecommercial= $request ->namecommercial ;
        $provider->email= $request-> email  ;
        $provider->phone= $request-> phone  ;
        $provider->address= $request-> address  ;
        $provider->name_contact= $request-> name_contact  ;
        $provider->param_city= $request-> param_city   ;
        $provider->param_bank= $request-> param_bank   ;
        $provider->param_account= $request-> param_account    ;
        $provider->param_gender= $request-> param_gender   ;
        $provider->param_subcategory= $request -> param_subcategory   ;
        $provider->account= $request-> account    ;
        $provider->param_state= $request->param_state;
        $provider-> save ();    // save
        $data=[
          'message' => 'Orderdetail update successfully',
          'orderdetail' => $provider,
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        $data = [
            'message' => 'orders deleted successfully',
            'order' => $provider
        ];
        return response()->json($provider);
    }
}
