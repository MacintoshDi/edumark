<?php
namespace App\Filament\Resources\DiscussionTopicResource\Pages;
use App\Filament\Resources\DiscussionTopicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditDiscussionTopic extends EditRecord
{
    protected static string $resource = DiscussionTopicResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}