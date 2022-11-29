<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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
        $companies = Company::query()->filter()->paginate(50)->withQueryString();
        $companies->append('created_at_date_string');
        $companies->links = $companies->onEachSide(1)->links();

        $sort = $request->get('sort');
        $direction = $request->get('direction');

        return $request->wantsJson()
            ? new JsonResponse($companies, 200)
            : Inertia::render('Admin/Company/Index', compact('companies', 'sort', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $company = null;
        if ($name = $request->get('name')){
            $company = [
                'name' => $name,
                'slug' => Str::slug($name)
            ];
        }
        return Inertia::render('Admin/Company/Create', compact('company'));
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
            'name' => 'required|string|min:2|max:191',
            'slug' => ['required','string', 'min:2', 'max:255', 'unique:companies,slug'],
            'url' => 'nullable|string|min:2|max:191|unique:companies,url',
            'location' => 'nullable|string|min:2|max:191',
            'twitter' => 'nullable|string|min:1|max:191',
            'description' => 'array',
            'status' => 'required|boolean',
        ]);

        $company = new Company;
        $company->name = $request->get('name');
        $company->slug = $request->get('slug');
        $company->url = $request->get('url');
        $company->location = $request->get('location');
        $company->twitter = $request->get('twitter');
        $company->description = $request->get('description');
        $company->status = $request->get('status');
        $company->save();

        return redirect()->route('admin.company.index');
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
            'slug' => ['required','string', 'min:2', 'max:255', Rule::unique('companies')->ignore($company->id)],
            'url' => ['nullable','string', 'min:2', 'max:255', Rule::unique('companies')->ignore($company->id)],
            'twitter' => 'nullable|string|min:1|max:191',
            'location' => 'nullable|string|min:2|max:191',
            'status' => 'required|boolean',
            'photo' => ['nullable','image','mimes:jpg,jpeg,png', 'max:1024'],
            'meta' => 'nullable|array',
            'description' => 'array',
        ]);

        if ($company->photo) {
            Storage::delete($company->photo);
        }

        $photo = null;
        if ($request->has('photo')){
            $photo = $request->file('photo')->storePublicly('company');
        }

        $company->name = $request->get('name');
        $company->slug = $request->get('slug');
        $company->status = $request->get('status');
        $company->location = $request->get('location');
        $company->url = $request->get('url');
        $company->twitter = $request->get('twitter');
        $company->description = $request->get('description');
        $company->meta = $request->get('meta');
        $company->photo = $photo;
        $company->status = $request->get('status');
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

    public function destroyPhoto($companyId)
    {
        $company = Company::query()->findOrFail($companyId);
        Storage::delete($company->photo);
        $company->photo = null;
        $company->save();

        return back();
    }
}
