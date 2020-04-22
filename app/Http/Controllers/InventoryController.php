<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customers;
use App\Odertemp;
use App\Orders;
use App\Product;
use App\StockLimit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{


    public function Dashboard()
    {
        $limit = StockLimit::first();
        $value = $limit->limit;
        $stockstatus = DB::table('products')->where('number', '<=', $value)->count();
        $product = Product::count();
        $category = Category::count();
        $orders = Orders::whereDate('created_at', Carbon::today())->get()->all();
        $items = DB::table('products')->get()->all();
        return view('Inventory.dashboard', compact('product', 'category', 'orders', 'items', 'stockstatus'));
    }

    public function CustomersIndex()
    {
        $customers = Customers::all();
        return view('Inventory.customers.index', compact('customers'));
    }

    public function AddCustomers()
    {
        return view('Inventory.customers.add_customers');
    }

    public function SaveCustomerDetails(Request $request)
    {

        $data = $this->ValidateCustomerDetails();
        $customer = Customers::create($data);
        $this->storeImage($customer);
        return back();
    }


    public function updateCustomersDetails(Request $request)
    {

        $data = $this->ValidateCustomerDetails();
        $customer = Customers::whereId($request->id)->update($data);
        $currentCustomer = Customers::find($request->id);
        $this->storeImage($currentCustomer);
        return back();
    }

    public function DeleteCustomer(Request $request)
    {

        DB::table('customers')->where('id', $request->id)->delete();
        return back();
    }

    public function AddCategory()
    {
        return view('Inventory.Items.add_category');
    }

    public function SaveCategoryDetails(Request $request)
    {
        $data = $request->all();
        Category::create($data);
        return back();
    }

    public function CategoryIndex()
    {
        $categories = Category::all();
        return view('Inventory.Items.index');
    }


    public function UpdateCategoryDetails(Request $request)
    {
        $data = ['category_name' => $request->category_name, 'category_description' => $request->category_description];
        DB::table('categories')->where('id', $request->id)->update($data);
        return back();
    }

    public function DeleteCategory(Request $request)
    {
        DB::table('categories')->where('id', $request->id)->delete();
        return back();
    }

    public function AddProduct()
    {
        $categories = Category::all();
        return view('Inventory.Items.Products.add_product', compact('categories'));
    }

    public function SaveProduct(Request $request)
    {
        $data = $this->ValidateProductDetails();
        $code = $request->prefix . '' . $request->code;
        Product::create($data + ['sku' => $code]);
        return back();
    }

    public function ProductIndex()
    {
        $limit = StockLimit::first();
        $value = $limit->limit;
        $products = Product::all();
        return view('Inventory.Items.Products.index', compact('products', 'value'));
    }

    public function UpdateProduct(Request $request)
    {
        $data = $this->ValidateProductDetails() + ['sku' => $request->sku];
        DB::table('products')->where('id', $request->id)->update($data);
        return back();

    }

    public function DeleteProduct(Request $request)
    {
        DB::table('products')->where('id', $request->id)->delete();
        return back();
    }

    public function allPurchaseOrders()
    {
        $orders = Orders::all()->sortByDesc('id');
        $items = DB::table('products')->get()->all();
        $product = Session::get('item');
        return view('Inventory.orders.list', compact('orders', 'items', 'product'));
    }

    public function AddPurchaseOrder()
    {

        $vendors = Customers::all();
        $items = Product::all();
        $price = Session::get('price');
        $product = Session::get('item');
        $orders = Odertemp::all();
        return view('Inventory.orders.add_purchase_order', compact('vendors', 'items', 'price', 'product', 'orders'));
    }

    public function GetProductPrice(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        Session::put('price', $product->price);
        Session::put('item', $product);
        return redirect('purchase-orders');
    }

    public function savePurchaseOrderDetails(Request $request)
    {
        $item = Session::get('item');
        $data = $request->all() + ['items_id' => $item->id];
        Orders::create($data);
        return back();

    }

    public function savePurchaseOrderDetailsTemp(Request $request)
    {

        $item = Session::get('item');
        $data = $request->all() + ['items_id' => $item->id, 'code' => 100];
        Odertemp::create($data);
        return redirect('purchase-orders');

    }

//    public function getProductIdToUpdate(Request $request)
//    {
//        $product = Product::where('id', $request->product_id)->first();
//        Session::put('price', $product->price);
//        Session::put('item', $product);
//        return back();
//    }

    public function updateOrderDetails(Request $request)
    {
        dd($request->all());
        $data = $request->except(['_method', '_token']);
    }

    public function getRunningOutProducts()
    {
        $limit = StockLimit::first();
        $value = $limit->limit;
        $orders = DB::table('products')->where('number', '<=', $value)->get()->all();
        $items = DB::table('products')->get()->all();
        return view('Inventory.low', compact('orders', 'items'));
    }

    public function updateStockLimit(Request $request)
    {
        $limit = $request->limit;
        DB::table('stock_limits')->where('id', 1)->update(['limit' => $limit]);
        return back();
    }

    public function migratetemOders()
    {
        $value = Odertemp::all();
        for ($x = 1; $x <= $value->count(); $x++) {
            $data = Odertemp::first();
            Orders::created($data);
            Odertemp::whereId($data->id)->delete();
        }
        return back()->with('msg','Oder was Successful');
    }

    public function ValidateCustomerDetails()
    {
        return tap(
            request()->validate(
                [
                    "customer_type" => "required",
                    "primary_contact" => "required",
                    "company_name" => "",
                    "display_name" => "",
                    "customer_email" => "",
                    "customer_phone" => "required",
                    "website" => ""
                ]
            ),
            function () {
                if (request()->hasFile('avatar')) {
                    request()->validate(
                        [
                            'avatar' => 'file|image|max:10000'
                        ]
                    );
                }
            }
        );
    }

    public function storeImage($avatar)
    {

        if (request()->has('avatar')) {
            $avatar->update(
                [
                    'avatar' => request()->avatar->store('avatars', 'public')
                ]

            );
        }
    }

    public function ValidateProductDetails()
    {
        return request()->validate([
            'category' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'number' => 'required|numeric',
            'amount' => 'required|numeric',
            'currency' => 'required',
            'description' => ''
        ]);
    }
}
