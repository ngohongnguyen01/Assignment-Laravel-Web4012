<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SizeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Size;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $size;
    public function __construct(Size $size)
    {
        $this->size =$size;
        $this->authorizeResource(Size::class,'size');
    }
    public function index()
    {
        $data = Size::paginate(5);
        return view('backend.Size.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Size.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeRequest $request)
    {
        $data = request()->except('_token');
        $data['slug'] = Str::slug($data['name']);
        Size::create($data);
        return redirect()->route('sizes.index')->with('msg', 'Thêm thuộc tính thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('backend.Size.edit', ['data' => $size]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SizeRequest $request, Size $size)
    {
        $data = request()->except('_token');
        $data['slug'] = Str::slug($data['name']);
        $size->update($data);
        return redirect()->route('sizes.index')->with('msg', 'Thêm thuộc tính thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return response()->json(['message' => "Xóa Banner thành công !"]);
    }
}
