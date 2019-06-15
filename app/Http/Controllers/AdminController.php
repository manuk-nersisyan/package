<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPackageRequest;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin/home');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPackages()
    {
        $packages = Package::query()
                            ->orderBy('updated_at', 'DESC')
                            ->paginate(10);
        $status = null;
        return view('admin/package/home', compact('packages','status'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUsers()
    {
        $users = User::query()->paginate(10);
        return view('admin/package/users',compact('users'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserPackages($id)
    {
        $packages = Package::query()
                            ->with('user')
                            ->where('user_id','=',$id)
                            ->paginate(10);
        return view('admin/package/user-packages',compact('packages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function selectUser()
    {
        $users = User::query()->paginate(10);
        return view('admin/package/create-users-package',compact('users'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        $user =  User::query()->findOrFail($id);
        return view('admin/package/create',compact('user'));
    }

    /**
     * @param AdminPackageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminPackageRequest $request)
    {
        Package::query()->create([
            'name'=> $request->get('name'),
            'status' => $request->get('status'),
            'user_id' => $request->get('user_id'),
        ]);
        return redirect()->route('admin-home');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $package = Package::query()->findOrFail($id);
        return view('admin/package/package', compact('package'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $package = Package::query()->findOrFail($id);
        $users = User::query()->get(['id','name']);
        return view('admin/package/edit',compact('package', 'users'));
    }

    /**
     * @param AdminPackageRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminPackageRequest $request, $id)
    {
        $package = Package::query()->findOrFail($id);
        $package->update([
            'name'=>$request->get('name'),
            'status'=>$request->get('status'),
            'user_id'=>$request->get('user_id')
        ]);
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $package = Package::query()->findOrFail($id);
        $package->delete();
        return redirect()->route('admin-packages');
    }

    /**
     * @param AdminPackageRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function filter(AdminPackageRequest $request)
    {
        if ($request->get('status') == Package::STATUS_PENDING ||
            $request->get('status') == Package::STATUS_CONFIRMED||
            $request->get('status') == Package::STATUS_DELIVERED)
        {
            $packages  = Package::query()
                                ->where('status','=', $request->get('status'))
                                ->paginate(10);
            $status = $request->get('status');

            return view('admin/package/home ', compact('packages','status'));
        }elseif ($request->get('status') == 'all')
        {
            return redirect()->route('admin-packages');
        }
        return redirect()->route('admin-home');
    }

}
