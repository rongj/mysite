<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::orderBy('weight', 'desc')->get();
		return [
			'code' => 200,
			'data' => $categories,
		];
	}

    public function add()
    {
		// $category->name = request('name');
		// $category->cover = request('cover');
		// $category->describe = request('describe');
		// $category->weight = request('weight');
    	// $category->save();
		$category = [
			'name' => request('name'),
			'cover' => request('cover') ? request('cover') : 'aaaaaaaaa',
			'describe' => request('describe'),
			'weight' => request('weight'),
		];

    	// $category = array_merge(request()->all());
		Category::create($category);
		return [
			'code' => 200,
			'msg' => '添加成功',
		];
    }

    public function update()
    {

    }

    public function delete()
    {
    	return 'aaa';
    }

    public function upload(Request $request) {
    	$file = $request->file('plate-cover')->store('upload');
    	return [
    		'code' => 200,
    		'data' => [
    			'url' => '/'.$file
    		],
    	];
    }
}