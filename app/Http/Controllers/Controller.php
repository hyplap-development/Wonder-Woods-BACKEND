<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Log;
use App\Models\Product;
use App\Models\Subcategory;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Illuminate\Support\Str;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function storeLog($action, $function, $data)
    {
        $log = new Log();
        $log->userId = Auth::user()->id;
        $log->action = $action;
        $log->function = $function;
        $log->data = $data;
        $log->ip = request()->ip();
        $log->save();
    }

    public function ExportExcel($data)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($data);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="ExportedData.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function importExcel($fileLocation, $sheetIndexx)
    {

        $this->validate(
            $fileLocation,
            [
                'excel' => 'required|mimes:xls,xlsx'
            ]
        );

        $file = $fileLocation->file('excel');
        $filename = $file->getClientOriginalName() . time();
        $uploadpath = 'storage/ExcelFiles/';
        $filepath = 'storage/ExcelFiles/' . $filename;
        $file->move($uploadpath, $filename);

        chmod('storage/ExcelFiles/' . $filename, 0777);
        $xls_file = $filepath;
        $reader = new Xlsx();
        $spreadsheet = $reader->load($xls_file);
        $loadedSheetsName = $spreadsheet->getSheetNames();
        $writer = new Csv($spreadsheet);
        $sheetName = $loadedSheetsName[$sheetIndexx];
        foreach ($loadedSheetsName as $sheetIndex => $loadedSheetName) {
            $writer->setSheetIndex($sheetIndex);
            $writer->save($loadedSheetName . '.csv');
        }
        $inf1 = $sheetName . '.csv';
        $fileD = fopen($inf1, "r");

        $column = fgetcsv($fileD);
        while (!feof($fileD)) {
            $rowData[] = fgetcsv($fileD);
        }
        $skip_lov = array();
        $repeated_lov = array();
        $counter = 0;
        $failed = 0;
        $repeated = 0;
        $total = count($rowData);

        if ($sheetIndexx == 0) {
            foreach ($rowData as $key => $value) {
                if (empty($value)) {
                    $counter--;
                } else {
                    if ($value[0] == '') {
                        $failed++;
                        $skip_lov[] = $key + 2;
                        continue;
                    } else {
                        // create or update category
                        Category::updateOrCreate(
                            ['name' => $value[0]],
                            ['slug' => Str::slug($value[0], '-'), 'description' => $value[1], 'metaKeywords' => $value[2], 'metaTitle' => $value[3], 'metaDescription' => $value[4], 'status' => 1, 'deleteId' => 0] 
                        );

                    }
                }
                $counter++;
            }
        }
        elseif ($sheetIndexx == 1) {
            foreach ($rowData as $key => $value) {
                if (empty($value)) {
                    $counter--;
                } else {
                    if ($value[0] == '' || $value[1] == '') {
                        $failed++;
                        $skip_lov[] = $key + 2;
                        continue;
                    } else {
                        // create or update category

                        $categorySlug = Str::slug($value[0], '-');
                        $category = Category::where('slug', $categorySlug)->first();

                        Subcategory::updateOrCreate(
                            ['categoryId' => $category->id, 'name' => $value[1], ],
                            ['slug' => Str::slug($value[1], '-'),'description' => $value[2], 'metaKeywords' => $value[3], 'metaTitle' => $value[4], 'metaDescription' => $value[5], 'status' => 1, 'deleteId' => 0] 
                        );

                    }
                }
                $counter++;
            }
        }
        // elseif ($sheetIndexx == 2) {
        //     foreach ($rowData as $key => $value) {
        //         if (empty($value)) {
        //             $counter--;
        //         } else {
        //             if ($value[0] == '' || $value[1] == '' || $value[2] == '' || $value[3] == '' || $value[4] == '' || $value[5] == '') {
        //                 $failed++;
        //                 $skip_lov[] = $key + 2;
        //                 continue;
        //             } else {
        //                 $categorySlug = Str::slug($value[0], '-');
        //                 $categoryId = Category::where('slug', $categorySlug)->first()->id;
        //                 error_log($categoryId);

        //                 $subcategorySlug = Str::slug($value[1], '-');
        //                 error_log($subcategorySlug);
        //                 $subcategoryId = Subcategory::where('slug', $subcategorySlug)->where('categoryId', $categoryId)->first()->id;

        //                 $companySlug = Str::slug($value[3], '-');
        //                 $companyId = Company::where('slug', $companySlug)->first()->id;

        //                 // create product name slug
        //                 $productSlug = Str::slug($value[2], '-');

        //                 // create or update category
        //                 Product::updateOrCreate(
        //                     ['name' => $value[2]],
        //                     [ 'categoryId' => $categoryId , 'subcategoryId' => $subcategoryId , 'companyId' => $companyId, 'slug' => $productSlug, 'mrp' => $value[4], 'discountedPrice' => $value[5], 'gst' => $value[6], 'deliveryCharge' => $value[7], 'description' => $value[8], 'length' => $value[9], 'width' => $value[10], 'height' => $value[11], 'colors' => $value[12], 'sizes' => $value[13], 'warranty' => $value[14], 'material' => $value[15], 'metaKeywords' => $value[16], 'metaTitle' => $value[17], 'metaDescription' => $value[18], 'status' => 1, 'deleteId' => 0]
        //                 );

        //             }
        //         }
        //         $counter++;
        //     }
        // }

        Session()->flash('alert-success', "File Uploaded Succesfully ");
        Session()->flash('counter', $total - 1 . " Records Processed ");
        Session()->flash('success', $counter . " Records Succesfully Added ");
        Session()->flash('failed', $failed . " Records Failed ");
        Session()->flash('repeated', $repeated . " Records Repeated ");
        Session()->flash('failedIds', $skip_lov);
        Session()->flash('repeatedIds', $repeated_lov);
        Session()->flash('alert-success', "File Uploaded Succesfully ");


        $this->deleteFile($filepath);
        
        foreach ($loadedSheetsName as $sheetIndex => $loadedSheetName) {
            $this->deleteFile($loadedSheetName . '.csv');
        }
    }

    public function deleteFile($url)
    {
        if (file_exists($url)) {
            unlink($url);
        }
    }

    public function killSwitch()
    {
        try {
            $categories = Category::where('deleteId', 0)->update(['deleteId' => 2]);
            return response()->json(['success' => 'Kill Switch Activated']);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function restoreSwitch()
    {
        try {
            $categories = Category::where('deleteId', 2)->update(['deleteId' => 0]);
            return response()->json(['success' => 'Restore Switch Activated']);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function getSubCategories(Request $request)
    {
        error_log($request->category);
        $subcategories = Subcategory::where('categoryId', $request->category)->where('deleteId', 0)->get();
        return response()->json($subcategories);
    }
}
