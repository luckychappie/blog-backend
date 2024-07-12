<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Events\PostNotificationEvent;
use App\Filament\Resources\PostResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        // $user = auth()->user();

        // Notification::make()
        // ->success()
        // ->title($user->name. 'created new post')
        // ->body('New post has been created')
        // ->sendToDatabase(User::all());

        // event(new PostNotificationEvent('This is testing data'));

        return [
            Actions\CreateAction::make(),
        ];
    }

}
