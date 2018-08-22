<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Item;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('items',['items'=>$items]);
    }
     public function import(Request $request)
    {
      if($request->file('imported-file'))
      {
                $path = $request->file('imported-file')->getRealPath();
                $data = Excel::load($path, function($reader)
          {
                })->get();

          if(!empty($data) && $data->count())
          {
            foreach ($data->toArray() as $row)
            {
              if(!empty($row))
              {
                $dataArray[] =
                [
                  'item_name' => $row['name'],
                  'item_code' => $row['code'],
                  'item_price' => $row['price'],
                  'item_qty' => $row['quantity'],
                  'item_tax' => $row['tax'],
                  'item_status' => $row['status'],
                  'created_at' => $row['created_at']
                ];
              }
          }
          if(!empty($dataArray))
          {
             Item::insert($dataArray);
             return back();
           }
         }
       }
    }
    public function export(){
      $items = Item::all();
      Excel::create('items', function($excel) use($items) {
          $excel->sheet('ExportFile', function($sheet) use($items) {
              $sheet->fromArray($items);
          });
      })->export('xls');

    }
}
