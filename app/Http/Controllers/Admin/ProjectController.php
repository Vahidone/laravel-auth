<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Functions\Helper;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(10);
        return view('admin.projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Inserimento nuovo progetto';
        $method = 'POST';
        $route = route('admin.projects.store');
        $project = null;
        return view('admin.projects.create-edit', compact('title','method', 'route', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Helper::generateSlug($form_data['title'], Project::class);
        $form_data['release_date'] = date('Y-m-d');

        // se esiste la chiave image salvo l'immagine nel file system e nel database
        if(array_key_exists('image', $form_data)) {

            // prima di salvare il file prendo il nome del file per salvarlo nel db
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            // salvo il file nello storage rinominandolo
            $form_data['image'] = Storage::put('uploads', $form_data['image']);

        }

        $new_project = Project::create($form_data);

        return redirect()->route('admin.projects.show', $new_project);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)

    {
        $title = 'Modifica progetto';
        $method = 'PUT';
        $route = route('admin.projects.update', $project);
        return view('admin.projects.create-edit', compact('title','method', 'route', 'project'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        if($form_data['title']!= $project->title){
            $form_data['slug'] = Helper::generateSlug($form_data['title'], project::class);
        }else{
            $form_data['slug'] = $project->slug;
        }

        if(array_key_exists('image', $form_data)){
            // se esiste la chiave image vuol dire che devo sostituire l'immagine presente (se c'è) eliminando quella vecchia
            if($project->image){
                // se era presente la elimino dallo storage
                Storage::disk('public')->delete($project->image);
            }

            // prima di salvare il file prendo il nome del file per salvarlo nel db
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            // salvo il file nello storage rinominandolo
            $form_data['image'] = Storage::put('uploads', $form_data['image']);
        }

        $form_data['date'] = date('Y-m-d');

        $project->update($form_data);
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
          // se il post contiene una immagine vuol dire che la devo eliminare
          if($project->image){
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Il post è stato eliminato correttamente');
    }
}
