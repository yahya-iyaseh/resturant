<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Food;
use Hamcrest\Description;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food = Food::latest()->paginate(15);
        return view('food.index', compact('food'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'imgae' => 'required|mimes:png,jpeg,jpg'
        ]);
        $imgae = $request->file('imgae');
        $name = time() . '.' . $imgae->getClientOriginalExtension();
        $dest = public_path('/images');
        $imgae->move($dest, $name);
        Food::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'categoryId' => $request->get('category'),
            'imgae' => $name
        ]);
        return redirect()->back()->with('message', 'Food Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        $cat = Category::find($food->categoryId);
        return view('food.edit', compact('food', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'imgae' => 'mimes:png,jpeg,jpg'
        ]);
        $fod = Food::find($id);
        $name = $fod->imgae;

        if ($request->hasFile('imgae')) {
            $imgae = $request->file('imgae');
            $name = time() . '.' . $imgae->getClientOriginalExtension();
            $dest = public_path('/images');
            $imgae->move($dest, $name);
        }
        $fod->name = $request->get('name');
        $fod->description = $request->get('description');
        $fod->categoryId = $request->get('category');
        $fod->imgae = $name;
        $fod->price = $request->get('price');
        $fod->save();
        return redirect()->route('food.index')->with('message', 'The Food is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Food::find($id);
        $item->delete();
        return redirect()->back()->with('message', 'The food is Deleted');
    }
    public function listFood()
    {
        $cat = Category::get();
        return view('index', compact('cat'));
    }
    public function view($id)
    {
        $food = Food::find($id);
        return view('food.details', compact('food'));
    }
}
