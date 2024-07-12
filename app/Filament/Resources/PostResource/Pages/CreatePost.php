<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Events\PostNotificationEvent;
use App\Filament\Resources\PostResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function getRedirectUrl(): string
    {

        $user = auth()->user();

        Notification::make()
        ->success()
        ->title($user->name. 'created new post')
        ->body('New post has been created')
        ->sendToDatabase(User::where('role', 'admin')->get());

        event(new PostNotificationEvent($user->name.' created new blog.'));

        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    
}
