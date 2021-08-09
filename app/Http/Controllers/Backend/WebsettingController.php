<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\WebsettingRequest;
use DateTime;
class WebsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:list-settings',['only'=>['index']]);
        $this->middleware('can:add-settings',['only'=>['create','strore']]);
        $this->middleware('can:edit-settings',['only'=>['edit','update']]);
        $this->middleware('can:delete-settings',['only'=>['destroy']]);
    }
    public function index()
    {
        $data = DB::table('settings')->paginate(5);
        return view('backend.Setting.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Setting.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsettingRequest $request)
    {
        $data = request()->except('_token');
        $data['date_add'] = new DateTime();
        Setting::create($data);
        return redirect()->route('websetting.index')->with('msg', 'Thêm thông tin thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Setting::find($id);
        return view('backend.Setting.edit', ['data' => $data]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebsettingRequest $request, $id)
    {

        $webSetting = Setting::find($id);
        $data = request()->except('_token');
        $webSetting->update($data);
        return redirect()->route('websetting.index')->with('msg', 'Cập nhập thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setting::destroy($id);
        return response()->json(['message' => "Xóa thông tin công ty thành công"]);
    }
}
