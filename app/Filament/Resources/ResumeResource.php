<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResumeResource\Pages;
use App\Filament\Resources\ResumeResource\RelationManagers;
use App\Models\Resume;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResumeResource extends Resource
{
    protected static ?string $model = Resume::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('client_id')
                    ->label("User")
                    ->relationship('user', 'name')->required(),
                TextInput::make('resume_name')->required(),
                TextInput::make('full_name')->required(),
                TextInput::make('contact_number')->numeric(),
                TextInput::make('email')->email(),
                RichEditor::make('achievements')->columnSpanFull(),
                Repeater::make('socials')->label('Social Links')->relationship('socials')
                    ->schema([
                        TextInput::make('title'),
                        TextInput::make('url')
                    ])->columnSpanFull(),

                Repeater::make('education')->label('Eduction')->relationship('education')
                    ->schema([
                        TextInput::make('institution_name')->required(),
                        TextInput::make('location')->required(),
                        TextInput::make('course_name')->required(),
                        DatePicker::make('started_at')->required(),
                        Checkbox::make('is_current')->label('Currently studying here?')->reactive(),
                        DatePicker::make('ended_at')->label('End Date')
                            ->visible(fn($get) => !$get('is_current')),
                    ])->columnSpanFull(),

                Repeater::make('certifications')->label('Certifications')->relationship('certifications')
                    ->schema([
                        TextInput::make('title')->required(),
                        TextInput::make('institution_name')->required(),
                        DatePicker::make('completed_at')->required(),
                        TextInput::make('certification_link')
                    ])->columnSpanFull(),

                Repeater::make('skills')->label('Skills')->relationship('skills')
                    ->schema([
                        TextInput::make('title')->required(),
                        TextInput::make('skill_category')->required(),
                    ])->columnSpanFull(),

                Repeater::make('works')->label('Work Experiences')->relationship('works')
                    ->schema([
                        TextInput::make('job_title')->required(),
                        TextInput::make('company_name')->required(),
                        TextInput::make('location')->required(),
                        DatePicker::make('started_at')->required(),
                        RichEditor::make('content')->columnSpanFull(),
                        Checkbox::make('is_current')->label('Currently studying here?')->reactive(),
                        DatePicker::make('ended_at')->label('End Date')
                            ->visible(fn($get) => !$get('is_current')),
                    ])->columnSpanFull(),

                Repeater::make('projects')->label('Projects')->relationship('projects')
                    ->schema([
                        TextInput::make('title')->required(),
                        TextInput::make('subtitle')->required(),
                        RichEditor::make('content')->columnSpanFull(),
                        DatePicker::make('started_at')->required(),
                        TextInput::make('demo_url')
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('resume_name'),
                TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResumes::route('/'),
            'create' => Pages\CreateResume::route('/create'),
            'edit' => Pages\EditResume::route('/{record}/edit'),
        ];
    }
}
