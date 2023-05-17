<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\LoginRequest;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Session;

    class LoginController extends Controller {
        /**
         * @return View|RedirectResponse
         */
        public function index() {
            if (Auth::check()) {
                return redirect()->route('dashboard');
            }

            return view('login');
        }

        /**
         * @param LoginRequest $request
         *
         * @return RedirectResponse
         */
        public function login(LoginRequest $request): RedirectResponse {
            $validated = $request->validated();

            if (Auth::attempt($validated)) {
                $request->session()->regenerate();

                Session::flash('alert-warning', 'Signed in');
                return redirect()->route('dashboard');
            }

            Session::flash('alert-warning', 'Login details are not valid');

            return redirect("auth");
        }

        public function logout(Request $request): RedirectResponse {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('auth');
        }
    }
