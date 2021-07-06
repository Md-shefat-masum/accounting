<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ImageFile;
use App\Model\UniqueId;
use Illuminate\Http\Request;
use App\Model\Employees;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class EmployeesController extends Controller
{
    public function get(Request $request, $id)
    {
        $employee = Employees::where('id', $id)->with(['files'])->first();
        return $employee;
    }

    public function list(Request $request)
    {
        $auth_user = Auth::user();
        $employees = Employees::where('user_id', $auth_user->id)->orderBy('created_at', 'asc')->get();
        return $employees;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'job_title' => 'required',
        ], [
            'name.required' => 'name is a required field.',
            'job_title.required' => 'Job Title is a required field.',
        ]);

        $requestData = $request->except(['files']);
        $auth_user = Auth::user();
        $requestData['user_id'] = $auth_user->id;

        if (!isset($request->business_code)) {
            //business_code is not set
            $customer_uniqueId_count = UniqueId::where('user_id', $auth_user->id)->where('type', 'employee')->select('count')->first();

            if (!isset($customer_uniqueId_count)) {
                $saveUniqueID = [
                    'user_id' => $auth_user->id,
                    'type' => 'employee',
                    'count' => '1',
                ];
                UniqueId::create($saveUniqueID);
                $requestData['business_code'] = 'EM-001';
            } else {
                $increment = (int)$customer_uniqueId_count->count + 1;

                UniqueId::where('user_id', $auth_user->id)->where('type', 'employee')->update([
                    'count' => $increment,
                ]);
                $increments = sprintf('%03d', $increment);
                $requestData['business_code'] = 'EM-' . $increments;
            }
        } else {
            //business_code is set
            $requestData['business_code'] = $request->business_code;
        }

        $employees = Employees::create($requestData);


        //CfAgents File upload option
        $requestImage = $request->all();
        if (isset($requestImage['files'])) {
            $t = 1;
            foreach ($requestImage['files'] as $file) {
                $name = $t++ . "." . time() . '.' . explode('/', explode(':', substr($file['image'], 0, strpos($file['image'], ';')))[1])[1];
                Image::make($file['image'])->save(public_path('images/') . $name);

                $imageData = [
                    'user_id' => $auth_user->id,
                    'employee_id' => $employees->id,
                    'type' => 'employees',
                    'name' => $name,
                    'path' => '/images/',
                    'image' => '/images/' . $name,
                ];

                ImageFile::create($imageData);
            }
        }
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'job_title' => 'required',
        ], [
            'name.required' => 'name is a required field.',
            'job_title.required' => 'Job Title is a required field.',
        ]);

        $auth_user = Auth::user();

        if ($request->business_code != null) {
            $checkUnique = Employees::where('user_id', $auth_user->id)
                ->where('business_code', $request->business_code)
                ->where('id', '!=', $request->id)->first();

            if (isset($checkUnique)) {
                $validatedData = $request->validate([
                    'business_code' => 'required|unique:employees'
                ], ['business_code.unique' => 'Business code has already been taken',]);
                return $validatedData;
            }
        }else{
            $validatedData = $request->validate([
                'business_code' => 'required|unique:suppliers'
            ], ['business_code.required' => 'Business code is required',]);
            return $validatedData;
        }


        $requestData = $request->except(['files']);


        $requestData['user_id'] = $auth_user->id;

        $employee = Employees::findOrFail($id);

        $employee->fill($requestData)->save();


        //CfAgents File upload option
        $requestImage = $request->all();
        if (isset($requestImage['files'])){
            $t = 1;
            $imgFile = ImageFile::where('employee_id', $employee->id)->delete();
            foreach ($requestImage['files'] as $file){

                if (isset($file['employee_id'])){
                    $imageData = [
                        'user_id' => $auth_user->id,
                        'employee_id' => $employee->id,
                        'type' => 'employees',
                        'name' => $file['name'],
                        'path' => '/images/',
                        'image' => $file['image'],
                    ];
                }else{
                    $name = $t++.".".time(). '.'. explode('/', explode(':', substr($file['image'], 0, strpos($file['image'], ';')))[1])[1];
                    Image::make($file['image'])->save(public_path('images/').$name);

                    $imageData = [
                        'user_id' => $auth_user->id,
                        'employee_id' => $employee->id,
                        'type' => 'employees',
                        'name' => $name,
                        'path' => '/images/',
                        'image' => '/images/'.$name,
                    ];
                }

                ImageFile::create($imageData);
            }
        }
    }

    public function delete(Request $request, $id)
    {
        $employees = Employees::findOrFail($id);
        $employees->delete();
    }
}

?>
