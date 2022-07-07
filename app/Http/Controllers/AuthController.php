<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
        
          /**
        * @OA\Post(
        * path="/api/register/",
        * tags={"Auth"},
        * summary="user registeration",
        * description="A user registers on the platform",
        *     @OA\RequestBody(
        *         @OA\MediaType(
        *            mediaType="application/json",
        *            @OA\Schema(
        *               type="object",
        *               required={"firstname","lastname","email","phone","password","password_confirmation","status","role_id"},
        *               @OA\Property(property="firstname", type="string"),
        *               @OA\Property(property="lastname", type="string"),
        *               @OA\Property(property="email", type="string"),
        *               @OA\Property(property="phone", type="string"),
        *               @OA\Property(property="password", type="string"),
        *               @OA\Property(property="password_confirmation", type="string"),
        *               @OA\Property(property="status", type="string"),
        *               @OA\Property(property="role_id", type="integer")
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Added Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */

    public function register (Request $request) {


            $fields = Validator::make($request->all(), [
                'name' => 'required|string',
                'phone' => 'required|string',
                'location' => 'required|string',
                'email' => 'required|string|unique:users',
                'password' => 'required|string|confirmed',
                'role' => 'required|integer'
            ]);

            if($fields->fails()){
                $response = [
                    'status' => 'failure',
                    'status_code' => 400,
                    'message' => 'Bad Request',
                    'errors' => $fields->errors(),
                ];

                return response()->json($response, 400);
            }
            $fields = $fields->validated();

            $user = User::create([
                'name' => $fields['name'],
                'location' => $fields['location'],
                'phone' => $fields['phone'],
               'email' => $fields['email'],
               'role' => $fields['role'],
                'status'=>"active",
                'password' => bcrypt($fields['password'])
            ]);

            $token = $user->createToken('myapptoken')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];



            // event(new Registered($user));
            //  return response($response, 201);

            return back()->withErrors([
                'success' => 'Record has been added successfully.',
            ]);



    }


        //

          /**
        * @OA\Post(
        * path="/api/login/",
        * tags={"Auth"},
        * summary="user login",
        * description="A user logs in to the platform",
        *     @OA\RequestBody(
        *         @OA\MediaType(
        *            mediaType="application/json",
        *            @OA\Schema(
        *               type="object",
        *               required={"email","password",},
        *               @OA\Property(property="email", type="string"),
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="logged in Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */

        public function login(Request $request) {

            // $fields = Validator::make($request->all(), [
            //     'email' => 'required|string',
            //     'password' => 'required|string'
            // ]);

            // if($fields->fails()){
            //     $response = [
            //         'status' => 'failure',
            //         'status_code' => 400,
            //         'message' => 'Bad Request',
            //         'errors' => $fields->errors(),
            //     ];

            //     return response()->json($response, 400);
            // }
            // $fields = $fields->validated();
            // // Check email
            // $user = User::where('email', $fields['email'])->first();

            // // Check password
            // if(!$user || !Hash::check($fields['password'], $user->password)) {
            //     return response([
            //         'message' => 'incorrect login details'
            //     ], 401);
            // }

            // $token = $user->createToken('myapptoken')->plainTextToken;

            // $response = [
            //     'user' => $user,
            //     'token' => $token
            // ];

            // return response($response, 201);
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
     
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect('/');
            }
     
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        //

          /**
        * @OA\Post(
        * path="/api/logout/",
        * tags={"Auth"},
        * summary="loggout user",
        * description="A user logs out of the platform",
        *     @OA\RequestBody(
        *         @OA\MediaType(
        *            mediaType="application/json",
        *            @OA\Schema(
        *               type="object",
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="logged in Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */


        public function logout(Request $request) {
            Auth::logout();
            return redirect('/');
        }

        /**
     * @OA\Get(
     *      path="/api/forgot-password",
     *      tags={"Password Reset"},
     *      summary="User clicks 'forgot password' button",
     *      description="A form is displayed which requires user email",
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
        public function forgotPassword(){
            return view('auth.forgot-password');
        }


          /**
        * @OA\Post(
        * path="/api/forgot-password/",
        * tags={"Password Reset"},
        * summary="password reset",
        * description="A user submits email to receive reset link",
        *     @OA\RequestBody(
        *         @OA\MediaType(
        *            mediaType="application/json",
        *            @OA\Schema(
        *               type="object",
        *               required={"email"},
        *               @OA\Property(property="email", type="string")
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Added Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */

        public function requestResetMail(Request $request){
            $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink(
                $request->only('email')
            );

        return $status === Password::RESET_LINK_SENT
                ? /*back()->with(*/['status' => __($status)]/*)*/
                : /*back()->withErrors(*/['email' => __($status)]/*)*/;
        }

        /**
     * @OA\Get(
     *      path="/api//reset-password/{token}",
     *      tags={"Password Reset"},
     *      summary="user clicks reset link in mail box",
     *      description="Returns a reset form and comes with $token which contains the reset token. This token
     *                   should be placed in a hidden form input with value set to the said token",
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

        public function requestResetForm($token){
            return view('auth.reset-password', ['token' => $token]);
        }


          /**
        * @OA\Post(
        * path="/api/reset-password/",
        * tags={"Password Reset"},
        * summary="user changes password",
        * description="A user enters email and enters password twice",
        *     @OA\RequestBody(
        *         @OA\MediaType(
        *            mediaType="application/json",
        *            @OA\Schema(
        *               type="object",
        *               required={"email","password","password_confirmation"},
        *               @OA\Property(property="email", type="string"),
        *               @OA\Property(property="password", type="string"),
        *               @OA\Property(property="password_confirmation", type="string")
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Added Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */

        public function resetPassword(Request $request){
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed',
            ]);

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                        ? redirect()->route('login')->with('status', __($status))
                        : back()->withErrors(['email' => [__($status)]]);
        }


         /**
     * @OA\Get(
     *      path="/api/email/verify",
     *      tags={"Email Verification"},
     *      summary="email verification notice",
     *      description="Returns a view that tells user to check mail for verification link",
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
        public function notVerified(){
            return view('auth.verify-email');
        }

         /**
     * @OA\Get(
     *      path="/api/email/verify/{id}/{hash}",
     *      tags={"Email Verification"},
     *      summary="verification link clicked",
     *      description="User clicks verification link in mail box",
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
        public function verifyEmail(EmailVerificationRequest $request){
            $request->fulfill();
            return 'email verified successfully';
        }

        /**
        * @OA\Post(
        * path="/api/email/verification-notification",
        * tags={"Email Verification"},
        * summary="resend email verification link",
        * description="User clicks on 'resend verification link'",
        *     @OA\RequestBody(
        *         @OA\MediaType(
        *            mediaType="application/json",
        *            @OA\Schema(
        *               type="object"
        *
        *            ),
        *        ),
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Added Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Unprocessable Entity",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */
        public function resendVerification(Request $request){
            $request->user()->sendEmailVerificationNotification();

            return 'Verification link sent!';
        }
}

