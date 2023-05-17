<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\UserRequest;
    use App\Http\Requests\UserUpdateRequest;
    use App\Models\User;
    use Hash;
    use Illuminate\Http\RedirectResponse;
    use Session;

    class UserController extends Controller {
        /**
         * Display a listing of the resource.
         */
        public function index() {
            $users = User::orderBy('id', 'asc')->paginate(config('dashboard.per_page'));

            return view('user.list', compact('users'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create() {
            return view('user.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(UserRequest $request): RedirectResponse {
            $validated = $request->validated();

            $validated['password'] = Hash::make($validated['password']);

            User::create($validated);

            Session::flash('alert-success', 'Success: User was successfully created.');

            return redirect()->route('users.index');
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(User $user) {
            return view('user.edit', compact('user'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(UserUpdateRequest $request, User $user) {

            $validated = $request->validated();

            $validated['password'] = Hash::make($validated['password']);

            $user->fill($validated)->save();

            Session::flash('alert-success', 'Success: User was successfully updated.');

            return redirect()->route('users.index');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(User $user) {
            if ($user->is_admin) {
                Session::flash('alert-danger', 'Error: Admin User can not be deleted.');
            } else {
                $user->delete();

                Session::flash('alert-success', 'Success: User successfully deleted.');
            }

            return redirect()->route('users.index');
        }
    }
