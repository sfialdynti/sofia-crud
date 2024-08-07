<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Notifications\CategoryInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CategoryController extends Controller
{
    //
    public function show(Request $request){
        $data['category'] = Category::orderby('name', 'asc')->get();

        // $search = $request->search;

        // $data['category'] = Category::where('name', 'LIKE', '%'.$search.'%' )->orWhere('is_publish', 'LIKE', '%'.$search.'$')->paginate(10);
        $data['category'] = Category::paginate(10);
        
        return view('kategori', $data);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $query = Category::query();

        if ($search) {
            $query->where('name', 'LIKE', '%'.$search.'%')->orWhere('is_publish', 'LIKE', '%'.$search.'%');
        }

        $data['category'] = $query->paginate(10)->appends(['search' => $search]);

        return view('kategori', $data);
    }

    public function create(){
        $data['category'] = Category::all();
        return view('kategori-create', $data);
    }

    public function add(Request $request){
        $request->validate([
            'name' => 'required',
            'is_publish' => ['required', 'boolean']
        ]);

        $category = Category::create([
            'name' => $request->name,
            'is_publish' => $request->is_publish,
        ]);

        $user = Auth::user();
        // $user->(new CategoryInfo($category, 'created'));
        Notification::send($user, new CategoryInfo($category, 'created'));

        return redirect('/kategori');
    }

    public function delete(Request $request){
        $user = Category::find($request->id);
        $delete = Category::where('id', $request->id)->delete();
        
        return redirect('kategori');
    }

    public function edit(Request $request){
        $data['category'] = Category::find($request->id);

        return view('kategori-edit', $data);
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'is_publish' => ['required', 'boolean'],
        ]);

        $update = Category::where('id', $request->id)->update([
            'name' => $request->name,
            'is_publish' => $request->is_publish
        ]);

        return redirect('/kategori')->with('berhasil', 'Category berhasil diupdate');
    }
}
