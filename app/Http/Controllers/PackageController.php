<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Package;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $packages = Package::query()
                            ->where('user_id','=',Auth::id())
                            ->orderBy('updated_at', 'DESC')
                            ->paginate(10);
        $status = null;
        return view('user/home', compact('packages','status'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user/package/create');
    }

    /**
     * @param PackageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PackageRequest $request)
    {
        Package::query()->create([
                'name' => $request->get('name'),
                'status' => Package::STATUS_PENDING,
                'user_id' => Auth::id(),
        ]);
        return redirect()->route('home');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function show($id)
    {
        $package = Package::query()->findOrFail($id);
        return (Auth::id() === $package->user_id)? view('user/package/package', compact('package')): abort(404);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function edit($id)
    {
        $package = Package::query()->findOrFail($id);
        return (Auth::id() === $package->user_id)? view('user/package/edit', compact('package')): abort(404);
    }

    /**
     * @param PackageRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PackageRequest $request, $id)
    {
        $package = Package::query()->findOrFail($id);
        (Auth::id() === $package->user_id)?$package->update(['name'=>$request->get('name'),]): abort(404);
        return redirect()->route('home');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $package = Package::query()->findOrFail($id);
        (Auth::id() === $package->user_id)?$package->delete():abort(404);
        return redirect()->route('home');
    }

    /**
     * @param PackageRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function filter(PackageRequest $request)
    {
        if ($request->get('status') == Package::STATUS_PENDING ||
            $request->get('status') == Package::STATUS_CONFIRMED||
            $request->get('status') == Package::STATUS_DELIVERED)
        {
            $packages = Package::query()
                                ->where('user_id','=',Auth::id())
                                ->where('status','=', $request->get('status'))
                                ->paginate(10);
            $status = $request->get('status');
            return view('user/home', compact('packages','status'));
        }elseif ($request->get('status') == 'all')
        {
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }

}
