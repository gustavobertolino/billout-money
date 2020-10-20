<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Owner;
use Illuminate\Http\Request;
use Exception;

class AssetsController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $assets = Asset::with('owner')->paginate(25);

        return view('assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new asset.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $owners = Owner::pluck('id','id')->all();
        
        return view('assets.create', compact('owners'));
    }

    /**
     * Store a new asset in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Asset::create($data);

            return redirect()->route('assets.asset.index')
                ->with('success_message', 'Asset was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified asset.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $asset = Asset::with('owner')->findOrFail($id);

        return view('assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified asset.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        $owners = Owner::pluck('id','id')->all();

        return view('assets.edit', compact('asset','owners'));
    }

    /**
     * Update the specified asset in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $asset = Asset::findOrFail($id);
            $asset->update($data);

            return redirect()->route('assets.asset.index')
                ->with('success_message', 'Asset was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified asset from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $asset = Asset::findOrFail($id);
            $asset->delete();

            return redirect()->route('assets.asset.index')
                ->with('success_message', 'Asset was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'string|min:1|max:255|nullable',
            'owner_id' => 'nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'is_active' => 'boolean|nullable',
            'value' => 'string|min:1|nullable',
            'currency' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
