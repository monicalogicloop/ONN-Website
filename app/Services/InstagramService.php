<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InstagramService
{
    public function latestPosts(int $limit = 6): array
    {
        return Cache::remember("instagram.latest_posts.{$limit}", now()->addMinutes(30), function () use ($limit) {
            $userId = config('services.instagram.user_id');
            $token = config('services.instagram.access_token');

            if (empty($userId) || empty($token)) {
                return [];
            }

            try {
                $response = Http::timeout(10)->get("https://graph.instagram.com/{$userId}/media", [
                    'fields' => 'id,media_type,media_url,thumbnail_url,permalink,timestamp',
                    'access_token' => $token,
                    'limit' => $limit,
                ]);

                if (!$response->successful()) {
                    Log::warning('Instagram media fetch failed', [
                        'status' => $response->status(),
                        'body' => $response->body(),
                    ]);

                    return [];
                }

                $posts = $response->json('data', []);

                return collect($posts)
                    ->map(function ($post) {
                        $isVideo = ($post['media_type'] ?? '') === 'VIDEO';

                        return [
                            'image' => $isVideo
                                ? ($post['thumbnail_url'] ?? $post['media_url'] ?? null)
                                : ($post['media_url'] ?? null),
                            'url' => $post['permalink'] ?? 'https://www.instagram.com/onn_premiumwear/',
                            'type' => $isVideo ? 'video' : 'image',
                        ];
                    })
                    ->filter(function ($post) {
                        return !empty($post['image']);
                    })
                    ->take($limit)
                    ->values()
                    ->all();
            } catch (\Throwable $e) {
                Log::error('Instagram media fetch exception', [
                    'message' => $e->getMessage(),
                ]);

                return [];
            }
        });
    }
}
