<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;

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
        public function create(UserRequest $request) {
            //
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request) {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id) {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id) {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id) {
            //
        }
    }
