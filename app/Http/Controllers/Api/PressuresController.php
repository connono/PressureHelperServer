<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Pressures;
use App\Http\Requests\Api\PressureRequest;

class PressuresController extends Controller
{
    public function store(PressureRequest $request){
        $pressures = Pressures::create([
            'name' => $this->user()->name,
            'sp' => $request->sp,
            'dp' => $request->dp,
        ]);

        return $this->response->array($pressures)->setStatusCode(201);
    }

    public function show($id)
    {
        $pressure = Pressures::find($id);
        return $this->response->array($pressure);
    }

    public function update($id ,PressureRequest $request)
    {
        $pressure = Pressures::find($id);
        $pressure->update($request->all());
        return $this->response->array($pressure);
    }

    public function destroy($id)
    {
        $pressure = Pressures::find($id);
        $pressure->delete();
        return $this->response->noContent();
    }

    public function index(Pressures $pressures)
    {
        $query = $pressures->query();
        if ($name = $this->user()->name){
            $query->where('name',$name)
                  ->whereDate('created_at','<=',strtotime('-0 year -0 month -21 day'))
                  ->orderBy('created_at','ASC');
        }
        $pressuress = $query->paginate(300);
        return $this->response->array($pressuress);
    }

}
