<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ProductController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => ['required'],
            'name' => ['required'],
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $book = Product::create($request->except('image'));
        $book['user_id'] = Auth::user()->id;

        if(!empty($request->image)) {
            $file = $request->file('image');
            // $image_name =  uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $image_name = time() . '-' . $file->getClientOriginalName();
            // store the file
            $request->image->storeAs('public/uploads', $image_name);

            $book->image = $image_name;
        }

        $book->save();

        return response()->json([
            'err_message' => 'Successfully insert product',
            'data' => $book,
        ], 200);
    }

    /**
     * Display the specified resource.
     *product $product
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function backendShowList()
    {
        $user_id = Auth::user()->id;

        $task_list = Product::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(5);

        return response()->json($task_list, 200);
    }

    /**
     * Display the specified resource.
     *product $product
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function frontendShow()
    {

        if (request()->has('key') && strlen(request()->has('key')) > 0) {
            $key = request()->key;

            if (Product::where('status', 1)->where('id', $key)->exists()) {
                $product_data = Product::where('status', 1)
                    ->orderBy('id', 'DESC')
                    ->where('id', $key)->paginate(8);
            } else if (Product::where('status', 1)->where('name', $key)->exists()) {
                $product_data = Product::where('status', 1)
                    ->orderBy('id', 'DESC')
                    ->where('name', $key)->paginate(8);
            } else if (Product::where('status', 1)->where('description', $key)->exists()) {
                $product_data = Product::where('status', 1)
                    ->orderBy('id', 'DESC')
                    ->where('description', $key)->paginate(8);
            } else if (Product::where('status', 1)->where('name', 'LIKE', '%' . $key . '%')->exists()) {
                $product_data = Product::where('status', 1)
                    ->where('name', 'LIKE', '%' . $key . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(8);
            } else if (Product::where('status', 1)->where('description', 'LIKE', '%' . $key . '%')->exists()) {
                $product_data = Product::where('status', 1)
                    ->where('description', 'LIKE', '%' . $key . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(8);
            }
            else {
                $product_data = Product::where('status', 1)
                    ->where('section', 'LIKE', '%' . $key . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(8);
            }
        }else{
            $product_data = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(8);
        }

        // $stock = 1;
        // $product_data = Product::where('status', $stock)->orderBy('id', 'DESC')->paginate(4); // Show only last data

        return response()->json([
            'err_message' => 'Show product data',
            'data' => $product_data,
        ], 200);
    }

    /**
     * Display the specified resource.
     *product $product
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function frontendShowCatP($id)
    {
        $product_data = Product::where('category_id', $id)->orderBy('id', 'DESC')->paginate(3); // Show only last data

        return response()->json([
            'err_message' => 'Show product data',
            'data' => $product_data,
        ], 200);
    }
    /**
     * Display the specified resource.
     *Opening Hours
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function buyOneGetOne()
    {
        $use = 1;
        $product_data = Product::where('use', $use)->orderBy('id', 'ASC')->get(); // Show only last data
        // $product_data = Product::where('use', $use)->orderBy('id', 'ASC')->paginate(4); // Show only last data

        return response()->json([
            'err_message' => 'Show product data',
            'data' => $product_data,
        ], 200);
    }


    /**
     * Display a Task data in field listing as paginate from the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $book = Product::find($id);

        return response()->json($book, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateproductRequest $request, product $product)

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'name' => ['required'],
            'description' => ['required'],
            // 'use' => ['required'],
            // 'des' => ['required'],
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }
        $updateTask = Product::find($id);

        $updateTask->name = $request->name;
        $updateTask->category_id = $request->category_id;
        $updateTask->description = $request->description;
        $updateTask->tag = $request->tag;
        $updateTask->price = $request->price;
        $updateTask->sell_price = $request->sell_price;
        $updateTask->image = $request->image;
        $updateTask->stock = $request->stock;
        $updateTask->status = $request->status;


        // $book = product::create($request->except('image'));

        $updateTask['user_id'] = Auth::user()->id;
        // if ($request->hasFile('image')) {
        //     $book->image = Storage::put('upload/books', $request->file('image'));
        //     $book->save();
        // }

        $updateTask->update();

        return response()->json($updateTask, 200);
    }

    public function use(Request $request)
    {
        Product::where('id',$request->id)->update([
            'use' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        return response()->json('Success', 200);
    }

    public function un_use(Request $request)
    {
        Product::where('id',$request->id)->update([
            'stock' => 0,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        return response()->json('Set Product again Success', 200);
    }



     /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book = Product::find($request->id);

            // if(file_exists(public_path($book->image))) {
            //     unlink(public_path($book->image));
            // }

        $book->delete();
        return response()->json('Deleted Done', 200);
    }

    /**
     * DeleteMulti Action the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function delete_multi(Request $request)
    {
        foreach ($request->ids as $id) {
            $book = Product::find($id);
            // if(file_exists(public_path($book->image))) {
            //     unlink(public_path($book->image));
            // }
            $book->delete();
        }

        // Product::whereIn('id', $request->ids)->delete();
        return response()->json('Selected all data delete Done', 200);
    }


}
