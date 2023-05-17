<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\TaskRequest;
    use App\Models\Project;
    use App\Models\Status;
    use App\Models\Task;
    use Illuminate\Http\RedirectResponse;
    use Session;

    class TaskController extends Controller {
        /**
         * Display a listing of the resource.
         */
        public function index() {
            $tasks = Task::orderBy('id', 'asc')->paginate(config('dashboard.per_page'));

            return view('task.list', compact('tasks'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create() {
            $projects = Project::orderBy('title', 'asc')->get();
            $statuses = Status::orderBy('name', 'asc')->get();

            return view('task.create', compact('projects', 'statuses'));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(TaskRequest $request): RedirectResponse {
            $validated = $request->validated();

            Task::create($validated + ['user_id' => auth()->user()->id]);

            Session::flash('alert-success', 'Success: Task was successfully created.');

            return redirect()->route('tasks.index');
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Task $task) {
            $projects = Project::orderBy('title', 'asc')->get();
            $statuses = Status::orderBy('name', 'asc')->get();

            return view('task.edit', compact('task', 'projects', 'statuses'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function show(Task $task) {
            return view('task.show', compact('task'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(TaskRequest $request, Task $task) {
            $validated = $request->validated();

            $task->fill($validated)->save();

            Session::flash('alert-success', 'Success: Task was successfully updated.');

            return redirect()->route('tasks.index');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Task $task) {
            if (auth()->user()->is_admin) {
                $task->delete();

                Session::flash('alert-success', 'Success: Task successfully deleted.');
            } else {
                Session::flash('alert-danger', 'Permissions error, status can not be deleted by current user.');
            }

            return redirect()->route('tasks.index');
        }
    }
