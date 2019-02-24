<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\NewLetterEmailRepository;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    /**
     * @var NewLetterEmailRepository
     */
    protected $emails;

    /**
     * NewsLetterController constructor.
     * @param NewLetterEmailRepository $emails
     */
    public function __construct(NewLetterEmailRepository $emails)
    {

        $this->emails = $emails;
    }

    /**
     * Store subscription email
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:news_letter_emails,email'
        ]);

        $email = $this->emails->create(['email' => $request->email]);

        if(!$email) {
            return response()->json([
                'errors' => [
                    'email' => [
                        'Could not subscribe, try again later.'
                    ]
                ]
            ], 422);
        }

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
