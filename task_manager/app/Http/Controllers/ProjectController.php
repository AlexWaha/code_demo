<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\ProjectRequest;
    use App\Models\Project;
    use App\Models\Status;
    use Illuminate\Http\RedirectResponse;
    use Session;

    class ProjectController extends Controller {
        /**
         * Display a listing of the resource.
         */
        public function index() {
            $projects = Project::orderBy('id', 'asc')->paginate(config('dashboard.per_page'));

            return view('project.list', compact('projects'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create() {
            $projects = Project::orderBy('title', 'asc')->get();
            $statuses = Status::orderBy('name', 'asc')->get();

            return view('project.create', compact('projects', 'statuses'));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(ProjectRequest $request): RedirectResponse {
            $validated = $request->validated();

            Project::create($validated);

            Session::flash('alert-success', 'Success: Project was successfully created.');

            return redirect()->route('projects.index');
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Project $project) {
            return view('project.edit', compact('project'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function show(Project $project) {
            return view('project.show', compact('project'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(ProjectRequest $request, Project $project) {
            $validated = $request->validated();

            $project->fill($validated)->save();

            Session::flash('alert-success', 'Success: Project was successfully updated.');

            return redirect()->route('projects.index');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Project $project) {
            if (auth()->user()->is_admin) {
                $project->delete();

                Session::flash('alert-success', 'Success: Project successfully deleted.');
            } else {
                Session::flash('alert-danger', 'Permissions error, project can not be deleted by current user.');
            }

            return redirect()->route('projects.index');
        }
    }
