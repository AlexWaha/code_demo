<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StatusRequest;
    use App\Models\Status;
    use Illuminate\Http\RedirectResponse;
    use Session;

    class StatusController extends Controller {
        /**
         * Display a listing of the resource.
         */
        public function index() {
            $statuses = Status::orderByRaw('deleted_at IS NOT NULL ASC, id ASC')->withTrashed()->paginate(config('dashboard.per_page'));

            return view('status.list', compact('statuses'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create() {
            return view('status.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(StatusRequest $request): RedirectResponse {
            $validated = $request->validated();

            Status::create($validated);

            Session::flash('alert-success', 'Success: Status was successfully created.');

            return redirect()->route('statuses.index');
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Status $status) {
            return view('status.edit', compact('status'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(StatusRequest $request, Status $status) {
            $validated = $request->validated();

            $status->fill($validated)->save();

            Session::flash('alert-success', 'Success: Status was successfully updated.');

            return redirect()->route('statuses.index');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Status $status) {
            if (auth()->user()->is_admin) {
                $status->delete();

                Session::flash('alert-success', 'Success: Status successfully deleted.');
            } else {
                Session::flash('alert-danger', 'Permissions error, status can not be deleted by current user.');
            }

            return redirect()->route('statuses.index');
        }
    }
