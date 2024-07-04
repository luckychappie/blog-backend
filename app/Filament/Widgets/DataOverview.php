<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DataOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Registered Users',
                User::when($this, fn ($query) => $query->where('role', 'user'))->count())
                ->description('Total users registeration')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->chart([1,3,4,10,20,40])
                ->color('success'),

            Stat::make('Total Posts', Post::count())
                ->description('Blog posts created')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->chart([1,3,4,10,20,40])
                ->color('info'),

            Stat::make('New Comments',
                Comment::when($this, fn ($query) => $query->where('is_read', 0))->count())
                ->description('New commet was found')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->chart([1,3,4,10,20,40])
                ->color('warning')
        ];
    }
}
