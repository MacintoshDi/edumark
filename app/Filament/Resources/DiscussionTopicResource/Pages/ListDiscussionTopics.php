<?php
declare(strict_types=1);
namespace App\Filament\Resources\DiscussionTopicResource\Pages;
use App\Filament\Resources\DiscussionTopicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListDiscussionTopics extends ListRecords
{
    protected static string $resource = DiscussionTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}