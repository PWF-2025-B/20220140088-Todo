<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class InvalidToken extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        // Tangani error jika token tidak valid atau tidak ada
        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated atau token tidak valid',
            ], Response::HTTP_UNAUTHORIZED);
        }

        if ($exception instanceof TokenExpiredException) {
            return response()->json([
                'success' => false,
                'message' => 'Token telah kedaluwarsa',
            ], Response::HTTP_UNAUTHORIZED);
        }

        if ($exception instanceof TokenInvalidException) {
            return response()->json([
                'success' => false,
                'message' => 'Token tidak valid',
            ], Response::HTTP_UNAUTHORIZED);
        }

        if ($exception instanceof JWTException) {
            return response()->json([
                'success' => false,
                'message' => 'Token tidak diberikan',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return parent::render($request, $exception);
    }
}
