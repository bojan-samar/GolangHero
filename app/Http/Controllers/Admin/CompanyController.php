<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $statuses = Company::query()->toBase() // toBase gives us an array
//            ->selectRaw("count(case when status = 0 then 1 end) as inactive")
//            ->selectRaw("count(case when status = 1 then 1 end) as active")
//            ->first();

        $statuses = Company::query()->selectRaw('count(*) as count, status')->groupBy('status')->get()->mapWithKeys(function ($item, $key) {
            return [$item['status'] => $item['count']];
        });



        $companies = Company::query()->filter()->paginate(50)->withQueryString();
        $companies->links = $companies->onEachSide(1)->links();

        return $request->wantsJson()
            ? new JsonResponse($companies, 200)
            : Inertia::render('Admin/Company/Index', compact('companies', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Company/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|min:2|max:191|unique:companies,name',
        ]);

        $company = new Company;
        $company->name = $request->get('company_name');
        $company->status = 1;
        $company->save();

        return $request->wantsJson()
            ? new JsonResponse($company, 200)
            : Inertia::render('Admin/Company/Index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $downloadLogoShow = false;
        if (! Str::contains($company->photo, 'company-logo') and $company->photo){
            $downloadLogoShow = true;
        }

        return Inertia::render('Admin/Company/Edit', compact('company', 'downloadLogoShow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:191',
            'slug' => 'required|string|min:2|max:191',
            'url' => 'nullable|string|min:2|max:191',
            'phone' => 'nullable|string|min:7|max:191',
            'location' => 'nullable|string|min:2|max:191',
            'status' => 'required|boolean',
            'meta' => 'nullable|array',
            'description' => 'array',
        ]);

        $company->name = $request->get('name');
        $company->slug = $request->get('slug');
        $company->photo = $request->get('photo');
        $company->status = $request->get('status');
        $company->location = $request->get('location');
        $company->url = $request->get('url');
        $company->description = $request->get('description');
        $company->meta = $request->get('meta');
        $company->save();

        return back()->with('flash.success', 'Company Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if($company->photo){
            Storage::delete($company->photo);
        }
        $company->delete();

        return redirect()->route('admin.company.index');
    }

    public function downloadLogo(Request $request)
    {
        $companySlug = $request->get('slug');
        $company = Company::query()->where('slug', $companySlug)->firstOrFail();
        $photoUrl = $request->get('photo');
        $response = Http::get($photoUrl);
        $fileExtension = ".jpg";
        if (Str::contains($company->photo, '.svg')){
            $fileExtension = ".svg";
        }
        $photoPath = "company-logo/{$companySlug}{$fileExtension}";
        Storage::put($photoPath, $response->body(),'public');
        $company->photo = $photoPath;
        $company->save();

        return back();
    }
}
