<?php

namespace App\Http\Traits;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use DataTables;



trait CategoryTrait {
    public function index()
    {
        
        $items = Category::all();
        if(request()->ajax()) {
            
            $data = Category::select('*');
            
            return datatables()::of($data)
            ->addIndexColumn()
            ->filter(function ($instance) use ($request) {
                if (isset($request->cat)) {
                    $instance->where('name', $request->cat);
                }
                if (isset($request->status)) {
                    $instance->where('status', $request->status);
                }
                if (isset($request->search)) {
                    $instance->where('name', 'like', '%'.\request('search').'%')
                    ->orWhere('status', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->search . '%');

                }               

            })
            ->rawColumns(['status'])
            ->addColumn('action', function($data){
                   
                   $editUrl = url('categories/'.$data->id);
                   
                   $btn = '<a style="width:100px" href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary"><i class="fas fa-edit"></i>Edit</a>';

                   $btn = $btn.' <a style="width:100px" href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger delete"><i class="fas fa-trash"></i>Delete</a>';

                    return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        }
        return view('categories.index',compact('items'));
    }
}